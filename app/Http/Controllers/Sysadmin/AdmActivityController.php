<?php

namespace App\Http\Controllers\Sysadmin;

use Carbon\Carbon;
use App\Models\BusStop;
use App\Models\Activity;
use App\Models\HelpTopic;
use App\Models\UploadPhoto;
use Illuminate\Http\Request;
use App\Exports\ActivityExport;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdmActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dt = Carbon::now();
        $this->yesterday = Carbon::yesterday();
    }

    public function index()
    {
        
        $activities = Activity::whereDate('created_at', '>=', $this->yesterday->format('Y-m-d'))
            ->WhereDate('created_at', '<=', $this->dt->format('Y-m-d'))
            ->get();
            
            return view('sysadmin.activity.list', [
            'activities' => $activities,
        ]);
    }

    public function show(Activity $activity)
    {
        $activity = Activity::where('nomor_tiket', $activity->nomor_tiket)
            ->first();

        $imgFiles = UploadPhoto::where('activity_id', $activity->id)->get();

        return view('sysadmin.activity.show', [
            'activity'  => $activity,
            'imgFiles'  => $imgFiles,
        ]);
    }

    public function getDownload($filename)
    {
        $filePhoto = storage_path() . "/app/upload_problem/" . $filename;

        $headers = [
            'Content-Type' => 'image/jpg',
            'Content-Type' => 'image/jpeg',
            'Content-Type' => 'image/png',
        ];

        return response()->download($filePhoto, $filename, $headers);
    }

    public function searchActivity(Request $request)
    {
        $date_range = $request->date_range;
        $exp_date = explode(' - ', $date_range);
        $tgl_awal = $exp_date[0];
        $tgl_akhir = $exp_date[1];

        $activities = Activity::whereBetween('created_at', [
            $tgl_awal . " 00:00:00",
            $tgl_akhir . " 23:59:59",
        ])->get();

        return view('sysadmin.activity.find', [
            'activities'    => $activities,
            'tgl_awal'      => $exp_date[0],
            'tgl_akhir'     => $exp_date[1],
            'range'         => $exp_date[0] . ' ' . $exp_date[1],
        ]);
        /* $orders = RenovasiOrder::whereBetween('created_at', [
            $tgl_awal . " 00:00:00",
            $tgl_akhir . " 23:59:59",
        ])
            ->get(); */
    }

    public function exportActivity($range)
    {
        return (new ActivityExport($range))->download('Data Activity by Date.xlsx');
    }

    public function edit(Activity $activity)
    {
        $activity = Activity::where('nomor_tiket', $activity->nomor_tiket)
            ->first();
        $busstops   =  BusStop::all();
        $busKoridor =  $busstops->groupBy('koridor');
        $helptopics   =  HelpTopic::all();

        return view('sysadmin.activity.edit', [
            'activity'  => $activity,
            'busstops'  => $busstops,
            'busKoridor'  => $busKoridor,
            'helptopics'  => $helptopics,
        ]);
    }

    public function update(Request $request, Activity $activity)
    {
        $activity = Activity::findOrFail($activity->id);

        try {
            $activity->update([
                'nomor_tiket'       => $request->nomor_tiket,
                'halte_awal_id'     => $request->halte_awal_id,
                'halte_akhir_id'    => $request->halte_akhir_id,
                'problem'           => $request->problem,
                'helptopic_id'      => $request->helptopic_id,
                'action'            => $request->action,
                'status'            => $request->status,
                'root_cause'        => $request->root_cause,
                'assign_to'         => $request->assign_to,
            ]);

            Alert::toast('Daily Activity Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->route('admin.listActivity');
    }
}
