package com.example.fnscrypto;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Button;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.example.myapplication.R;
import com.jakewharton.rxbinding3.view.RxView;

import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import ru.absolutebalance.common.NetworkService;
import ru.absolutebalance.common.NoticeVO;
import ru.absolutebalance.common.WebBaseResponse;

public class OperationsActivity extends AppCompatActivity {

    @BindView(R.id.tvDateNotification)
    TextView tvNotify;

    @BindView(R.id.btnConfirmNotification)
    Button btnConfirm;

    private WebBaseResponse webBaseResponse;
    private List<NoticeVO> noticeVOList;
    private NoticeVO noticeVO;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.operations_notify);
        ButterKnife.bind(this);

        getNotifies();
        setData();
    }

    private void setData() {
        if (noticeVO != null)
            tvNotify.setText(noticeVO.getDate());
        RxView.clicks(btnConfirm)
            .subscribe(aVoid -> {
                Intent intent = new Intent(getApplicationContext(), ConfirmOperationActivity.class);
                intent.putExtra("notifications1", noticeVO);
                startActivity(intent);
            });
    }

    private void getNotifies() {
        Intent i = getIntent();
//        webBaseResponse = i.getParcelableExtra("notifications");
        noticeVO = i.getParcelableExtra("notifications");
        if (noticeVO == null) {
            NetworkService.getInstance()
                .getJSONApi()
                .getNewNotice()
                .enqueue(new Callback<WebBaseResponse>() {
                    @Override
                    public void onResponse(Call<WebBaseResponse> call, Response<WebBaseResponse> response) {
                        webBaseResponse = response.body();
                        if (webBaseResponse.getContent() != null && !webBaseResponse.getContent().isEmpty())
                            noticeVO = webBaseResponse.getContent().get(0);


                        if (noticeVO != null)
                            tvNotify.setText(noticeVO.getDate());
                    }

                    @Override
                    public void onFailure(Call<WebBaseResponse> call, Throwable t) {
                        Log.d(this.getClass().getSimpleName(), t.getMessage());

                    }
                });
        }
//        noticeVOList = webBaseResponse.getContent();
    }
}
