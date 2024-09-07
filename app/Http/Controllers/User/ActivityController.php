<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\BusStop;
use App\Models\Activity;
use App\Models\HelpTopic;
use App\Models\UploadPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dt = Carbon::now();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cek_img = UploadPhoto::whereDATE('created_at', '=', $this->dt->format('Y-m-d'))
            ->where('user_id', Auth::user()->user_id)
            ->where('status_poto', '=', 'Problem')
            ->whereNull('activity_id')
            ->first();

        $busstops   =  BusStop::all();
        $busKoridor =  $busstops->groupBy('koridor');
        $helptopics   =  HelpTopic::all();

        if ($cek_img === NULL) {
            return view('user.activity.create', [
                'busstops' => $busstops,
                'busKoridor' => $busKoridor,
                'helptopics' => $helptopics,
            ]);
        } else {
            $file_path = storage_path() . "/app/upload_problem/" . $cek_img->filename;
            File::delete($file_path);

            DB::table('upload_photos')->where('user_id', Auth::user()->user_id)
                ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                ->whereNull('activity_id')
                ->delete();

            return redirect()->route('activity.user.create', [
                'busstops'      => $busstops,
                'busKoridor'    => $busKoridor,
                'helptopics'    => $helptopics,
            ]);
        }
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
            'fileImage.required'        => 'Photo Harus Diupload',
            'nomor_tiket.required'      => 'Nomor Tiket Harus Diisi',
            'nomor_tiket.required'      => 'Nomor Tiket Harus 7 Digit',
            #'halte_awal_id.required'    => 'Halte Awal Harus Diisi',
            'halte_akhir_id.required'   => 'Halte Akhir Harus Diisi',
            'problem.required'          => 'Problem Harus Diisi',
            'helptopic_id.required'     => 'Help Topic Harus Diisi',
        ];

        $request->validate([
            'fileImage'         => 'required',
            'nomor_tiket'       => 'required|numeric|digits:7',
            #'halte_awal_id'     => 'required',
            'halte_akhir_id'    => 'required',
            'problem'           => 'required',
            'helptopic_id'     => 'required',
        ], $messages);

        $s = $request->fileImage;
        $x = explode("<", $s);

        $imgFile = UploadPhoto::where('folder', '=', $x[0])->first();
        if ($imgFile) {
            try {
                $activity = Activity::create([
                    'nomor_tiket'       => $request->nomor_tiket,
                    #'halte_awal_id'     => $request->halte_awal_id,
                    'halte_akhir_id'    => $request->halte_akhir_id,
                    'problem'           => $request->problem,
                    'helptopic_id'      => $request->helptopic_id,
                    'user_id'           => Auth::user()->user_id,
                ]);

                UploadPhoto::where('user_id', Auth::user()->user_id)
                    ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                    ->where('status_poto', '=', 'Problem')
                    ->whereNull('activity_id')
                    ->update([
                        'activity_id' => $activity->id,
                    ]);

                Alert::toast('Daily Activity Berhasil Disubmit', 'success')->width('25rem')->padding('5px');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $activity = Activity::where('nomor_tiket', $activity->nomor_tiket)
            ->first();

        $cek_img = UploadPhoto::whereDATE('created_at', '=', $this->dt->format('Y-m-d'))
            ->where('user_id', Auth::user()->user_id)
            ->where('status_poto', '=', 'Perbaikan')
            ->whereNull('activity_id')
            ->first();

        $busstops   =  BusStop::all();
        $busKoridor =  $busstops->groupBy('koridor');
        $helptopics   =  HelpTopic::all();

        if ($cek_img === NULL) {
            return view('user.activity.edit', [
                'activity'  => $activity,
            ]);
        } else {
            $file_path = storage_path() . "/app/upload_problem/" . $cek_img->filename;
            File::delete($file_path);

            DB::table('upload_photos')->where('user_id', Auth::user()->user_id)
                ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                ->whereNull('activity_id')
                ->delete();

            return redirect()->route('activity.user.edit', [
                'activity'  => $activity,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $messages = [
            'action.required'        => 'Action Harus Diisi',
            'root_cause.required'      => 'Root Cause Harus Diisi',
        ];

        $request->validate([
            'action'         => 'required',
            'root_cause'       => 'required',
        ], $messages);

        $activity = Activity::findOrFail($activity->id);

        try {
            $activity->update([
                'action'    => $request->action,
                'status'    => $request->status,
                'assign_to' => $request->assign_to,
                'root_cause' => $request->root_cause,
            ]);


            UploadPhoto::where('user_id', Auth::user()->user_id)
                ->whereDate('created_at', '=', $this->dt->format('Y-m-d'))
                ->where('status_poto', '=', 'Perbaikan')
                ->whereNull('activity_id')
                ->update([
                    'activity_id' => $activity->id,
                ]);

            Alert::toast('Daily Activity Berhasil Di Update.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function assignUser(Activity $activity)
    {
        $activity = Activity::where('nomor_tiket', $activity->nomor_tiket)
            ->first();

        $users = User::where('user_id', '!=', Auth::user()->user_id)
            ->where('role', '!=', 'saradm')
            ->get();

        return view('user.activity.assign', [
            'activity'  => $activity,
            'users'  => $users,
        ]);
    }

    public function updateAssign(Request $request, Activity $activity)
    {
        $activity = Activity::findOrFail($activity->id);

        try {
            $activity->update([
                'user_id'    => $request->user_id,
            ]);

            Alert::toast('Tiket Berhasil Dipindahkan.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }
    }
}
