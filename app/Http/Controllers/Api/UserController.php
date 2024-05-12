<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(),'Data profile user berhasil diambil');
    }

    public function login(Request $request){
        // try{
            $request->validate([
                'email' =>  'required',
                'password' =>  'required',
            ]);

            $credentials = request(['email','password']);
            if (Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message'   =>  'Unauthorixed',

                ], 'Authentication Failed',500);
            }

            $user = User::where('email',$request->email)->first();
            if (!Hash::check($request->password == $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token'  =>  $tokenResult,
                'token_type'    =>  'Bearer',
                'user'          =>  $user,
            ], 'Authenticated');
        // } catch(Exception $error){
        //     return ResponseFormatter::error([
        //         'message'   =>  'Something went wrong',
        //         'error'     =>  $error,
        //     ], 'Authentication Failed', 500);
        // }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required', 'string'
            ]);

            User::create([
                'nama_lengkap' => $request->name,
                'email' => $request->email,
                'nomor_whatsapp' => $request->address,
                'alamat' => $request->houseNumber,
                'password' => Hash::make($request->password),
                'role'      =>  'mitra',
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'User Registered');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token,'Token Revoked');
    }

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Photo Fails', 401);
        }

        if ($request->file('file')) {

            $file = $request->file->store('assets/user', 'public');

            //store your file into database
            $user = Auth::user();
            $user->foto = $file;
            $user->update();

            return ResponseFormatter::success([$file],'File successfully uploaded');
        }
    }
}
