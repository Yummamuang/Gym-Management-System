<?php

namespace App\Http\Controllers;

use App\Models\membercard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembercardController extends Controller
{
    public function checkin($memberid, $fullname) {
        $status_check = membercard::where('memberid', $memberid)->latest()->get();

        if ($status_check->isNotEmpty()) {
            foreach ($status_check as $status) {
                $status = $status -> status;
            }
            if ($status == '1') {
                return redirect()->back()->with('checkin_fail','กรุณา checkout ก่อน');
            }
        }

        $membercard = new membercard();
        $membercard->memberid = $memberid;
        $membercard->mname = $fullname;
        $membercard->checkin = Carbon::now();
        $membercard->checkout = null;
        $membercard->status = '1';
        $membercard->save();

        return redirect()->back();
    }

    public function checkout($memberid) {
        membercard::where('memberid', $memberid)->latest()->update([
            'checkout' => Carbon::now(),
            'status'=> '0',
        ]);

        return redirect()->back();
    }
}
