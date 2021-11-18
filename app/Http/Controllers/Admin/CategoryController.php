<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
class CategoryController extends Controller
{
   public function index() {
    return view('admin.category.addCategory');

      }
     public function store(Request $request) {

      $this->validate($request,[
      'category_name' =>'required | unique:categories,name',
      'status'       => 'required',
      'image'        => 'required',
      'description'  => 'required',
      ]);

        $category = new Category;

        $category->name = $request->category_name;
        $category->description = $request->description;
        $random = Carbon::now()->format('his')+rand(1000,9999);
        if($image = $request->file('image')){
          $extention = $request->file('image')->getClientOriginalExtension();
          $imageName = $random.'.'.$extention;
          $path = public_path('uploads/category');
          $image->move($path,$imageName);
          $category->image = $imageName;
      }  
      else{
          $category->image = "null";
      }


        $category->status= $request->status;
        
     if ($category->save()) {
      return redirect('admin/category/add-category')->with('success','Category information successfully saved.');


                 }
        }
   function view(){

     $categories = Category::all();
    
     return view('admin.category.viewCategory',compact('categories'));
  }
  function edit($id){
    $category = Category::findOrFail($id);

    return view('admin.category.editCategory',compact('category'));

  }
  function update (Request $request,$id){
   
    $this->validate($request,[
      'category_name' =>'required| unique:categories,name',
      'status'       => 'required',
      'image'        => 'required',
      'description'  => 'required',
      ]);
   
   $category = Category::findOrFail($id);
$category->name = $request->category_name;
$category->description = $request->description;
$random = carbon:: now()->format('his')+rand(1000,9999);
if ($image = $request->file('image')){
  $extension = $request->file('image')->getClientOriginalExtension();
  $imageName = $random.'.'.$extension;
  $path = public_path('uploads/category');
  $image->move($path, $imageName);
  
  if(file_exists('uploads/category/'.$category->image) AND !empty($category->image)){
    unlink('uploads/category/'.$category->image);
  }
  $category->image = $imageName;
}
else{
$category->image = $category->image;
}

$category-> status = $request->status;
if($category->save()){
  return redirect('admin/category/add-category')->with('success','Category information successfully updated.');
}
else{
  return redirect()->back()->with('error','Something Error Found !, Please try again.');
      }
    }

function delete($id) {
  $category = Category::findOrFail($id);
        
  if($category){
      if(file_exists('uploads/category/'.$category->image) AND !empty($category->image)){
          unlink('uploads/category/'.$category->image);
      }
      $category->delete();
      return redirect()->back()->with('success','Category information successfully deleted.');
  }else{
      return redirect()->back()->with('error','Something Error Found !, Please try again.');
  }


      }
    
    
  }
