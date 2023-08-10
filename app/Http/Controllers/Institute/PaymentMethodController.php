<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PaymentMethodController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentMethod::where('ins_id', auth()->user()->id)->get();
        return view('institute.payment-menthod.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institute.payment-menthod.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required | string | max:255',
            'account_number' => 'required | string | max:255',
            'logo.*' => 'required | image | mimes:jpg,png,jpeg | max:255',
            'short_description' => 'required | string | max:255'
        ]);

        $path = 'uploads/payment/';
        $imgName = time().Str::random(5).'.'.$request->file('logo')->getClientOriginalExtension();
        Image::make($request->file('logo'))->resize(300, 155)->save(base_path($path.$imgName));

        PaymentMethod::insert([
            'ins_id' => auth()->user()->id,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'logo' => $path.$imgName,
            'short_description' => $request->short_description,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PaymentMethod::where([['id', $id], ['ins_id', auth()->user()->id]])->first();
        return view('institute.payment-menthod.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'account_name' => 'required | string | max:255',
            'account_number' => 'required | string | max:255',
            'logo.*' => 'string | max:255',
            'short_description' => 'required | string | max:255'
        ]);

        $data = PaymentMethod::where([['id', $id], ['ins_id', auth()->user()->id]])->first();
        if ($request->hasFile('logo')) {
            unlink(base_path($data->logo));
            $path = 'uploads/payment/';
            $imgName = time().Str::random(5).'.'.$request->file('logo')->getClientOriginalExtension();
            Image::make($request->file('logo'))->resize(300, 155)->save(base_path($path.$imgName));
            $data->update([
                'logo' => $path.$imgName
            ]);
        }
        $data->update([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'short_description' => $request->short_description
        ]);
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PaymentMethod::where([['id', $id], ['ins_id', auth()->user()->id]])->first();
        unlink(base_path($data->logo));
        $data->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
