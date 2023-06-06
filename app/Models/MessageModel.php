<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MessageModel extends Model
{
    use HasFactory;
    public function insert($data, $ticketId)
    {
        DB::transaction(function () use ($data, $ticketId) {

            $IdMessage = DB::table('Message')->insertGetId([
                'Content' => $data['Content'],
                'CreatedAt' => Carbon::now(),
                'User_id' => auth()->user()->id
            ]);
            DB::table('TicketMessage')->insert([
                'IdMessage' => $IdMessage,
                'IdTicket' => $ticketId
            ]);
            $results = DB::table('Ticket')
                ->where('Id', $ticketId)
                ->update(['UpdatedAt' => Carbon::now()]);
            return $results;
        });
    }
    public function getMessageTicket($ticketId)
    {
        $results = DB::select('SELECT m.Content , m.CreatedAt ,u.name, u.Prenom, u.Id as user_id
        from Message m
        INNER join TicketMessage tm on tm.IdMessage = m.Id
        inner join Ticket t  on t.Id = tm.IdTicket
        inner join users u on m.User_id = u.id
        where tm.IdTicket  = ? ', [$ticketId]);
        return $results;
    }
}
