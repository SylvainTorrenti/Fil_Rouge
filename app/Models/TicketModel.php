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

        return DB::table('Ticket')->insertGetId(['Sujet' => $data['Sujet']]);

    }
}
