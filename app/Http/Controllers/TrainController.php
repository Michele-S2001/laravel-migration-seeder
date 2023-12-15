<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
  public function index()
  {
    // filtered trains by the current departure time
    $trains = Train::where('departure_date', '>=', $this->getCurrDate())->get();
    // dd($trains);
    return view('index', compact('trains'));
  }

  // function that get the current time with carbon
  public function getCurrDate()
  {
    $currTime = Carbon::now()->toDateString();
    return $currTime;
  }
}
