<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip_code' => $request->input('zip_code'),
            'status' => $request->input('status'),
        ];
        
        // Use mass assignment to create a user
        User::create($userData);
        
        return redirect()->route('user.index');
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }
}
