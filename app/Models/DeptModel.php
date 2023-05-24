<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeptModel extends Model
{
    use HasFactory;

    public function getAll()
    {
        return DB::select("select * from DEPT");
    }
    public function get($n)
    {
        return DB::selectOne('select * from DEPT where DEPTNO = ?;', [$n]);
    }
}
