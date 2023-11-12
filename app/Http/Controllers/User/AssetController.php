<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Asset;
use App\Models\BusStop;
use App\Models\UploadAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dt = Carbon::now();
    }

    public function create()
    {
        $cek_img = UploadAsset::whereDATE('created_at', '=', $this->dt->format('Y-m-d'))
            ->where('user_id', Auth::user()->user_id)
            ->whereNull('asset_id')
            ->first();

        $busstops   =  BusStop::all();
        $busKoridor =  $busstops->groupBy('koridor');

        if ($cek_img === NULL) {

            return view('user.asset-user.create', [
                'busstops'      => $busstops,
                'busKoridor'    => $busKoridor,
            ]);
        } else {
            $file_path = storage_path() . "/app/upload_asset/" . $cek_img->filename;
            File::delete($file_path);

            DB::table('upload_assets')->where('user_id', Auth::user()->user_id)
                ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                ->whereNull('asset_id')
                ->delete();

            return redirect()->route('asset.user.create', [
                'busstops'      => $busstops,
                'busKoridor'    => $busKoridor,
            ]);
        }
    }


    public function store(Request $request)
    {
        $messages = [
            'fileImage.required'        => 'Photo Harus Diupload',
            'nomor_tiket.required'      => 'Nomor Tiket Harus Diisi',
            'halte_id.required'         => 'Halte Harus Diisi',
            'nama_barang.required'      => 'Nama Barang Harus Diisi',
            'kondisi.required'          => 'Kondisi Harus Diisi',
            'serial_number.required'    => 'Serial number Harus Diisi',
            'status.required'           => 'Status Harus Diisi',
            'nik_petugas_halte.required'  => 'NIK Petugas Halte Harus Diisi',
            'nama_petugas_halte.required' => 'Nama Petugas Halte Harus Diisi',
        ];

        $request->validate([
            'fileImage'         => 'required',
            'nomor_tiket'       => 'required',
            'halte_id'          => 'required',
            'nama_barang'       => 'required',
            'kondisi'           => 'required',
            'serial_number'     => 'required',
            'status'            => 'required',
            'nik_petugas_halte' => 'required',
            'nama_petugas_halte' => 'required',
        ], $messages);

        $s = $request->fileImage;
        $x = explode("<", $s);

        $imgFile = UploadAsset::where('folder', '=', $x[0])->first();
        if ($imgFile) {
            try {
                $asset = Asset::create([
                    'nomor_tiket'           => $request->nomor_tiket,
                    'halte_id'              => $request->halte_id,
                    'nama_barang'           => $request->nama_barang,
                    'kondisi'               => $request->kondisi,
                    'serial_number'         => $request->serial_number,
                    'status'                => $request->status,
                    'nik_petugas_halte'     => $request->nik_petugas_halte,
                    'nama_petugas_halte'    => $request->nama_petugas_halte,
                    'user_id'               => Auth::user()->user_id,
                ]);

                UploadAsset::where('user_id', Auth::user()->user_id)
                    ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                    ->whereNull('asset_id')
                    ->update([
                        'asset_id' => $asset->id,
                    ]);

                Alert::toast('Asset Berhasil Disubmit', 'success')->width('25rem')->padding('5px');
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
        }
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }
    }
}
