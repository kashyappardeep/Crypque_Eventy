<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventTraning;
use App\Models\PaymentHistory;

class TrainingEventController extends Controller
{
    public function index($id)
    {
        $EventTraning = EventTraning::where('event_id', $id)->get();
        $PaymentHistory = PaymentHistory::where('user_id', auth()->id())
            ->where('event_id', $id)
            ->where('status', 2)->first();
        if ($PaymentHistory == null) {
            return redirect()->route('dashboard')->with('msg', 'Please buy the event.');
        }
        return view('Event_traning.index', compact('EventTraning'));
    }
}
