package com.example.fnscrypto;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;

import com.example.myapplication.R;
import com.jakewharton.rxbinding3.view.RxView;

import java.util.ArrayList;
import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import ru.absolutebalance.common.LoginResponseVO;
import ru.absolutebalance.common.NetworkService;

public class RegistrationConfirmActivity extends AppCompatActivity {

    @BindView(R.id.spinner_dates)
    Spinner dates;

    @BindView(R.id.btnConfirmRegistrationDate)
    Button btnSubmit;

    LoginResponseVO loginResponseVO;
    private String date;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registration_wait);
        ButterKnife.bind(this);

        getUser();
        initButtons();

        addItemsOnSpinner2();
        addListenerOnSpinnerItemSelection();
    }

    // add items into spinner dynamically
    public void addItemsOnSpinner2() {
        List<String> list = new ArrayList<String>();
        list.addAll(loginResponseVO.getDates());
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(getApplicationContext(),
            android.R.layout.simple_spinner_item, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        dates.setAdapter(dataAdapter);
    }

    public void addListenerOnSpinnerItemSelection() {
        dates.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                date = adapterView.getItemAtPosition(i).toString();

            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });
    }

    private void getUser() {
        Intent i = getIntent();
        loginResponseVO = (LoginResponseVO) i.getParcelableExtra("user");
        date = loginResponseVO.getDates().get(0);
    }

    private void initButtons() {
        RxView.clicks(btnSubmit)
            .subscribe(aVoid -> {
                Intent intent = new Intent(getApplicationContext(), ProfileActivity.class);
//                        intent.putExtra("user", wResponse);
                startActivity(intent);
//                sendData();
            });
    }

    private void sendData() {
        NetworkService.getInstance()
            .getJSONApi()
            .getConfirm(String.valueOf(loginResponseVO.getUserId()), date)
            .enqueue(new Callback<Object>() {
                @Override
                public void onResponse(Call<Object> call, Response<Object> response) {
                    if (response.body() != null) {
//                        LoginResponseVO wResponse = response.body();
                        Intent intent = new Intent(getApplicationContext(), ProfileActivity.class);
//                        intent.putExtra("user", wResponse);
                        startActivity(intent);
//                        Log.d(this.getClass().getSimpleName(), wResponse.getMessage());
                    }
                }

                @Override
                public void onFailure(Call<Object> call, Throwable t) {
                    Log.d(this.getClass().getSimpleName(), t.getMessage());

                }
            });
//            .enqueue(new Callback<LoginResponseVO>() {
//                @Override
//                public void onResponse(Call<LoginResponseVO> call, Response<LoginResponseVO> response) {
//
//                }
//
//                @Override
//                public void onFailure(Call<LoginResponseVO> call, Throwable t) {
//                    Log.d(this.getClass().getSimpleName(), t.getMessage());
//
//                }
//            });
    }
}
