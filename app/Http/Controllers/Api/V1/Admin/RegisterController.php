<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone_no' =>  ['required', 'unique:users,phone_no'],
            'password' => 'required|min:6',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'code' => 400,
                'message' => "The phone number has already been taken!",
                'data' => [
                    "name" => "Nolle",
                    "phone_no" => "098767332322",
                    "password" => "password123",
                    "updated_at" => "2024-05-20T05:44:21.000000Z",
                    "created_at" => "2024-05-20T05:44:21.000000Z",
                    "id" => 1
                ]
            ],200);
        }

        $user = User::create($request->all());
        return  response()->json([
            "code" => 200,
            "message"=> 'Success!',
            "data" => $user,
            // "token" => $jwt_token
        ],200);
    }

    public function login(Request $request)
    {
        {
            $validator = Validator::make($request->all(),[
                'password'=>'required',
                'phone_no'=>'required',
            ]);
    
            if($validator->fails())
            {
                return response()->json([
                    'message' => 'Validation failed',
                    'error'=>$validator->errors()
                ],400); // 400 message is required
            }
    
            $credentials = request(['phone_no', 'password']);
            if (!auth()->attempt($credentials)) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        'password' => [
                            'Invalid credentials'
                        ],
                    ]
                ], 422); // 422 request fails
            }
        
            $user = User::find(auth()->user()->id);
            $jwt_token = JWTAuth::fromUser($user);
        
                 return response()->json([
                    'token'=>$jwt_token,
                    'data'=>$user,
                    'status'=> 200
                 ],200);
        }
    }
}
