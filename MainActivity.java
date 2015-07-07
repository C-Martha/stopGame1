package com.example.jeffrey.stopgame;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;


public class MainActivity extends ActionBarActivity {



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    public void SendMessage(View view)
    {
        EditText PlayerIDView = (EditText)(findViewById(R.id.PlayerID));
        EditText AnswerView = (EditText)(findViewById(R.id.answer));
        String  PlayerID = PlayerIDView.getText().toString();
        String  Answer = AnswerView.getText().toString();
        TextView MessageSent=(TextView)(findViewById(R.id.MessageSent));
        MessageSent.setVisibility(View.VISIBLE);
        //System.out.println(PlayerID);
        //System.out.println(Answer);
    }
}
