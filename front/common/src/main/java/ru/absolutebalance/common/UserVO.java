package ru.absolutebalance.common;

import com.google.gson.annotations.SerializedName;

import java.sql.Timestamp;

public class UserVO {
    @SerializedName("name")
    private String name;

    @SerializedName("patronymic")
    private String patronymic;

    @SerializedName("surname")
    private String surname;

    @SerializedName("birthday")
    private Timestamp birthday;

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
    private Timestamp confirmationDate;

    @SerializedName("device_id")
    private String deviceId;

    @SerializedName("series")
    private Integer series;

    @SerializedName("number")
    private Integer number;

    @SerializedName("issuing_authority")
    private String issumingAuthority;

    @SerializedName("date_of_issue")
    private Timestamp issuedDate;

    @SerializedName("time_expired")
    private Timestamp timeExpired;

    public UserVO(String name, String patronymic, String surname, String deviceId) {
        this.name = name;
        this.patronymic = patronymic;
        this.surname = surname;
        this.deviceId = deviceId;
    }

    public UserVO(String name, String patronymic, String surname, Timestamp birthday, String email, String login, String password, String phone, String biometrics, Timestamp confirmationDate, String deviceId, Integer series, Integer number, String issumingAuthority, Timestamp issuedDate, Timestamp timeExpired) {
        this.name = name;
        this.patronymic = patronymic;
        this.surname = surname;
        this.birthday = birthday;
        this.email = email;
        this.login = login;
        this.password = password;
        this.phone = phone;
        this.biometrics = biometrics;
        this.confirmationDate = confirmationDate;
        this.deviceId = deviceId;
        this.series = series;
        this.number = number;
        this.issumingAuthority = issumingAuthority;
        this.issuedDate = issuedDate;
        this.timeExpired = timeExpired;
    }

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

    public Timestamp getBirthday() {
        return birthday;
    }

    public void setBirthday(Timestamp birthday) {
        this.birthday = birthday;
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

    public Timestamp getConfirmationDate() {
        return confirmationDate;
    }

    public void setConfirmationDate(Timestamp confirmationDate) {
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

    public Timestamp getIssuedDate() {
        return issuedDate;
    }

    public void setIssuedDate(Timestamp issuedDate) {
        this.issuedDate = issuedDate;
    }

    public Timestamp getTimeExpired() {
        return timeExpired;
    }

    public void setTimeExpired(Timestamp timeExpired) {
        this.timeExpired = timeExpired;
    }
}

