<?php

namespace App\Http\Controllers;

use App\Models\trainercard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainercardController extends Controller
{
    public function checkin($trainerid, $fullname) {
        $status_check = trainercard::where('trainerid', $trainerid)->latest()->get();

        if ($status_check->isNotEmpty()) {
            foreach ($status_check as $status) {
                $status = $status -> status;
            }
            if ($status == '1') {
                return redirect()->back()->with('checkin_fail','กรุณา checkout ก่อน');
            }
        }

        $trainercard = new trainercard();
        $trainercard->trainerid = $trainerid;
        $trainercard->tname = $fullname;
        $trainercard->checkin = Carbon::now();
        $trainercard->checkout = null;
        $trainercard->status = '1';
        $trainercard->save();

        return redirect()->back();
    }

    public function checkout($trainerid) {
        trainercard::where('trainerid', $trainerid)->latest()->update([
            'checkout' => Carbon::now(),
            'status'=> '0',
        ]);

        return redirect()->back();
    }
}
