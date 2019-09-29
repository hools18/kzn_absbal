package com.example.fnscrypto;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.myapplication.R;

import java.util.ArrayList;
import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import ru.absolutebalance.common.LoginResponseVO;

public class ConfirmOperationActivity extends AppCompatActivity {

    @BindView(R.id.spinner_dates)
    Spinner dates;

    LoginResponseVO loginResponseVO;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.confirm_operation);
        ButterKnife.bind(this);

        getUser();
        initButtons();

        addItemsOnSpinner2();
        addListenerOnButton();
        addListenerOnSpinnerItemSelection();
    }

    // add items into spinner dynamically
    public void addItemsOnSpinner2() {
        List<String> list = new ArrayList<String>();

        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(getApplicationContext(),
            android.R.layout.simple_spinner_item, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        dates.setAdapter(dataAdapter);
    }

    public void addListenerOnSpinnerItemSelection() {

    }

    // get the selected dropdown list value
    public void addListenerOnButton() {

    }

    private void getUser() {
        Intent i = getIntent();
        loginResponseVO = (LoginResponseVO) i.getParcelableExtra("user");
    }

    private void initButtons() {

    }
}
