<?php

namespace App\Http\Controllers\Sysadmin;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Items::withTrashed()->get();
        return view('sysadmin.item.index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('sysadmin.item.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required'    => 'Nama Item Harus Diisi!',
            'name.unique'      => 'Nama Item Sudah Ada!',
        ];

        $request->validate([
            'name' => 'required|unique:items',
        ], $messages);

        try {
            Items::create([
                'name'        => $request->name,
            ]);
            Alert::toast('Data Berhasil disimpan', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back();
    }

    public function edit($id)
    {
        $decrypted = Crypt::decryptString($id);
        $data = Items::findOrFail($decrypted);

        return view('sysadmin.item.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Items::findOrFail($id);
        $item->name = $request->name;
        $item->save();
            Alert::toast('Data Berhasil Di Ubah.', 'success')->width('25rem')->padding('5px');
            return redirect()->route('item');
    }

    public function delete($id)
    {
        $item = Items::findOrFail($id);
        $item->delete();
        Alert::toast('Data Berhasil Di Non Aktifkan.', 'success')->width('25rem')->padding('5px');
        return back();
    }

    public function restore($id)
    {
        $item = Items::onlyTrashed()->where('id',$id);
        $item->restore();
        Alert::toast('Data Berhasil Di Aktifkan.', 'success')->width('25rem')->padding('5px');
        return back();
    }

}
