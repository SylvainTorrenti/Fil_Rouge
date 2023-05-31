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
        return DB::select("select t.*, u.name as name_autor, s.Label as label_status from Ticket as t
        Inner Join Status as s on t.Status_id = s.Id
        Inner Join users as u on t.User_id = u.id");
    }
    public function get($n)
    {
        return DB::selectOne('select * from Ticket where Id = ?;', [$n]);
    }
    public function insert($data)
    {

        return DB::table('Ticket')->insertGetId(['Sujet' => $data['Sujet'], 'Status_id' => 1, 'CreatedAt' => Carbon::now(), 'User_id' => auth()->user()->id]);

    }
}
