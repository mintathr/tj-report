<?php

namespace App\Http\Controllers\User;

use App\Models\BusStop;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::get();
        return view('user.inventaris.index', [
            'inventaris'    => $inventaris
        ]);
    }

    public function create()
    {
        $halte  = BusStop::get();
        $busKoridor =  $halte->groupBy('koridor');

        return view('user.inventaris.create', [
            'halte'         => $halte,
            'busKoridor'    => $busKoridor
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'halte_id.required'         => 'Nama Halte Harus Diisi!',
            'nama_barang.required'      => 'Nama Barang Harus Diisi!',
            'serial_number.required'    => 'Serial Number Harus Diisi!',
            'qty.required'              => 'Qty Harus Diisi!',
        ];

        $request->validate([
            'halte_id'      => 'required',
            'nama_barang'   => 'required',
            'serial_number' => 'required',
            'qty'           => 'required',
        ], $messages);

        try {
            Inventaris::create([
                'halte_id'          => $request->halte_id,
                'nama_barang'       => $request->nama_barang,
                'serial_number'     => $request->serial_number,
                'qty'               => $request->qty,
                'user_id'           => Auth::user()->user_id
            ]);
            Alert::toast('Data Berhasil disimpan', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back();
    }
    
}
