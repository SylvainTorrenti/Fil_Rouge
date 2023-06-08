<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use App\Models\StatutModel;
use App\Models\TicketModel;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
{
    public function displayTickets()
    {
        $ticketModel = new TicketModel();
        $tickets = $ticketModel->getAll();
        return view('fil_rouge/logUser', ['tickets' => $tickets]);
    }
    public function displayOneTicket($ticket_id)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->get($ticket_id);
        // récuration de tous les messages du tickets
        $messagesModel = new MessageModel();
        $messages = $messagesModel->getMessageTicket($ticket_id);
        // récuperation status
        $statutModel = new StatutModel();
        $statut = $statutModel->getStatutTicket($ticket_id);
        // récuperation nom de l'auteur
        $user = new User();
        $user = $user->getName($ticket->User_id);
        if ($ticket != null) {
            return view('fil_rouge/statutTicket', ['ticket' => $ticket, 'messages' => $messages, 'statut' => $statut, 'user' => $user]);
        } else {
            return view('erreur');
        }
    }
    public function ChangeStatut(Request $request)
    {

        $ticket_id = $request->route("ticketId");
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->get($ticket_id);

        $newStatutId = ($ticket->Status_id == 1) ? 2 : 1;
        // récuration de tous les messages du tickets
        $messagesModel = new MessageModel();
        $messages = $messagesModel->getMessageTicket($ticket_id);
        // récuperation status
        $statutModel = new StatutModel();

        $statut = $statutModel->changeStatut($ticket_id, $newStatutId);
        $statut = $statutModel->getStatutTicket($ticket_id);
        // récuperation nom de l'auteur
        $user = new User();
        $user = $user->getName($ticket->User_id);
        if ($ticket != null) {
            return $statut;
        } else {
            return view('erreur');
        }
    }
    public function createTicket()
    {
        return view('fil_rouge/creationTicket');
    }
    public function createTicketPost(Request $request)
    {

        $request->validate([
            'materiel' => 'required|string|min:3|max:255',
            'Sujet' => 'required|string|min:3|max:255',
        ]);
        $input = $request->all();
        $ticketModel = new TicketModel();
        $ticketId = $ticketModel->insert($input);
        return redirect()->route('statutTicket', ['ticketId' => $ticketId]);



    }
    public function createMessage(Request $request)
    {
        $ticketId = $request->route('ticketId');
        return view('fil_rouge/creationMessage', ['ticketId' => $ticketId]);
    }
    public function storeMessage(Request $request, $ticketId)
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
            $messageModel = new MessageModel();
            $messageModel->insert($data, $ticketId);
            $ticketId = $request->route('ticketId');
            return redirect()->route('statutTicket', ['ticketId' => $ticketId]);
        }

    }
}
