<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->dt = Carbon::now();
        $this->yesterday = Carbon::yesterday();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*  $query = Model::where('field1', 1)
        ->whereNull('field2')
        ->where(function ($query) {
            $query->where('datefield', '<', $date)
                ->orWhereNull('datefield');
        }
    ); */

        /* $activities = Activity::where('user_id', Auth::user()->user_id)
            ->whereNull('status')
            ->where(
                function ($activities) {
                    $activities->where('status', '=', 'Open');
                }
            ); */
        #->get();
        $activities = Activity::where('user_id', Auth::user()->user_id)
            ->whereNull('status')
            ->orWhere('status', '=', 'Open')
            ->where('user_id', Auth::user()->user_id)
            #->orWhere('status', '=', 'Open')
            ->get();
        #dd(Auth::user()->user_id);
        #->whereDate('created_at', '>=', $this->yesterday->format('Y-m-d'))
        #->whereDate('created_at', '<=', $this->dt->format('Y-m-d'))
        #->orWhereDate('created_at', '>=', $this->yesterday->format('Y-m-d'))
        #->orWhereDate('created_at', '<=', $this->dt->format('Y-m-d'))
        $count_status_open = Activity::where('user_id', Auth::user()->user_id)
            ->where('status', 'Open')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();
        $count_status_close = Activity::where('user_id', Auth::user()->user_id)
            ->where('status', 'Close')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();
        $count_status_progress = Activity::where('user_id', Auth::user()->user_id)
            ->whereNull('status')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();

        return view('user.activity.index', [
            'activities'            => $activities,
            'count_status_open'     => $count_status_open,
            'count_status_close'    => $count_status_close,
            'count_status_progress' => $count_status_progress,
        ]);
    }

    public function handleAdmin()
    {
        $activities = Activity::where('status', '=', 'Open')
            ->orwhereNull('status')
            /* ->whereDate('created_at', '>=', $this->yesterday->format('Y-m-d'))
            ->whereDate('created_at', '<=', $this->dt->format('Y-m-d'))
            ->orWhereDate('created_at', '>=', $this->yesterday->format('Y-m-d'))
            ->orWhereDate('created_at', '<=', $this->dt->format('Y-m-d')) */
            ->get();
        $count_status_open = Activity::where('status', 'Open')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();
        $count_status_close = Activity::where('status', 'Close')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();
        $count_status_progress = Activity::whereNull('status')
            ->whereMonth('created_at', '=', $this->dt->format('m'))
            ->count();

        return view('sysadmin.activity.index', [
            'activities'            => $activities,
            'count_status_open'     => $count_status_open,
            'count_status_close'    => $count_status_close,
            'count_status_progress' => $count_status_progress,
        ]);
    }
}
