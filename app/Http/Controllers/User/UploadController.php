<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\UploadPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('fileImage')) {
            $file               = $request->file('fileImage');
            $filename           = $file->getClientOriginalName();
            $folder             = Auth::user()->user_id . '-' . uniqid() . '-' . now()->timestamp;
            $td                 = Carbon::now();
            $tanggal_sekarang   = $td->toDateString();
            #$new_name = $tanggal_sekarang . "_" . Auth::user()->user_id . "_" . $filename;
            $replace_name       = date('YmdHis') . Auth::user()->user_id . ' ' . $filename;

            $file->storeAs('upload_problem/', $replace_name);

            UploadPhoto::create([
                'user_id'       => Auth::user()->user_id,
                'folder'        => $folder,
                'filename'      => $replace_name,
                'status_poto'   => 'Problem'
            ]);

            return $folder;
        }
        return '';
    }

    public function delete(Request $request)
    {
        $s          = $request->getContent();
        $x          = explode("<", $s);
        $cek        = UploadPhoto::select('folder', 'filename')->where('folder', $x)->first();

        $file_path  = storage_path() . "/app/upload_problem/" . $cek->filename;

        if (file_exists($file_path)) {
            UploadPhoto::where('folder', $x)->delete();
            File::delete($file_path);
        } else {
            return Redirect::back()->with('error', 'Photo Tidak Ditemukan');
        }
    }

    public function storePerbaikan(Request $request)
    {
        if ($request->hasFile('fileImage')) {
            $file               = $request->file('fileImage');
            $filename           = $file->getClientOriginalName();
            $folder             = Auth::user()->user_id . '-' . uniqid() . '-' . now()->timestamp;
            $td                 = Carbon::now();
            $tanggal_sekarang   = $td->toDateString();
            #$new_name = $tanggal_sekarang . "_" . Auth::user()->user_id . "_" . $filename;
            $replace_name       = date('YmdHis') . Auth::user()->user_id . ' ' . $filename;

            $file->storeAs('upload_problem/', $replace_name);

            UploadPhoto::create([
                'user_id'       => Auth::user()->user_id,
                'folder'        => $folder,
                'filename'      => $replace_name,
                'status_poto'   => 'Perbaikan'
            ]);

            return $folder;
        }
        return '';
    }
}
