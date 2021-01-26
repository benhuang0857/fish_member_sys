<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class RemoteCreateUserController extends Controller
{
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $User = new User;
        $Application = User::create($request->all());

        return response()->json($User, 201);
    }
}
