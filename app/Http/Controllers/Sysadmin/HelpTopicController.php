<?php

namespace App\Http\Controllers\Sysadmin;

use App\Models\HelpTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HelpTopicController extends Controller
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
        $helptopics = HelpTopic::get();
        return view('sysadmin.helptopic.index', [
            'helptopics' => $helptopics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sysadmin.helptopic.create');
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
            'topic_name.required'    => 'Nama Topic Harus Diisi!',
            'topic_name.unique'      => 'Nama Topic Sudah Ada!',
        ];

        $request->validate([
            'topic_name' => 'required|unique:help_topics',
        ], $messages);
    
        try {
            HelpTopic::create([
                'topic_name'        => $request->topic_name,
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
     * @param  \App\Models\HelpTopic  $helpTopic
     * @return \Illuminate\Http\Response
     */
    public function show(HelpTopic $helpTopic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpTopic  $helpTopic
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpTopic $helpTopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpTopic  $helpTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpTopic $helpTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpTopic  $helpTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpTopic $helpTopic)
    {
        //
    }
}
