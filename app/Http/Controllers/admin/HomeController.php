<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalOrders = Order::where("status", "!=", "canclled")->count();
        $totalOrdersDelivered = Order::where("status", "=", "delivered")->count();
        $totalRevenue = Order::where("status", "=", "delivered")->sum('grand_total');
        $totalRevenueMaroc = DB::table('orders')
            ->join('countries', 'orders.country_id', '=', 'countries.id')
            ->where('orders.status', 'delivered')
            ->where('countries.name', 'Morocco')
            ->sum('orders.grand_total');
        $totalRevenueAlgerie = DB::table('orders')
            ->join('countries', 'orders.country_id', '=', 'countries.id')
            ->where('orders.status', 'delivered')
            ->where('countries.name', 'Algeria')
            ->sum('orders.grand_total');
        $totalRevenueOthers = Order::where("status", "=", "delivered")
            ->where("city", "!=", "Morocco")
            ->sum('grand_total');
        $totalProducts = Product::count();
        return view("admin.dashboard", [
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalOrdersDelivered' => $totalOrdersDelivered,
            'totalRevenue' => $totalRevenue,
            'totalRevenueMaroc' => $totalRevenueMaroc,
            'totalRevenueAlgerie' => $totalRevenueAlgerie,
            'totalRevenueOthers' => $totalRevenueOthers,
        ]);

        // $admin = Auth::guard('admin')->user();
        // echo 'Welcome  ' . $admin->name . '<a href="'.route('admin.logout').'"> Logout</a>' ;
    }

    public function logout()
    {
        // Déconnexion de l'administrateur
        Auth::guard('admin')->logout();

        // Redirection vers la page de connexion pour les administrateurs
        return redirect()->route('admin.login');
    }
}
