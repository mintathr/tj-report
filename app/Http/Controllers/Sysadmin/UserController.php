<?php

namespace App\Http\Controllers\Sysadmin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::withTrashed()->where('role', '!=', 'saradm')->get();
        return view('sysadmin.user.index', compact('users'));
    }

    public function create()
    {
        return view('sysadmin.user.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'user_id.required'  => 'NIK harus diisi',
            'user_id.unique'    => 'NIK sudah terdaftar',
            'user_id.min'       => 'NIK min 3 angka',
            'name.required'     => 'Nama harus diisi',
        ];

        $request->validate([
            'user_id'  => 'required|unique:users|min:3',
            'name'     => 'required',
        ], $messages);

        if ($request->role === 'user') {
            $isadmin = 0;
        } elseif ($request->role === 'admin') {
            $isadmin = 1;
        }

        $td = Carbon::now();
        $last_change = $td->toDateString();

        try {
            User::create([
                'user_id'       => $request->user_id,
                'name'          => ucwords($request->name),
                'password'      => Hash::make('P@ssw0rd'),
                'is_admin'      => $isadmin,
                'role'          => $request->role,
                'block'         => 0, //new login
                'last_change'   => $last_change,
            ]);
            Alert::toast('User Login Berhasil Ditambah.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }

    public function unblock(User $user)
    {
        $user = User::findOrFail($user->id);
        try {
            User::where('user_id', $user->user_id)
                ->update(['block' => 0]);

            Alert::toast('User Berhasil Diunblock.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        try {
            $user->delete();
            Alert::toast('User Berhasil Di Non Aktif.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }

    /* RESTORE SOFTDELETE */
    public function restore($id)
    {
        try {
            User::withTrashed()
                ->where('id', $id)
                ->restore();
            Alert::toast('User Berhasil Di Aktifkan Kembali.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
            return redirect()->route('user');
        }

        return redirect()->route('user');
    }
    
    /* RESET PASSWORD */
    public function resetUser(User $user)
    {
        $user = User::findOrFail($user->id);
        $pass = Hash::make('P@ssw0rd');

        try {
            User::where('user_id', $user->user_id)
                ->update(['password' => $pass]);

            Alert::toast('Password Berhasil Direset.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }
    
    public function edit(User $user)
    {
        $user = User::where('user_id', $user->user_id)->first();

        return view('sysadmin.user.edit', [
            'user'         => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        
        if ($request->role === 'user') {
            $isadmin = 0;
        } elseif ($request->role === 'admin') {
            $isadmin = 1;
        }

        try {
            $user->update([
                'name'       => $request->name,
                'role'       => $request->role,
                'is_admin'   => $isadmin,
            ]);

            Alert::toast('User Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->route('user');
    }
    
}
