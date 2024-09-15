<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Récupération des marques avec la dernière marque en premier
        $users = User::latest();

        // Filtrage des marques si un mot-clé de recherche est fourni
        if (!empty($request->get('keyword'))) {
            $users = $users->where('name', 'like', '%' . $request->get('keyword') . '%');
            $users = $users->orWhere('email', 'like', '%' . $request->get('keyword') . '%');
        }
        $users = $users->paginate(perPage: 10);

        // Affichage de la vue listant les marques avec les résultats obtenus
        return view('admin.users.list', compact('users'));
    }


    public function create(Request $request)
    {
        return view('admin.users.create',);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = $request->status;
            $user->phone = $request->phone;
            $user->save();
            session()->flash('success', 'User added Successfully.');
            return response()->json([
                'status' => true,
                'message' => 'User added Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $message = 'User Not Found';
            session()->flash('error', $message);
            return redirect()->route('users.index');
        }
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $message = 'User Not Found';
            session()->flash('error', $message);
            return redirect()->route('users.index');
        };

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'phone' => 'required',
        ]);

        if ($validator->passes()) {
            $user->name = $request->name;
            $user->email = $request->email;
            if (!$request->password != '') {
                $user->password = Hash::make($request->password);
            }
            $user->status = $request->status;
            $user->phone = $request->phone;
            $user->save();
            session()->flash('success', 'User added Successfully.');
            return response()->json([
                'status' => true,
                'message' => 'User added Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id, Request $request)
    {
        $user = User::find($id);

        if ($user == null) {
            $message = 'User Not Found';
            session()->flash('error', $message);
            return redirect()->route('users.index');
        };

        $user->delete();
        session()->flash('success', 'User Deleted Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'User Deleted Successfully.'
        ]);
    }
}
