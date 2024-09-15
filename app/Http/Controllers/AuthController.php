<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Country;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Affiche la vue pour la connexion
    public function login()
    {
        return view('front.account.login');
    }
    // Affiche la vue pour l'enregistrement
    public function register()
    {
        return view('front.account.register');
    }

    // Processus d'enregistrement d'un utilisateur
    public function processRegister(Request $request)
    {
        // Validation des données envoyées
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:confirm-password'
        ]);

        if ($validator->passes()) {
            // Insertion des données dans la table des utilisateurs
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            // Message de succès et réponse JSON
            session()->flash('success', 'You Have been registred successfully');
            return response()->json([
                'status' => true,
            ]);
        } else {
            // Retourne les erreurs de validation
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Authentification de l'utilisateur
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            // Authentification de l'utilisateur
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // Redirection après l'authentification réussie
                if (session()->has('account.profile')) {
                    return redirect(session()->get('account.profile'));
                }
                return redirect()->route('account.profile');
            } else {
                // Redirection avec un message d'erreur si l'authentification échoue
                session()->flash('error', 'Email OR Password is incorrect');
                return redirect()->route('account.login')->withInput($request->only('email'))->with('error', 'Email OR Password is incorrect');
            }
        } else {
            // Retourne les erreurs de validation si la validation échoue
            return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }
    // Affiche la vue du profil utilisateur
    public function profile()
    {
        $userId = Auth::user()->id;
        $countries = Country::orderBy('name', 'ASC')->get();
        $user = User::where('id', $userId)->first();
        $address = CustomerAddress::where('user_id', $userId)->first();

        return view('front.account.profile', [
            'user' => $user,
            'countries' => $countries,
            'address' => $address,
        ]);
    }
    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId . ',id',
            'phone' => 'required'
        ]);
        if ($validator->passes()) {
            $user = User::find($userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();
            session()->flash('success', 'Profile Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Profile Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function updateAddress(Request $request)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required',
            'email' => 'required',
            'country_id' => 'required',
            'address' => 'required|min:15',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->passes()) {
            CustomerAddress::updateOrCreate(
                ['user_id' => $userId],
                [
                    'user_id' => $userId,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'country_id' => $request->country_id,
                    'address' => $request->address,
                    'apartment' => $request->apartment,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                ]
            );
            session()->flash('success', 'Address Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Address Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout();
        session()->forget('code');
        return redirect()->route('account.login')->with('success', 'You successfully logged out !');
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $data['orders'] = $orders;
        return view('front.account.order', $data);
    }

    public function orderDetail($id)
    {
        $data = [];
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $id)->first();
        $data['order'] = $order;
        $orderItems = OrderItem::where('order_id', $id)->get();
        $data['orderItems'] = $orderItems;
        return view('front.account.order-detail', $data);
    }
}
