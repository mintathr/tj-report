<?php

namespace App\Http\Controllers\Sysadmin;

use App\Models\Asset;
use App\Models\BusStop;
use App\Models\UploadAsset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdmAssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $assets     = Asset::all();

        #$assets = UploadAsset::all();
        #$assets     = Asset::join('upload_assets as b', 'b.asset_id', '=', 'assets.id')->get();
        #dd($assets);

        /*  foreach ($assets as $p => $q) {
            #echo $q->user_id;
            #echo '<br>';
            #echo $p;
            foreach ($q as $r) {
                echo $r;
            }
        }
        dd($uploadFile); */

        return view('sysadmin.asset-adm.index', [
            'assets' => $assets,
        ]);
    }

    public function show($id)
    {
        $imgFiles = UploadAsset::where('asset_id', $id)->get();

        return view('sysadmin.asset-adm.show', [
            'imgFiles'  => $imgFiles,
        ]);
    }

    public function getDownload($filename)
    {
        $filePhoto = storage_path() . "/app/upload_asset/" . $filename;

        $headers = [
            'Content-Type' => 'image/jpg',
            'Content-Type' => 'image/jpeg',
            'Content-Type' => 'image/png',
        ];

        return response()->download($filePhoto, $filename, $headers);
    }
    
    public function edit(Asset $asset)
    {
        $asset = Asset::where('id', $asset->id)->first();
        $busstops   =  BusStop::all();
        $busKoridor =  $busstops->groupBy('koridor');

        return view('sysadmin.asset-adm.edit', [
            'asset'         => $asset,
            'busstops'      => $busstops,
            'busKoridor'    => $busKoridor,
        ]);
    }

    public function update(Request $request, Asset $asset)
    {
        $asset = Asset::findOrFail($asset->id);

        try {
            $asset->update([
                'halte_id'          => $request->halte_id,
                'nama_barang'       => $request->nama_barang,
                'kondisi'           => $request->kondisi,
                'serial_number'     => $request->serial_number,
                'status'            => $request->status,
                'nik_petugas_halte' => $request->nik_petugas_halte,
                'nama_petugas_halte' => $request->nama_petugas_halte,
            ]);

            Alert::toast('Asset Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->route('admin.listAsset');
    }
    
    public function destroy(Asset $asset)
    {
        $asset = Asset::findOrFail($asset->id);
        try {
            $asset->delete();
            Alert::toast('Asset Berhasil di Hapus.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }
}
