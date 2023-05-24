<?php

namespace App\Http\Controllers;

use App\Models\DeptModel;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function AfficherDepartements()
    {
        $deptModel = new DeptModel();
        $depts = $deptModel->getAll();
        return view('dept', ['depts' => $depts]);
    }
    public function AfficherDepartement($n)
    {
        $deptModel = new DeptModel();
        $dept = $deptModel->get($n);
        if ($dept != null) {
            return view('deptOne', ['dept' => $dept]);
        } else {
            return view('erreur');
        }
    }
}
