<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private $header;

    public function __construct()
    {
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $deviceName = $request->device_name;

        if (! $email || ! $password) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }

        $staff = Staff::where('email', $email)->first();

        if (! $staff || ! Hash::check($password, $staff->password)) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $staff->createToken($deviceName)->plainTextToken;
        $content = [
            'status' => 'success',
            'data' => $token,
            'message' => 'successfully login.'
        ];

        return response()->json($content, 200, $this->header);
    }
}
