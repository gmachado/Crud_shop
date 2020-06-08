<?php

namespace App\Http\Controllers;

use App\Daily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DailyRequest;
use Illuminate\Support\Facades\Storage;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      //
        $dailies = DB::table('dailies')->paginate(5); 
        if(!isset($dailies)){
            dd('sem registros');
        }
        return view('list_daily', ['dailies' =>$dailies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_daily');

    }




   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyRequest $request)
    {
            $user_id = Auth::user()->id;
        
            $daily = new Daily;
            $daily->valor = $request->primresp;
            $daily->quantidade_estoque = $request->segunresp;
            $daily->nome = $request->tercresp;
            $daily->status =$request->quartaresp;
            $daily->descricao = $request->quintaresp;
            $daily->image = $request->sextaresp;
            

            if ($request->hasFile('sextaresp')){
              $imagePath = $request->sextaresp->store('products');

              $daily['image'] = $imagePath;
            }

          
            $daily->user_id = $user_id;

            $daily->save();

            return redirect()->route('list');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function show(Daily $daily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $daily = Daily::find($id);
        //dd($daily);
        return view('edit_daily', compact('daily'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function update(DailyRequest $request, $id)
    {
        
        $daily = Daily::find($id);
        $daily->valor = $request->primresp;
        $daily->quantidade_estoque = $request->segunresp;
        $daily->nome = $request->tercresp;
        $daily->status = $request->quartaresp;
        if($daily->status == 1){
            $daily->status = 1;
        }
        else{
            $daily->status = 0;
        }
        $daily->descricao = $request->quintaresp;
        $daily->image = $request->sextaresp;
        
        

        if ($request->hasFile('sextaresp')){

            if ($daily->image && Storage::exists($daily->image)) {
                Storage::delete($daily->image);
                
            }

            


            $imagePath = $request->sextaresp->store('products');

            $daily['image'] = $imagePath;
          }


        $daily->save();

        return redirect()->route('list');

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daily  $daily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $res=Daily::where('id', $id)->delete();
        
        

        return redirect()->route('list');
        //
    }

    public function mylist(){

        $user_id = Auth::user()->id;


        $dailies = DB::table('dailies')->where('user_id', $user_id)->paginate(5); 
        if(!isset($dailies)){
            dd('sem registros');
        }
        return view('list_daily', ['dailies' =>$dailies]);
    }
}
