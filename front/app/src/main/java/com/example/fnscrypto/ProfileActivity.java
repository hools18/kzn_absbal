package com.example.fnscrypto;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

import com.example.myapplication.R;
import com.jakewharton.rxbinding3.view.RxView;

import java.util.ArrayList;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import ru.absolutebalance.common.NetworkService;
import ru.absolutebalance.common.WebBaseResponse;

public class ProfileActivity extends AppCompatActivity {

    @BindView(R.id.btnSignDocument)
    Button btnSign;

    private WebBaseResponse webBaseResponse;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.profile);
        ButterKnife.bind(this);

        initButtons();
    }

    private void initButtons() {
        RxView.clicks(btnSign)
            .subscribe(aVoid -> {
                Intent intent = new Intent(this, OperationsActivity.class);
                intent.putExtra("notifications", webBaseResponse.getContent().get(0));
                startActivity(intent);
            });
    }

    @Override
    protected void onResume() {
        super.onResume();

        NetworkService.getInstance()
            .getJSONApi()
            .getNewNotice()
            .enqueue(new Callback<WebBaseResponse>() {
                @Override
                public void onResponse(Call<WebBaseResponse> call, Response<WebBaseResponse> response) {
                    webBaseResponse = response.body();
                }

                @Override
                public void onFailure(Call<WebBaseResponse> call, Throwable t) {
                    Log.d(this.getClass().getSimpleName(), t.getMessage());

                }
            });
    }
}
