<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Image;

class FrontendPaymentController extends Controller
{
    public function index($id){
        $method = PaymentMethod::where('id', Crypt::decrypt($id))->first();
        return view('user.pay', compact('method'));

    }

    public function store(Request $request, $id) {
        $request->validate([
            'amount' => 'required | numeric | min:500 | max:100000',
            'send_from_number' => 'required | string | max:255',
            'transaction_id' => 'required | string | max:255',
            'screenshoot' => 'required | image | mimes:jpg,png'
        ]);
        $id = Crypt::decrypt($id);

        $path = 'uploads/screenshoot/';
        $imgName = time().Str::random(5).'.'.$request->file('screenshoot')->getClientOriginalExtension();
        Image::make($request->file('screenshoot'))->save(base_path($path.$imgName));


        Payment::insert([
            'user_id' => auth()->user()->id,
            'payment_method_id' => $id,
            'amount' => $request->amount,
            'send_from_number' => $request->send_from_number,
            'transaction_id' => $request->transaction_id,
            'screenshoot' => $path.$imgName,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Your payment has been submited successfully');
    }
}
