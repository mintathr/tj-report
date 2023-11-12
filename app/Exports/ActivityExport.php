<?php

namespace App\Exports;

use App\Models\Activity;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActivityExport implements FromView
{
    use Exportable;

    public function __construct(string $range)
    {
        $this->range = $range;
        $range_exp = explode(' ', $range);
        $this->tgl_awal = $range_exp[0];
        $this->tgl_akhir = $range_exp[1];
    }

    public function view(): View
    {
        return view('sysadmin.activity.excelActivity', [
            'activities' => Activity::whereBetween('created_at', [
                $this->tgl_awal . " 00:00:00",
                $this->tgl_akhir . " 23:59:59"
            ])
                ->get()
        ]);
    }
}
