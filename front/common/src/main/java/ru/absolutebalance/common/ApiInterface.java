package ru.absolutebalance.common;

import io.reactivex.Observable;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {


    @FormUrlEncoded
    @POST("/create_user")
    Call<LoginResponseVO> getAuth(@Field("patronymic") String patronymic,
                                  @Field("name") String name,
                                  @Field("surname") String surname,
                                  @Field("device_id") String deviceId);
//    Call<LoginResponseVO> getAuth(@Body String request);


    @POST("/update_confirmation_date")
    Observable<Object> getConfirm(@Body String request);

}
