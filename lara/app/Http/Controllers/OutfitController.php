<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use App\Models\Master;
use Illuminate\Http\Request;
use Validator;
use PDF;

class OutfitController extends Controller
{
    const RESULTS_IN_PAGE = 9;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $masters = Master::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        if ($request->sort) {
            if ('type' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('type')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('type' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('type', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('color' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('color')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('color' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('color', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('size' == $request->sort && 'asc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('size')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('size' == $request->sort && 'desc' == $request->sort_dir) {
                $outfits = Outfit::orderBy('size', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else {
                $outfits = Outfit::paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
        }
        else if ($request->filter && 'master' == $request->filter) {
            $outfits = Outfit::where('master_id', $request->master_id)->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        else if ($request->search && 'all' == $request->search) {

            $words = explode(' ', $request->s);

            // dd($words);

            if (count($words) == 1) {
                $outfits = Outfit::where('color', 'like', '%'.$request->s.'%')
                ->orWhere('type', 'like', '%'.$request->s.'%')
                ->orWhere('size', 'like', '%'.$request->s.'%')
                ->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else {
                $outfits = Outfit::where(function($query) use ($words) {
                    $query->orWhere('color', 'like', '%'.$words[0].'%')
                    ->orWhere('type', 'like', '%'.$words[0].'%')
                    ->orWhere('size', 'like', '%'.$words[0].'%');
                })
                ->where(function($query) use ($words) {
                    $query->orWhere('color', 'like', '%'.$words[1].'%')
                    ->orWhere('type', 'like', '%'.$words[1].'%')
                    ->orWhere('size', 'like', '%'.$words[1].'%');
                })->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }



        }
        else {
            // nieko nesortinam
            $outfits = Outfit::paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }

       
        

        return view('outfit.index', [
            'outfits' => $outfits,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'masters' => $masters,
            'master_id' => $request->master_id ?? '0',
            's' => $request->s ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = Master::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        return view('outfit.create', ['masters' => $masters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
                'outfit_type' => ['required', 'min:3', 'max:50'],
                'outfit_color' => ['required', 'min:3', 'max:20'],
                'outfit_size' => ['required', 'integer', 'min:5', 'max:22'],
                'outfit_about' => ['required'],
                'master_id' => ['required', 'integer', 'min:1']
            ]
        );

       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        
        
        $outfit = new Outfit;
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()
        ->route('outfit.index')
        ->with('success_message', 'New outfit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function show(Outfit $outfit)
    {
        return view('outfit.show', ['outfit' => $outfit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function edit(Outfit $outfit)
    {
        $masters = Master::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        return view('outfit.edit', ['outfit' => $outfit, 'masters' => $masters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outfit $outfit)
    {
        
        
        $validator = Validator::make(
            $request->all(),
            [
                'outfit_type' => ['required', 'min:3', 'max:50'],
                'outfit_color' => ['required', 'min:3', 'max:20'],
                'outfit_size' => ['required', 'integer', 'min:5', 'max:22'],
                'outfit_about' => ['required'],
                'master_id' => ['required', 'integer', 'min:1']
            ]
        );

       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        
        
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()
        ->route('outfit.index')
        ->with('success_message', 'The outfit updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()
        ->route('outfit.index')
        ->with('success_message', 'The outfit was deleted.');
    }

    public function pdf(Outfit $outfit)
    {
        $pdf = PDF::loadView('outfit.pdf', ['outfit' => $outfit]);
        return $pdf->download(ucfirst($outfit->color).'-'.$outfit->type.'.pdf');
    }
}
