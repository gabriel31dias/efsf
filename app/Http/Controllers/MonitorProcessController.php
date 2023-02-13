<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class MonitorProcessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id){
        $process =  Process::find($id);
        return view('process.edit', compact('process'));
    }

}
