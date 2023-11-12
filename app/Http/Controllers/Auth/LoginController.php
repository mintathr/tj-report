<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal   = $request->all();

        $this->validate($request, [
            'user_id'   => 'required|integer',
            'password'  => 'required|min:8',
        ]);

        $td                 = Carbon::now();
        $tanggal_sekarang   = $td->toDateString();

        if (auth()->attempt(array(
            'user_id'   => $inputVal['user_id'],
            'password'  => $inputVal['password'],
        ))) {
            $cek_tgl_ubah   = User::where([
                ['user_id', '=', $inputVal['user_id']]
            ])->first();

            $last_change    = Carbon::parse($cek_tgl_ubah->last_change);
            //hitung selisih tgl sekarang dgn tgl terakhir ubah
            $selisih_hari   = $last_change->diffInDays(now());

            if (auth()->user()->block >= 3) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'NIK Terblokir!.');
            } elseif (auth()->user()->is_admin == 1 and auth()->user()->block <= 2) {
                User::where('user_id', $inputVal['user_id'])->update(['block' => 0,]);

                if ($inputVal['password'] == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                }

                if ($selisih_hari <= 30) {
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('admin');
                } else {
                    return redirect()->route('changePasswordExp');
                }
            } elseif (auth()->user()->is_admin == 0 and auth()->user()->block <= 2) {
                User::where('user_id', $inputVal['user_id'])->update(['block' => 0,]);

                if ($inputVal['password'] == "P@ssw0rd") {
                    return redirect()->route('changePasswordExp');
                }

                if ($selisih_hari <= 30) {
                    Alert::toast('Login Berhasil', 'success')->width('25rem')->padding('5px');
                    return redirect()->route('home');
                } else {
                    return redirect()->route('changePasswordExp');
                }
            }
        } else {
            $cek_block  = User::where([
                ['user_id', '=', $inputVal['user_id']]
            ])->first();
            $awal_block = $cek_block['block'];

            if ($awal_block >= 3) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'NIK Terblokir!.');
            }

            User::where('user_id', $inputVal['user_id'])->update(['block' => $awal_block + 1]);
            return redirect()->route('login')->with('error', 'NIK & Password Salah!.');
        }
    }
}
