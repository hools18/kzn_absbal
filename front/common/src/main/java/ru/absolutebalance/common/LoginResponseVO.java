package ru.absolutebalance.common;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class LoginResponseVO {
    @SerializedName("message")
    private String message;

    @SerializedName("status")
    private Integer status;

    @SerializedName("list_date")
    private List<String> dates;

    @SerializedName("user_id")
    private Integer userId;

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Integer getStatus() {
        return status;
    }

    public void setStatus(Integer status) {
        this.status = status;
    }

    public List<String> getDates() {
        return dates;
    }

    public void setDates(List<String> dates) {
        this.dates = dates;
    }
}
