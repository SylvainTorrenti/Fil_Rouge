<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * Permet de modifier le statut d'un ticket
     * @param (int) $ticket_id Identifiant du ticket
     * @param (int) $statut_id Identifiant du statut
     */
    public function changeStatut($ticket_id, $statut_id)
    {
        DB::transaction(function () use ($ticket_id, $statut_id) {
            DB::table('Ticket')
                ->where('Id', $ticket_id)
                ->update(['Status_id' => $statut_id]);
            $results = DB::table('Ticket')
                ->where('Id', $ticket_id)
                ->update(['UpdatedAt' => Carbon::now()]);
            return $results;
        });
    }
}
