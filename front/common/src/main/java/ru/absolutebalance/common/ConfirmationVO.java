package ru.absolutebalance.common;

import com.google.gson.annotations.SerializedName;

import java.sql.Timestamp;

public class ConfirmationVO {
    @SerializedName("date")
    private Timestamp date;

    @SerializedName("user_id")
    private String userID;

    public Timestamp getDate() {
        return date;
    }

    public void setDate(Timestamp date) {
        this.date = date;
    }

    public String getUserID() {
        return userID;
    }

    public void setUserID(String userID) {
        this.userID = userID;
    }
}
