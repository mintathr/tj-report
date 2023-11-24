<?php

namespace App\Http\Controllers\Sysadmin;

use App\Models\BusStop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusStopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busstops = BusStop::withTrashed()->get();
        return view('sysadmin.busstop.index', [
            'busstops' => $busstops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sysadmin.busstop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nama_halte.required'    => 'Nama Halte Harus Diisi!',
            'nama_halte.unique'      => 'Nama Halte Sudah Ada!',
        ];

        $request->validate([
            'nama_halte' => 'required|unique:bus_stops',
        ], $messages);
    

        if(is_null($request->koridor)){
            $koridor = 99; //halte non brt
        }else{
            $koridor = $request->koridor;
        }

        try {
            BusStop::create([
                'nama_halte'        => $request->nama_halte,
                'koridor'           => $koridor,
            ]);
            Alert::toast('Data Berhasil disimpan', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusStop  $busStop
     * @return \Illuminate\Http\Response
     */
    public function show(BusStop $busStop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusStop  $busStop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decrypted = Crypt::decryptString($id);
        $data = BusStop::findOrFail($decrypted);
        return view('sysadmin.busstop.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusStop  $busStop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $busstop = BusStop::findOrFail($id);
        $busstop->nama_halte = $request->nama_halte;
        $busstop->koridor = $request->koridor;
        $busstop->save();
            Alert::toast('Data Berhasil Di Ubah.', 'success')->width('25rem')->padding('5px');
            return redirect()->route('halte');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusStop  $busStop
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusStop $busStop)
    {
        //
    }
}
