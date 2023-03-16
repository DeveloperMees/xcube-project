<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('status', false)->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function handled() {
        $tickets = Ticket::where('status', true)->get();
        return view('admin.tickets.handled', compact('tickets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $issues = Issue::all();
        return view('support', compact('issues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->description = $request->description;
        $ticket->issue_id = $request->issue_id;
        if ($request->hasFile('file')) {
            $ticket->file_path = $request->file->store('ticket', 'public');
        }
        $ticket->save();
        return redirect()->route('support')->with('message', 'Your ticket has been sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        if (isset($request->update_status)) {
            $ticket->status = true;
        }
        if (!isset($request->update_status)) {
            $ticket->status = false;
        }
        $ticket->updated_by = Auth::user()->id;
        $ticket->save();
        return redirect()->route('admin.tickets.index')->with('message', 'Status has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
