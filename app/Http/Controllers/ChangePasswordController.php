<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ChangePasswordController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.change_password');
    }

    public function show()
    {
        return view('auth.change_password_expired');
    }

    public function changePassword(Request $request)
    {
        $inputVal = $request->all();

        $messages = [
            'password.required'     => 'Password wajib diisi',
            'password.between'      => 'Password Minimal 8 karakter',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $request->validate([
            'password'          => 'required|confirmed|between:8,255',
        ], $messages);

        $uppercase = preg_match('@[A-Z]@', $inputVal['password']);
        $lowercase = preg_match('@[a-z]@', $inputVal['password']);
        $number    = preg_match('@[0-9]@', $inputVal['password']);
        $special   = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $inputVal['password']);



        if (Hash::check($inputVal['password'], Auth::user()->password)) {
            // The passwords matches
            Alert::toast('Password Baru Tidak Boleh Sama Dengan Password Lama', 'error')->width('25rem')->padding('5px')->autoClose(10000);
            return redirect()->back();
        }

        if (strlen($inputVal['password']) < !$uppercase || !$lowercase || !$number || !$special) {
            Alert::toast('Password Baru harus terdapat Huruf Besar, Huruf Kecil, Angka dan Tanda Baca!.', 'error')->width('25rem')->padding('5px')->autoClose(10000);
            return redirect()->back();
        }



        $td = Carbon::now();
        $last_change = $td->toDateString();

        $user = Auth::user();
        $user->password = Hash::make($inputVal['password']);
        $user->last_change = $last_change;
        $user->save();

        if (auth()->user()->is_admin == 1) {
            Alert::toast('Password Berhasil Diubah', 'success')->width('25rem')->padding('5px');
            return redirect()->route('admin.route');
        } else {
            Alert::toast('Password Berhasil Diubah', 'success')->width('25rem')->padding('5px');
            return redirect()->route('home');
        }
    }

    public function changePasswordExp(Request $request)
    {
        $inputVal = $request->all();

        $messages = [
            'current_password.required'     => 'Password wajib diisi',
            'password.required'             => 'Password Baru wajib diisi',
            'password.between'              => 'Password Baru Minimal 8 karakter',
            'password.confirmed'            => 'Password tidak sama dengan konfirmasi password'
        ];

        $request->validate([
            'password'          => 'required|confirmed|between:8,255',
        ], $messages);

        $uppercase = preg_match('@[A-Z]@', $inputVal['password']);
        $lowercase = preg_match('@[a-z]@', $inputVal['password']);
        $number    = preg_match('@[0-9]@', $inputVal['password']);
        $special   = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $inputVal['password']);

        if (!(Hash::check($inputVal['current_password'], Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Password Salah/ Tidak Sama Dengan Sebelumnya!.");
        }
        if (strcmp($inputVal['current_password'], $inputVal['password']) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "Password Baru Tidak Boleh Sama Dengan Password Lama!.");
        }
        if (strlen($inputVal['password']) < 8 || !$uppercase || !$lowercase || !$number || !$special) {
            return redirect()->back()->with("error", "Password Baru harus minimal 8 Digit serta terdapat Huruf Besar, Huruf Kecil, Angka dan Tanda Baca!.");
        }

        $td = Carbon::now();
        $last_change = $td->toDateString();

        $user = Auth::user();
        $user->password = Hash::make($inputVal['password']);
        $user->last_change = $last_change;
        $user->save();

        if (auth()->user()->is_admin == 1) {
            Alert::toast('Password Berhasil Diubah', 'success')->width('25rem')->padding('5px');
            return redirect()->route('admin.route');
        } else {
            Alert::toast('Password Berhasil Diubah', 'success')->width('25rem')->padding('5px');
            return redirect()->route('home');
        }
    }
}
