<?php

namespace App\Http\Controllers\Sysadmin;

use App\Models\brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = brands::withTrashed()->get();
        return view('sysadmin.brand.index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return view('sysadmin.brand.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required'    => 'Nama Brand Harus Diisi!',
            'name.unique'      => 'Nama Brand Sudah Ada!',
        ];

        $request->validate([
            'name' => 'required|unique:brands',
        ], $messages);

        try {
            brands::create([
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
        $data = brands::findOrFail($decrypted);

        return view('sysadmin.brand.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $brand = brands::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();
            Alert::toast('Data Berhasil Di Ubah.', 'success')->width('25rem')->padding('5px');
            return redirect()->route('brand');
    }

    public function delete($id)
    {
        $brand = brands::findOrFail($id);
        $brand->delete();
        Alert::toast('Data Berhasil Di Non Aktifkan.', 'success')->width('25rem')->padding('5px');
        return back();
    }

    public function restore($id)
    {
        $brand = brands::onlyTrashed()->where('id',$id);
        $brand->restore();
        Alert::toast('Data Berhasil Di Aktifkan.', 'success')->width('25rem')->padding('5px');
        return back();
    }
}
