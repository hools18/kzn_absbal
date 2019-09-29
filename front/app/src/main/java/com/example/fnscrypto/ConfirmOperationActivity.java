package com.example.fnscrypto;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.myapplication.R;
import com.jakewharton.rxbinding3.view.RxView;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import ru.absolutebalance.common.NetworkService;
import ru.absolutebalance.common.NoticeVO;

public class ConfirmOperationActivity extends AppCompatActivity {

    @BindView(R.id.btnAccept)
    Button btnAccept;

    @BindView(R.id.btnDecline)
    Button btnDecline;

    @BindView(R.id.tvDateOfNotification)
    TextView date;

    @BindView(R.id.tvDocumentNumber)
    TextView tvDocument;

    NoticeVO noticeVO;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.confirm_operation);
        ButterKnife.bind(this);

        getUser();
        initButtons();

        addListenerOnButton();
    }


    // get the selected dropdown list value
    public void addListenerOnButton() {

    }

    private void getUser() {
        Intent i = getIntent();
        noticeVO = (NoticeVO) i.getParcelableExtra("notifications1");
        tvDocument.setText(noticeVO.getContractId()+"");
        date.setText(noticeVO.getDate());
    }

    private void initButtons() {
        RxView.clicks(btnDecline)
            .subscribe(aVoid -> {
                NetworkService.getInstance()
                    .getJSONApi()
                    .setStatusOperation("", String.valueOf(noticeVO.getOperationId()))
                    .enqueue(new Callback<Object>() {
                        @Override
                        public void onResponse(Call<Object> call, Response<Object> response) {
                            Toast.makeText(getApplicationContext(), "Операция отменена!", Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(getApplicationContext(), ProfileActivity.class);
                            startActivity(intent);
                        }

                        @Override
                        public void onFailure(Call<Object> call, Throwable t) {

                        }
                    });
            });

        RxView.clicks(btnAccept)
            .subscribe(aVoid -> {
                NetworkService.getInstance()
                    .getJSONApi()
                    .setStatusOperation("Не понял", String.valueOf(noticeVO.getOperationId()))
                    .enqueue(new Callback<Object>() {
                        @Override
                        public void onResponse(Call<Object> call, Response<Object> response) {
                            Toast.makeText(getApplicationContext(), "Операция утверждена!", Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(getApplicationContext(), ProfileActivity.class);
                            startActivity(intent);
                        }

                        @Override
                        public void onFailure(Call<Object> call, Throwable t) {

                        }
                    });
            });
    }
}
