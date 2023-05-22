<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function displayAll()
    {
        return view('logUser');
    }
    public function displayTicket()
    {
        return view('statutTicket');
    }
    public function createMessage()
    {
        return view('creationMessage');
    }
    public function storeMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        return view('statutTicket');
    }
    public function createTicket()
    {
        return view('creationTicket');
    }
    public function storeTicket(Request $request)
    {
        $this->validate($request, [
            'materiel' => 'required',
            'description' => 'required'
        ]);
        return view('logUser');
    }
}
