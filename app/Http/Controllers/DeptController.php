<?php

namespace App\Http\Controllers;

use App\Models\DeptModel;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function AfficherDepartements()
    {
        $deptModel = new DeptModel();
        dd($deptModel->getAll());
    }
}
