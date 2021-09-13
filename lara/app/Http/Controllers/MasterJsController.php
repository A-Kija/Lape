<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use View;

class MasterJsController extends Controller
{
    const RESULTS_IN_PAGE = 5;
    
    public function index()
    {
        return view('master_js.index');
    }

    public function list()
    {
        $masters = Master::orderBy('surname')->paginate(self::RESULTS_IN_PAGE);

        $html = View::make('master_js.list')->with(['masters' => $masters])->render();

        return response()->json([
            'html' => $html
        ]);


    }

    public function create()
    {
        $html = View::make('master_js.create')->render();
        return response()->json([
            'html' => $html
        ]);
       
        // return view('master.create');
    }



}
