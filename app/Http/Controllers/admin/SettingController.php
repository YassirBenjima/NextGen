<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{
    public function showChangePassword()
    {
        $adminId = Auth::guard('admin')->user()->id;
        $countries = Country::orderBy('name', 'ASC')->get();
        $admin = User::where('id', $adminId)->where('role', 2)->first();
        $address = CustomerAddress::where('user_id', $adminId)->first();
        $totalOrdersDelivered = Order::where("status", "=", "delivered")->count();
        $totalRevenue = Order::where("status", "=", "delivered")->sum('grand_total');

        return view('admin.setting.change-password', [
            'user' => $admin,
            'countries' => $countries,
            'address' => $address,
            'totalOrdersDelivered' => $totalOrdersDelivered,
            'totalRevenue' => $totalRevenue
        ]);
    }


    public function processChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentpassword' => 'required',
            'newpassword' => 'required|min:5',
            'confirmpassword' => 'required|same:newpassword'
        ]);
        $admin = User::where('id', Auth::guard('admin')->user()->id)->first();
        if ($validator->passes()) {
            if (!Hash::check($request->currentpassword, $admin->password)) {
                session()->flash('error', 'Your old password is incorrect, please try again.');
                return response()->json([
                    'status' => false,
                    'error' => 'Your old password is incorrect, please try again.'
                ]);
            };
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        User::where('id', Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        session()->flash('success', 'You have successfully changed your password.');

        return response()->json([
            'status' => true,
        ]);
    }
}
