package com.example.fnscrypto;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Button;
import android.widget.EditText;

import com.example.myapplication.R;
import com.jakewharton.rxbinding3.view.RxView;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import ru.absolutebalance.common.LoginResponseVO;
import ru.absolutebalance.common.NetworkService;

public class RegistrationActivity extends AppCompatActivity {

    @BindView(R.id.btnContinueRegistration)
    Button continueRegistration;

    @BindView(R.id.et_login)
    EditText login;

    @BindView(R.id.et_password)
    EditText password;

    @BindView(R.id.et_email)
    EditText email;

    @BindView(R.id.et_phone)
    EditText phone;

    String loginString, emailString, passwordString, phoneNumber;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registration_account);
        ButterKnife.bind(this);

        initButtons();
    }

    private void initButtons() {
        RxView.clicks(continueRegistration)
            .subscribe(aVoid -> {
                loginString = login.getText().toString();
                passwordString = password.getText().toString();
                emailString = email.getText().toString();
                phoneNumber = phone.getText().toString();

                sendData();
            });
    }

    private void sendData() {
        NetworkService.getInstance()
            .getJSONApi()
            .getAuth("Alexiovich", "Artem", "win", "deviceIdididi")
            .enqueue(new Callback<LoginResponseVO>() {
                @Override
                public void onResponse(Call<LoginResponseVO> call, Response<LoginResponseVO> response) {
                    if (response.body() != null) {
                        LoginResponseVO wResponse = response.body();
                        Intent intent = new Intent(getApplicationContext(), RegistrationConfirmActivity.class);
                        intent.putExtra("user", wResponse);
                        startActivity(intent);
                        Log.d(this.getClass().getSimpleName(), wResponse.getMessage());
                    }

                }

                @Override
                public void onFailure(Call<LoginResponseVO> call, Throwable t) {
                    Log.d(this.getClass().getSimpleName(), t.getMessage());

                }
            });
    }
}
