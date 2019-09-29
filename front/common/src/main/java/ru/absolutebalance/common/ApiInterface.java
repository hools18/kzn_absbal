package ru.absolutebalance.common;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface ApiInterface {


    @FormUrlEncoded
    @POST("/create_user")
    Call<LoginResponseVO> getAuth(@Field("patronymic") String patronymic,
                                  @Field("name") String name,
                                  @Field("surname") String surname,
                                  @Field("device_id") String deviceId);

    @POST("/getNewNotice")
    Call<WebBaseResponse> getNewNotice();

    @FormUrlEncoded
    @POST("/update_confirmation_date")
    Call<Object> getConfirm(@Field("confirmation_date") String request, @Field("user_id") String userId);

    @FormUrlEncoded
    @POST("/setStatusOperation")
    Call<Object> setStatusOperation(@Field("rejection_reason") String rejectReason, @Field("operation_id") String operationId);
}
