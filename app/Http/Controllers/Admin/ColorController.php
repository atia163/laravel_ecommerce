<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $colors = Color::all();
        return view('admin.color.viewColor',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        return view('admin.color.addColor',compact('colors'));
    
    
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
          
            'color_name'=> 'required| unique:colors,color_name',
            'status' => 'required',
           
            ]);
   
    $colors = new Color;
   $colors->color_name = $request->color_name;
   $colors->status = $request->status;
   if($colors->save()) {

    return redirect()->back()->with('success','Color successfully saved.');


   } else {

    return redirect()->back-> with('error','Something Error Found !, Please try again.');
    }

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd($id);
       $colors = Color::findOrFail($id);
      // dd($colors);
      return view('admin.color.editColor',compact('colors'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);

        $this->validate($request,[
          
            'color_name'=> 'required',
            'status' => 'required',
           
            ]);
   
   $colors = Color::findOrFail($id);
   $colors->color_name = $request->color_name;
   $colors->status = $request->status;
   if($colors->save()) {

    return redirect()->back()->with('success','Color successfully Updated.');


   } else {

    return redirect()->back-> with('error','Something Error Found !, Please try again.');
    }

 }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $colors = Color::findOrFail($id);
        if($colors->delete()){

            return redirect()->back()->with('success','Color successfully Deleted.');


        } 
        
    else {
     
         return redirect()->back-> with('error','Something Error Found !, Please try again.');
    }


    }
}
