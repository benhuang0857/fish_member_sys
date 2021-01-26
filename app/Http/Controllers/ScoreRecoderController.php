<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score_Recoder;

class ScoreRecoderController extends Controller
{
    public function GameStart()
    {
        $Score_Recoder = new Score_Recoder;
        $uid = $_POST['uid'];
        $mac = $_POST['mac'];
        $seat_num = $_POST['seat_num'];

        $Score_Recoder->uid = $uid;
        $Score_Recoder->mac = $mac;
        $Score_Recoder->seat_num = $seat_num;
        $Score_Recoder->save();
        
    }

    public function GameOver()
    {
        $Score_Recoder = new Score_Recoder;
    }
}
