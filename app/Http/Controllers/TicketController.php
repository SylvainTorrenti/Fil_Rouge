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

        // récuperation nom de l'auteur
        $user = new User();
        $user = $user->getName($ticket->User_id);
        if ($ticket != null) {
            return view('fil_rouge/statutTicket', ['ticket' => $ticket, 'messages' => $messages, 'statut' => $statut, 'user' => $user]);
        } else {
            return view('erreur');
        }
    }
    public function ChangeStatut($n)
    {
        $ticketModel = new TicketModel();
        $ticket = $ticketModel->get($n);
        // récuration de tous les messages du tickets
        $messagesModel = new MessageModel();
        $messages = $messagesModel->getMessageTicket($n);
        // récuperation status
        $statutModel = new StatutModel();

        $statut = $statutModel->changeStatut($n, $_POST["statut_id"]);
        $statut = $statutModel->getStatutTicket($n);
        // récuperation nom de l'auteur
        $user = new User();
        $user = $user->getName($ticket->User_id);
        if ($ticket != null) {
            return view('fil_rouge/statutTicket', ['ticket' => $ticket, 'messages' => $messages, 'statut' => $statut, 'user' => $user]);
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
        return view('fil_rouge/creationMessage');
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
            $messageModel = new MessageModel();
            $ticketId = $messageModel->insert($data);
            return redirect()->route('statutTicket', ['n' => $ticketId]);
        }

    }
}
