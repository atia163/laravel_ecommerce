<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $sizes = Size::all();
        return view('admin.size.viewSize',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.addSize');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
   // dd($request->all());

   $this->validate($request,[
          
    'size_name'=> 'required ',
    'status' => 'required',
   
    ]);

   $sizes= new Size;
   $sizes->size_name = $request->size_name;
   $sizes->status = $request->status;
   if($sizes->save()) {

    return redirect()->back()->with('success','Size successfully saved.');


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
       $sizes = Size::findOrFail($id);
       // dd($sizes);
       return view('admin.size.editSize',compact('sizes'));



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
          
            'size_name'=> 'required',
            'status' => 'required',
           
            ]);
   
    $sizes = Size::findOrFail($id);
   $sizes->size_name = $request->size_name;
   $sizes->status = $request->status;
   if($sizes->save()) {

    return redirect()->back()->with('success','Size successfully Updated.');


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
        //dd($id);

        $sizes = Size::findOrFail($id);
        if($sizes->delete()){

            return redirect()->back()->with('success','Size successfully Deleted.');

    }

     
    else {
     
        return redirect()->back-> with('error','Something Error Found !, Please try again.');
   }


   }

}
