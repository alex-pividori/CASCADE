import numpy as np
import pandas as pd

class DistributedROC(object):
    """
    Store statistics for calculating receiver operating characteristic (ROC) curves and performance diagrams and permit
    easy aggregation of ROC curves from many small datasets.

    Parameters
    ----------
    thresholds : numpy.ndarray of floats
        List of probability thresholds in increasing order.
    obs_threshold : float
        Observation value used as the split point for determining positives.
    input_str : str
        String in the format output by the __str__ method so that initialization of the object can be done
        from items in a text file.
    """
    def __init__(self, thresholds=None, obs_threshold=None, input_str=None):
        self.thresholds = thresholds
        self.obs_threshold = obs_threshold
        if self.thresholds is not None:
            self.contingency_tables = pd.DataFrame(np.zeros((thresholds.size, 4), dtype=int),
                                                   columns=["TP", "FP", "FN", "TN"])
        else:
            self.contingency_tables = pd.DataFrame(columns=["TP", "FP", "FN", "TN"])
        if input_str is not None:
            self.from_str(input_str)

    def update(self, forecasts, observations):
        """
        Update the ROC curve with a set of forecasts and observations

        :param forecasts: 1D array of forecast values
        :param observations: 1D array of observation values.
        :return:
        """
        for t, threshold in enumerate(self.thresholds):
            tp = np.count_nonzero((forecasts >= threshold)
                                  & (observations >= self.obs_threshold))
            fp = np.count_nonzero((forecasts >= threshold)
                                  & (observations < self.obs_threshold))
            fn = np.count_nonzero((forecasts < threshold)
                                  & (observations >= self.obs_threshold))
            tn = np.count_nonzero((forecasts < threshold)
                                  & (observations < self.obs_threshold))
            self.contingency_tables.ix[t] += [tp, fp, fn, tn]

    def __add__(self, other):
        """
        Add two DistributedROC objects together and combine their contingency table values.

        :param other: Another DistributedROC object.
        :return:
        """
        sum_roc = DistributedROC(self.thresholds, self.obs_threshold)
        sum_roc.contingency_tables = self.contingency_tables + other.contingency_tables
        return sum_roc

    def merge(self, other_roc):
        """
        Ingest the values of another DistributedROC object into this one and update the statistics inplace.

        :param other_roc: another DistributedROC object.
        :return:
        """
        if other_roc.thresholds.size == self.thresholds.size and np.all(other_roc.thresholds == self.thresholds):
            self.contingency_tables += other_roc.contingency_tables
        else:
            print("Input table thresholds do not match.")

    def roc_curve(self):
        """
        Generate a ROC curve from the contingency table by calculating the probability of detection (TP/(TP+FN)) and the
        probability of false detection (FP/(FP+TN)).

        :return: A pandas.DataFrame containing the POD, POFD, and the corresponding probability thresholds.
        """
        pod = self.contingency_tables["TP"].astype(float) / (self.contingency_tables["TP"] +
                                                             self.contingency_tables["FN"])
        pofd = self.contingency_tables["FP"].astype(float) / (self.contingency_tables["FP"] +
                                                              self.contingency_tables["TN"])
        return pd.DataFrame({"POD": pod, "POFD": pofd, "Thresholds": self.thresholds},
                            columns=["POD", "POFD", "Thresholds"])

    def performance_curve(self):
        """
        Calculate the Probability of Detection and False Alarm Ratio in order to output a performance diagram.

        :return: pandas.DataFrame containing POD, FAR, and probability thresholds.
        """
        pod = self.contingency_tables["TP"] / (self.contingency_tables["TP"] + self.contingency_tables["FN"])
        far = self.contingency_tables["FP"] / (self.contingency_tables["FP"] + self.contingency_tables["TP"])
        return pd.DataFrame({"POD": pod, "FAR": far, "Thresholds": self.thresholds},
                            columns=["POD", "FAR", "Thresholds"])

    def auc(self):
        """
        Calculate the Area Under the ROC Curve (AUC).

        :return:
        """
        roc_curve = self.roc_curve()
        return np.abs(np.trapz(roc_curve['POD'], x=roc_curve['POFD']))

    def __str__(self):
        """
        Output the information within the DistributedROC object to a string.

        :return:
        """
        out_str = "Obs_Threshold:{0:0.2f}".format(self.obs_threshold) + ";"
        out_str += "Thresholds:" + " ".join(["{0:0.2f}".format(t) for t in self.thresholds]) + ";"
        for col in self.contingency_tables.columns:
            out_str += col + ":" + " ".join(["{0:d}".format(t) for t in self.contingency_tables[col]]) + ";"
        out_str = out_str.rstrip(";")
        return out_str

    def __repr__(self):
        return self.__str__()

    def from_str(self, in_str):
        """
        Read the object string and parse the contingency table values from it.
        :param in_str:
        :return:
        """
        parts = in_str.split(";")
        for part in parts:
            var_name, value = part.split(":")
            if var_name == "Obs_Threshold":
                self.obs_threshold = float(value)
            elif var_name == "Thresholds":
                self.thresholds = np.array(value.split(), dtype=float)
            elif var_name in ["TP", "FP", "FN", "TN"]:
                self.contingency_tables[var_name] = np.array(value.split(), dtype=int)
