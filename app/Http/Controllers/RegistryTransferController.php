<?php

namespace App\Http\Controllers;

use App\Models\RegistryTransfer;
use Illuminate\Http\Request;

class RegistryTransferController extends Controller
{
    public function index()
    {
        return view('registry.indexTransfer');
    }

    public function create()
    {
        return view('registry.createTransfer');
    }
}
