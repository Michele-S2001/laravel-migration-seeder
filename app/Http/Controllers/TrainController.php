<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index() {
        // filtered trains by the current departure time
        $trains = Train::all();

        return view('index', compact('trains'));
    }

    // function that get the current time with carbon
    public function getCurrTime() {
        $currTime = Carbon::now()->toTimeString();
        return $currTime;
    }
}
