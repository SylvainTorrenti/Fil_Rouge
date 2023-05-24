<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TicketModel extends Model
{
    use HasFactory;
    public function getAll()
    {
        return DB::select("select * from Ticket");
    }
    public function get($n)
    {
        return DB::selectOne('select * from Ticket where Id = ?;', [$n]);
    }
    public function insert($data)
    {

        return DB::table('Ticket')->insertGetId(['Sujet' => $data['description']]);

    }
    // public function displayMessageTicket()
    // {
    //     $results = DB::select('SELECT Content
    //     from Message m
    //     INNER join TicketMessage tm on tm.IdMessage = m.Id
    //     inner join Ticket t  on t.Id = tm.IdTicket
    //     where tm.IdTicket  = :t.Id ', ['t.id' => 't.id']);
    //     return $results;
    // }
}
