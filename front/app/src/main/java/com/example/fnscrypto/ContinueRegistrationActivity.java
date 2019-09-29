package com.example.fnscrypto;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import com.example.myapplication.R;

import butterknife.ButterKnife;

public class ContinueRegistrationActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registration_passport);
        ButterKnife.bind(this);

        initButtons();
    }

    private void initButtons() {

    }
}
