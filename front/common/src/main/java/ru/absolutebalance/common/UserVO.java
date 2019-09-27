package ru.absolutebalance.common;

import com.google.gson.annotations.SerializedName;

public class UserVO {
    @SerializedName("name")
    private String name;

    @SerializedName("patronymic")
    private String patronymic;

    @SerializedName("surname")
    private String surname;

    @SerializedName("birthday")
    private Integer datebirth;

    @SerializedName("email")
    private String email;

    @SerializedName("login")
    private String login;

    @SerializedName("password")
    private String password;

    @SerializedName("phone")
    private String phone;

    @SerializedName("biometrics")
    private String biometrics;

    @SerializedName("confirmation_date")
    private Integer confirmationDate;

    @SerializedName("device_id")
    private String deviceId;

    @SerializedName("series")
    private Integer series;

    @SerializedName("number")
    private Integer number;

    @SerializedName("issuing_authority")
    private String issumingAuthority;

    @SerializedName("date_of_issue")
    private Integer issuedDate;

    @SerializedName("time_expired")
    private Integer timeExpired;

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPatronymic() {
        return patronymic;
    }

    public void setPatronymic(String patronymic) {
        this.patronymic = patronymic;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public Integer getDatebirth() {
        return datebirth;
    }

    public void setDatebirth(Integer datebirth) {
        this.datebirth = datebirth;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public String getBiometrics() {
        return biometrics;
    }

    public void setBiometrics(String biometrics) {
        this.biometrics = biometrics;
    }

    public Integer getConfirmationDate() {
        return confirmationDate;
    }

    public void setConfirmationDate(Integer confirmationDate) {
        this.confirmationDate = confirmationDate;
    }

    public String getDeviceId() {
        return deviceId;
    }

    public void setDeviceId(String deviceId) {
        this.deviceId = deviceId;
    }

    public Integer getSeries() {
        return series;
    }

    public void setSeries(Integer series) {
        this.series = series;
    }

    public Integer getNumber() {
        return number;
    }

    public void setNumber(Integer number) {
        this.number = number;
    }

    public String getIssumingAuthority() {
        return issumingAuthority;
    }

    public void setIssumingAuthority(String issumingAuthority) {
        this.issumingAuthority = issumingAuthority;
    }

    public Integer getIssuedDate() {
        return issuedDate;
    }

    public void setIssuedDate(Integer issuedDate) {
        this.issuedDate = issuedDate;
    }

    public Integer getTimeExpired() {
        return timeExpired;
    }

    public void setTimeExpired(Integer timeExpired) {
        this.timeExpired = timeExpired;
    }
}
