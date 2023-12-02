<?php

namespace App\Exports;

use App\Models\Inventaris;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class InventarisExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return Inventaris::all();
    } */
    public function view(): View
    {
        return view('user.inventaris.export_excel', [
            'inventaris' => Inventaris::get()
        ]);
    }
}
