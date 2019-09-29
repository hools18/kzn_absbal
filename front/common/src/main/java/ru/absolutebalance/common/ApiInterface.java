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

    @FormUrlEncoded
    @POST("/getNewNotice")
    Call<LoginResponseVO> getNewNotice(@Field("confirmation_date") String patronymic);

//    "status": 1,
//        "message": "Есть операции в очереди на подтверждение",
//        "content": [
//    {
//        "operation_id": 1,
//        "contract_id": 1,
//        "created_at": "2019-09-29T04:32:34.000000Z"
//    }
//    ]

    @POST("/update_confirmation_date")
    Call<Object> getConfirm(@Field("confirmation_date") String request, @Field("user_id") String userId);

}
