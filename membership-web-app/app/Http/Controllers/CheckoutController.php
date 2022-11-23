<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\State\Paid;
use DateTime;

class CheckoutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [
            'productID' => $id
        ];
        // dd($data);
        // dd($productID);
        return view('pages.checkout-page', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'requiredc',
            'product' => 'required'
        ]);




        $product = Product::find($request->product);
        $month = $product->duration;
        switch ($month) {
            case '1 Month':
                $month = 1;
                break;
            case '3 Month':
                $month = 3;
                break;
            case '6 Month':
                $month = 3;
                break;
        }

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'register_duration' => Carbon::now(),
            'end_duration' => Carbon::now()->addMonths($month),
            'user_id' => Auth::user()->id,
            'product_id' => $request->product
        ]);


        Payment::create([
            'payment_code' => 'PDO' . rand(1924, 2913),
            'status_payment' => 'PAID',
            'customer_id' => $customer->id,
            'product_id' => $request->product
        ]);
        $memberRole = Role::find(2);
        $user = Auth::user()->id;
        $userd = User::find($user);
        $userRole = User::where('id', $user)->with('roles')->get();
        if ($userRole[0]->roles[0]->name == 'guest') {
            $userd->assignRole($memberRole->name);
        }
        session()->flash('message', 'Success Created.');
        return redirect()->route('dashboard');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard()
    {
        $user = Auth::user()->id;
        $customer = Customer::where('user_id', $user)->first();
        $habis = Carbon::parse($customer->end_duration);
        $hariini = Carbon::now();
        $limit = $habis->diff($hariini);
        if ($limit->d == 7) {
            // Kasih notifikasi menggunakan mailtrap
            session()->flash('message', 'Limit anda sudah mau habis.');
        }
        // dd($limit->d);
        $data = [
            'customer' => $customer,
            'limit' => $limit->d
        ];
        return view('pages.dashboard-membership', $data);
    }
}
