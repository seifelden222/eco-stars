<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function signupChild(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'grade' => 'required|string|max:50',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        // التأكد إن الرقم مش مسجل قبل كده
        $existingUser = User::where('parent_phone', $request->parent_phone)
            ->where('role', 'child')
            ->first();

        if ($existingUser) {
            return response()->json([
                'message' => 'هذا الرقم مسجل بالفعل لطفل آخر.'
            ], 409); // Conflict
        }

        // إنشاء بريد إلكتروني فريد مؤقت باستخدام الرقم + timestamp
        $email = $request->parent_phone . '+' . time() . '@child.com';

        $user = User::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'grade' => $request->grade,
            'parent_name' => $request->parent_name,
            'parent_phone' => $request->parent_phone,
            'email' => $email,
            'password' => Hash::make($request->password),
            'role' => 'child',
        ]);

        $token = $user->createToken('child-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
