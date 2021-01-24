<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score_History;

class ScoreRecoderController extends Controller
{
    public function GameOver()
    {
        $Score_History = new Score_History;
    }
}
