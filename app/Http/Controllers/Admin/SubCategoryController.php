<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\SubCategory;
use Carbon\Carbon;
use DB;
class SubCategoryController extends Controller
{
    function create() {
    $category = Category::all();
    return view('admin.subcategory.addSubCategory',compact('category'));
}
function store(Request $request) {

$this->validate($request,[
    'category_name' =>'required',
    'subcategory_name' =>'required | unique:subcategories,sub_name',
    'status'       => 'required',
    'image'        => 'required',
    'description'  => 'required',
    ]);

$subcat = new SubCategory;

$subcat->category_id = $request->category_name;
$subcat->sub_name= $request->subcategory_name;
$subcat->status = $request->status;
$subcat->description = $request->description;

$random = Carbon::now()->format('his')+rand(1000,9999);

if($image = $request->file('image')){
    $extention = $request->file('image')->getClientOriginalExtension();
    $imageName = $random.'.'.$extention;
    $path = public_path('uploads/subcategory');
    $image->move($path,$imageName);
    $subcat->image = $imageName;
}  
else{
    $subcat->image = "null";

    }
if($subcat->save()){
    return redirect()->back()->with('success','SubCategory information successfully saved.');
}
else {
    return redirect()->back-> with('error','Something Error Found !, Please try again.');
   }


       }

public function view() {
    $subcat = 'DB'::table('subcategories')
    -> join('categories','subcategories.category_id','categories.id')
    ->select('subcategories.*','categories.name')->get();

    return view('admin.subcategory.viewSubCategory',compact('subcat'));

}
public function delete($id) {
   // dd($id);
    $subcat = SubCategory::findOrFail($id);

    if($subcat){
        if(file_exists('uploads/subcategory/'.$subcat->image) AND !empty($subcat->image)){
            unlink('uploads/subcategory/'.$subcat->image);
        }
        $subcat->delete();
        return redirect()->back()->with('success','SubCategory information successfully deleted.');
    }else{
        return redirect()->back()->with('error','Something Error Found !, Please try again.');
    }

}

public function edit($id) {
   // dd($id);
   $subcat = 'DB'::table('subcategories')->join('categories','subcategories.category_id','categories.id')
   ->select('subcategories.*','categories.name')->where('subcategories.id',$id)->first();
   $category = Category::all();
   return view('admin.subcategory.editSubCategory',compact('subcat','category'));

  }
 
public function update(Request $request, $id) {
    //dd($id);


    $this->validate($request,[
        'category_name' =>'required | unique:subcategories,sub_name',
        'subcategory_name'=> 'required',
        'status' => 'required',
        'description'  => 'required',
        ]);
     
     $subcat=SubCategory::findOrFail($id);
     $subcat->category_id = $request->category_name;
  $subcat->sub_name = $request->subcategory_name;
  $subcat->status = $request->status;
  $subcat->description = $request->description;

  $random = Carbon:: now()->format('his')+rand(1000,9999);
  if ($image = $request->file('image')){
    $extension = $request->file('image')->getClientOriginalExtension();
    $imageName = $random.'.'.$extension;
    $path = public_path('uploads/subcategory');
    $image->move($path, $imageName);
    
    if(file_exists('uploads/subcategory/'.$subcat->image) AND !empty($subcat->image)){
      unlink('uploads/subcategory/'.$subcat->image);
    }
    $subcat->image = $imageName;
  }
  else{
  $subcat->image = $subcat->image;
  }
  
  if($subcat->save()){
    return redirect()->back()->with('success','SubCategory information successfully updated.');
  }
  else{
    return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }
      }
    }
      









 











