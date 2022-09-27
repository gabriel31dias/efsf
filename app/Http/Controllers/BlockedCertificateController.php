<?php

namespace App\Http\Controllers;

use App\Models\BlockedCertificate;
use Illuminate\Http\Request;

class BlockedCertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $blockedCertificates = BlockedCertificate::all();

        return view('blockedCertificate.index', compact('blockedCertificates'));
    }

    public function create(Request $request)
    {
        return view('blockedCertificate.create');
    }

    public function edit(Request $request, BlockedCertificate $blockedCertificate)
    {
        return view('blockedCertificate.edit', compact('blockedCertificate'));
    }

}
