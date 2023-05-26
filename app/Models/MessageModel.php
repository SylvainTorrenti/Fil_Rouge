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
            'CreatedAt' => Carbon::now()
        ]);
    }
    public function getAll()
    {
        return DB::select("select * from Message");
    }

    public function getMessageTicket($n)
    {
        $results = DB::select('SELECT Content, m.CreatedAt
        from Message m
        INNER join TicketMessage tm on tm.IdMessage = m.Id
        inner join Ticket t  on t.Id = tm.IdTicket
        where tm.IdTicket  = ? ', [$n]);
        return $results;
    }
}
