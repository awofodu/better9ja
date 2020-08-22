<?php

namespace App\Http\Controllers\API\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::with('reporter.bank', 'reporter.guider', 'reporter.referrer', 'reporter.referrals',
            'reportee.bank', 'reportee.guider', 'reportee.referrer', 'reportee.referrals')->paginate(10);
        return response()->json(['reports'=>$reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return response()->json('Deleted');
    }

    public function messages()
    {
        $messages = Contact::paginate(10);
        return response()->json(['messages'=>$messages]);
    }

    public function deleteMessage($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();
        return response()->json('Message Deleted');
    }
}
