<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function index()
    {     
        $penerbit = Penerbit::all();
        return response()->json($penerbit, 200);
    }

}