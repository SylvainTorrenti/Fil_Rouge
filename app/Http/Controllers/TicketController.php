<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use App\Models\StatutModel;
use App\Models\TicketModel;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
{
    public function displayTickets()
    {
        $ticketModel = new TicketModel();
        $tickets = $ticketModel->getAll();
        // dd($tickets);
        return view('fil_rouge/logUser', ['tickets' => $tickets]);
    }
    public function displayOneTicket($n)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->get($n);
        // récuration de tous les messages du tickets
        $messagesModel = new MessageModel();
        $messages = $messagesModel->getMessageTicket($n);
        // récuperation status
        $statutModel = new StatutModel();
        $statut = $statutModel->getStatutTicket($n);
        if ($ticket != null) {
            return view('statutTicket', ['ticket' => $ticket, 'messages' => $messages, 'statut' => $statut]);
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
            'Sujet' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                ->withInput($request->all())
                ->withErrors($validator);
        } else {
            $data = $request->all();

            $ticketModel = new TicketModel();
            $ticketId = $ticketModel->insert($data);
            return redirect()->route('statutTicket', ['n' => $ticketId]);

        }

    }
    public function createMessage()
    {
        return view('creationMessage');
    }
    public function storeMessage(Request $request)
    {
        $rules = [
            'Content' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                ->withInput($request->all())
                ->withErrors($validator);
        } else {
            $data = $request->all();
            dd($data);
            $messageModel = new MessageModel();
            $ticketId = $messageModel->insert($data);
            return redirect()->route('statutTicket', ['n' => $ticketId]);
        }

    }
}
