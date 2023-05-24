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
    public function insert()
    {

        return DB::table('Message')->insert([
            'Content' => 'message',
            'CreatedAt' => Carbon::now()
        ]);
    }
    public function getAll()
    {
        return DB::select("select * from Message");
    }
}
