<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login | SI Eka Indah',
            'nav' => 'login'
        ];
        return view('backend.login.index', $data);
    }

    public function auth(Request $request)
    {
        if (!$request->ajax()) {
            return "Maaf tidak dapat diproses";
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $errors = [];
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
            ],
            'password' => [
                'required'
            ],
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
        }

        if (!empty($errors)) {
            $msg = [
                'error' => $errors,
            ];
        } else {
            //cek email dulu ke database
            $query_email = DB::table('users')->select('*')->where('email', $email)->get();
            $user_mail = $query_email->toArray();

            if (count($user_mail) > 0) {
                //Jika username ada maka lanjutkan verifikasi password
                $row = $query_email->first();
                $password_user = $row->password;

                if (password_verify($password, $password_user)) {
                    // Jika password benar, maka buat session
                    $login = [
                        'isLoggedIn' => 1,
                        'id' => $row->id,
                        'username' => $row->username,
                        'role' => $row->role,
                        'foto' => $row->foto
                    ];

                    Session::put($login); // Menyimpan data session menggunakan helper session()

                    $msg = [
                        'sukses' => [
                            'link' => url('admin/dashboard'), // Menggunakan helper url() untuk membangun URL
                        ]
                    ];
                } else {
                    $msg = [
                        'error' => [
                            'wrong_password' => 'Email/password yang anda masukkan salah'
                        ],
                    ];
                }
            } else {
                $msg = [
                    'error' => [
                        'wrong_password' => 'Email/password yang anda masukkan salah'
                    ],
                ];
            }
        }

        echo json_encode($msg);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
