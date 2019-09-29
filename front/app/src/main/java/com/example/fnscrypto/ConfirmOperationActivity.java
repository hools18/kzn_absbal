package com.example.fnscrypto;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import com.example.myapplication.R;

import butterknife.ButterKnife;

public class ConfirmOperationActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.confirm_operation);
        ButterKnife.bind(this);

        initButtons();
    }

    private void initButtons() {

    }
}
