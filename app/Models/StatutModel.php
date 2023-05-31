<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatutModel extends Model
{
    use HasFactory;
    public function getStatutTicket($n)
    {
        $results = DB::selectOne('SELECT Label
        from Status s
        join Ticket t on s.Id = t.Status_id
        where t.Id = ?', [$n]);
        return $results;
    }
    public function changeStatut($n)
    {
        $results = DB::table('Ticket')
            ->where('Id', $n)
            ->update(['Status_id' => 2]);
        return $results;
    }
}
