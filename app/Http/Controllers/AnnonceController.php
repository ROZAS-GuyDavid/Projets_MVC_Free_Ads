<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Validator;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('back.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price' => 'numeric',
            'status' => 'in:published,unpublished',
            'picture' => 'image|max:3000',
        ]);

        if($validator->fails()){
            return redirect(route('annonce.create'))->withErrors($validator->errors());
        }else {
            $annonce = Annonce::create($request->all());
        
            // image
            $im = $request->file('picture');

            if(!empty($im)){
                // ... faire quelque chose si il y a une image

                $link = $im->store('images');

                $annonce->picture()->create([
                    'title' => $request->title_image?? $request->title,
                    'link' => $link
                ]);
            }
            // flashy('Votre annonce à bien été créer!');
            // return redirect()->back()->with("success","created advertisment successfully !");
            Flashy::message('created advertisment successfully !');
            return redirect()->back();
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        //
    }
}
