<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;
    // injecting the repository
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    // show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    // register handle
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['role_id'] = 3;
            $this->userRepository->create($data);
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'general' => ['An error occurred: ' . $e->getMessage()] // Show exception message for debugging
                ]
            ], 500);
        }
    }
    // show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login handle
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role_id; // Get the role_id of the logged-in user

            return response()->json([
                'success' => true,
                'role' => $role,
                'message' => 'Logged in successfully!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
        ], 422);
    }

    private function getRedirectUrl($user)
    {
        if ($user->role_id == 1 || $user->role_id == 2) {
            return route('admin.dashboard');
        } elseif ($user->role_id == 3) {
            return route('user.dashboard');
        } elseif ($user->role_id == 4) {
            return route('manufacturer.dashboard');
        }
        return '/';
    }


    // handle log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }



    public function forgotPasswordIndex()
    {
        return view('auth.forget');
    }

public function home(){
    return view('home');


}



}
