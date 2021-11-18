<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
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
        $category = Category:: all();
        $subcat = SubCategory:: all();
        return view('admin.brand.addBrand',compact('category','subcat'));
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
            'category_id' =>'required',
            'subcat_id'=> 'required',
            'brand_name'=> 'required | unique:brands,brand_name',
            'status' => 'required',
            'description'  => 'required',
            'image'  => 'required',
            ]);
   

        $brands = new Brand;

        $brands->cat_id = $request->category_id;
        $brands->sub_id = $request->subcat_id;
        $brands->brand_name = $request->brand_name;
        $brands->description = $request->description;
        $brands->status = $request->status;

        $random = Carbon:: now()->format('his')+rand(1000,9999);
        if($image = $request->file('image')){
          $extension = $request->file('image')->getClientOriginalExtension();
          $imageName = $random.'.'.$extension;
          $path = public_path('uploads/brands');
          $image->move($path, $imageName);
          $brands->image= $imageName;
          
          
          }
         
        
        else{
        $brands->image = null;
        }
        
        if($brands->save()){
          return redirect()->back()->with('success','Brand information successfully saved.');
        }
        else{
          return redirect()->back()->with('error','Something Error Found !, Please try again.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
 
  }
public function showSubCat($id){
     dd($id);
    $subcat = 'DB'::table('subcategories')->where('category_id',$id)->get();
    dd($subcat);
    return response()->json($subcat);

}

     }  