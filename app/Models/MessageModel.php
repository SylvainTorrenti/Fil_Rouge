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
    public function insert($data)
    {
        return DB::table('Message')->insertGetId([
            'Content' => $data['Content'],
            'CreatedAt' => Carbon::now(),
            'User_id' => auth()->user()->id
        ]);
    }
    public function getAll()
    {
        return DB::select("select * from Message");
    }

    public function getMessageTicket($n)
    {
        $results = DB::select('SELECT m.Content , m.CreatedAt ,u.name
        from Message m
        INNER join TicketMessage tm on tm.IdMessage = m.Id
        inner join Ticket t  on t.Id = tm.IdTicket
        inner join users u on m.User_id = u.id
        where tm.IdTicket  = ? ', [$n]);
        return $results;
    }
}
