<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use App\Models\TicketModel;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
{
    public function displayTickets()
    {
        $ticketModel = new TicketModel();
        $tickets = $ticketModel->getAll();
        return view('logUser', ['tickets' => $tickets]);
    }
    public function displayOneTicket($n)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->get($n);
        if ($ticket != null) {
            return view('statutTicket', ['ticket' => $ticket]);
        } else {
            return view('erreur');
        }
    }
    public function createTicket()
    {
        return view('creationTicket');
    }
    public function createTicketPost(Request $request)
    {

        $rules = [
            'materiel' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                ->withInput($request->all())
                ->withErrors($validator);
        } else {
            $data = $request->all();

            $ticketModel = new TicketModel;
            $ticketId = $ticketModel->insert($data);
            return redirect()->route('statutTicket', ['n' => $ticketId]);

        }

    }
    public function createMessage()
    {
        return view('creationMessage');
    }
    //!!!!!!!!!!!!!!!!!!!A revoir!!!!!!!!!!!!!!!!!!!!



    // public function storeTicket(Request $request)
    // {
    //     $this->validate($request, [
    //         'materiel' => 'required',
    //         'description' => 'required'
    //     ]);
    //     $ticket = new TicketModel();
    //     $ticket = $ticket->insert();
    //     return view('logUser');
    // }
    // public function displayMessage()
    // {
    //     $messageModel = new MessageModel();
    //     $message = $messageModel->getAll();
    //     return view('statutTicket', ['statutTickets' => $message]);
    // }
    // public function storeMessage(Request $request)
    // {
    //     $this->validate($request, [
    //         'message' => 'required'
    //     ]);

    //     $message = new MessageModel();
    //     $message = $message->insert();
    //     return view('statutTicket');
    // }

}
