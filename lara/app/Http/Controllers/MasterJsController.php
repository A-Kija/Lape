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
        $masters = Master::orderBy('created_at', 'DESC')->paginate(self::RESULTS_IN_PAGE);

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
    }

    public function store(Request $request)
    {
        $master = new Master;
        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        $html = View::make('master_js.msg')
        ->with(['success_message' => 'Hurah, new master has arrived'])
        ->render();
        return response()->json([
            'hash' => 'list',
            'msg' => $html
        ]);
    }

    public function edit(Master $master)
    {
        $html = View::make('master_js.edit')
        ->with(['master' => $master])
        ->render();
        return response()->json([
            'html' => $html
        ]);
    }

    public function destroy(Master $master)
    {
        if ($master->getOutfits->count()) {
            $html = View::make('master_js.msg')
            ->with(['info_message' => 'No, no, you cant do it'])
            ->render();
            return response()->json([
                'msg' => $html
            ]);
        }
       
        $master->delete();
        $html = View::make('master_js.msg')
        ->with(['success_message' => 'Master gone'])
        ->render();
        return response()->json([
            'hash' => 'list',
            'msg' => $html
        ]);

    }

    public function update(Request $request, Master $master)
    {
        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return response()->json([
            'hash' => 'list'
        ]);
    }



}
