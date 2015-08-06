package com.example.jeffrey.stop;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;


public class ResultsPage extends ActionBarActivity {

    String RoomCode;
    String PlayerID;
    String result;
    int counter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_results_page);

        Intent intent = getIntent();

        Bundle b = intent.getExtras();

        PlayerID = b.getString("username");
        RoomCode = b.getString("code");
        result = b.getString("result");
        counter = b.getInt("counter");

        displayResults(result);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_results_page, menu);
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

    public void displayResults(String result)
    {
        //decipher results string, then build table holding results
        //waiting for post request php script of sending/receiving results to be fixed
        //can not write code for making table, waiting for post request to be fixed so the format
        //      of the results string is known
    }

    //when NextRound is pressed, start a new game round
    //note: waiting for post request to check if all players are ready to be written
    public void NextRound(View view)
    {
        counter += 1;
        Bundle b = new Bundle();
        b.putString("username", PlayerID);
        b.putString("code", RoomCode);
        b.putInt("counter", counter);
        Intent Rintent = new Intent(this, MainGame.class);
        Rintent.putExtras(b);
        Rintent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        startActivity(Rintent);
        //close ResultsPage so a new one can be created after next round
        finish();


    }

}
