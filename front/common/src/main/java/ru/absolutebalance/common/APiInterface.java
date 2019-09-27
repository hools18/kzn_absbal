package ru.absolutebalance.common;

import retrofit2.Call;
import retrofit2.http.GET;

public interface APiInterface {

    @GET("/create_user")
    Call<Object> getAuth();

    @GET("/update_confirmation_date")
    Call<Object> getConfirm();

}
