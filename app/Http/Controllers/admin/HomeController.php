<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $totalOrders = Order::where("status", "!=", "canclled")->count();
        $totalOrderspending = Order::where("status", "=", "pending")->count();
        $totalRevenue = Order::where("status", "=", "pending")->sum('grand_total');
        $totalRevenueMaroc = Order::where("status", "=", "pending")
            ->where("city", "=", "Morocco")
            ->sum('grand_total');
        $totalRevenueAlgerie = Order::where("status", "=", "pending")
            ->where("city", "=", "Algerie")
            ->sum('grand_total');
        $totalRevenueOthers = Order::where("status", "=", "pending")
            ->where("city", "!=", "Morocco")
            ->sum('grand_total');
        $totalProducts = Product::count();
        return view("admin.dashboard", [
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalOrderspending' => $totalOrderspending,
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
