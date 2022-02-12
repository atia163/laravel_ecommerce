<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Multipleimage;
use DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $products = 'DB'::table('products')
                    ->join('categories','products.cat_id','categories.id')
                    ->join('subcategories','products.sub_id','subcategories.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->join('sizes','products.size_id','sizes.id')
                    ->join('colors','products.color_id','colors.id')
                    ->select('products.*','categories.name','subcategories.sub_name','brands.brand_name','colors.color_name','sizes.size_name')->get();
        return view('admin.product.viewProduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcat = SubCategory::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.addProduct',compact('categories','subcat','brands','sizes','colors'));
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
            'cat_id' => 'required',
            'subcat_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required|unique:products,product_name',
            'product_stock' => 'required',
            'product_weight' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

         $products = new Product;

         $products->cat_id = $request->cat_id;
         $products->sub_id = $request->subcat_id;
         $products->brand_id = $request->brand_id;
         $products->product_name = $request->product_name;
         $products->product_weight = $request->product_weight;
         $products->stock = $request->product_stock;
         $products->size_id = $request->size_id;
         $products->color_id = $request->color_id;
         $products->price = $request->price;
         $products->discount = $request->discount;
         $products->status = $request->status;

          $random = Carbon::now()->format('his')+rand(1000,9999);

          if($image = $request->file('image')){
            $extention = $request->file('image')->getClientOriginalExtension();
            $imageName = $random.'.'.$extention;
            $path = public_path('uploads/products');
            $image->move($path,$imageName);
            $products->single_image = $imageName;
        }  
        else{
            $products->single_image = null;
        }
      // $products->save();

         $productid = $products->id;

           $stock = new Stock;

        $stock->product_id = $productid;
        $stock->quantity = $request->product_stock;
        $stock->status = $request->status;

       //  $stock->save();

      

    $multipleimages = $request->multiimage;
//          dd($multipleimages.length);

     
    if($multipleimages>0){

             for($i = 0; $i < $multipleimages; $i++){
                 $multiimage = new Multipleimage;

                $multiimage->product_id = $productid;
                   

               if($mulimage = $request->file('multiimage')[$i]){
                $extention = $request->file('multiimage')[$i]->getClientOriginalExtension();
                $imageName = $random.'.'.$extention;
                $path = public_path('uploads/products');
                $image->move($path,$imageName);
                $multiimage->filename = $imageName;
   }  
    else{
      $multiimage->filename = null;
    }

               $multiimage->save();

                           }

  }

      if( $stock->save()){
 //dd($products->id);
        return redirect()->back()->with('success','Product successfully saved.');
        }
        else{
           return redirect()->back()->with('error','Something Error Found !, Please try again.');
       }
   }


   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //dd($id);

        $products = 'DB'::table('products')
        -> join('categories','products.cat_id','categories.id')
        -> join('subcategories','products.sub_id','subcategories.id')
        -> join('brands','products.brand_id','brands.id')
        -> join('sizes','products.size_id','sizes.id')
        -> join('colors','products.color_id','colors.id')
        ->select('products.*','categories.name','subcategories.sub_name','brands.brand_name','colors.color_name','sizes.size_name')->where('products.id',$id)->first();
         $category = Category::all();
         $subcat = SubCategory::all();
         $brands = Brand::all();
         $sizes  = Size::all();
         $colors = Color::all();
         return view('admin.product.editProduct',compact('products','category','subcat', 'brands', 'sizes', 'colors' ));
     }
    
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    

   
    public function update(Request $request, $id) {
    {
     
        $this->validate($request,[
            'cat_id'=>'required',
            'subcat_id'=>'required',
            'brand_id'=>'required',
             'product_name'=>'required|unique:products,product_name',
             'price'=>'required',
             'size_id'=>'required',
             'color_id'=>'required',
             'product_stock'=>'required',
             'discount'=>'required',
             'product_weight'=>'required',
            'status'=>'required', 
            'image' =>'required',
             
           
           
        ]);

        $products = product::findOrFail($id);

        $products->cat_id= $request->cat_id;
            $products->sub_id= $request->subcat_id;
            $products->brand_id= $request->brand_id;
            $products->product_name= $request->product_name;
            $products->price= $request->price;
            $products->size_id= $request->size_id;
            $products->color_id= $request->color_id;
            $products->stock= $request->product_stock;
            $products->discount= $request->discount;
            $products->product_weight= $request->product_weight;
            $products->status= $request->status;
            

             
      $date = Carbon::now()->format('his')+rand(1000,9999);

        if($single_image = $request->file('single_image')){
            $extention = $request->file('single_image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extention;
            $path = public_path('uploads/single_image');
            $single_image->move($path,$imageName);


        if(file_exists('uploads/single_image/'.$products->single_image) AND !empty($products->single_image))
            {
                unlink('uploads/single_image/'.$products->single_image);
            }
            $products->single_image = $imageName;
         }  
        else
        {
            $products->single_image = $products->single_image;
        }

        if ($products->save()) {
           return redirect()->back()->with('success','product information successfully save.');
        }
        else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }   




    }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
    {
        // dd($id);

        $products = product::findOrFail($id);

            
        
        if($products){
            if( file_exists('uploads/single_image/'.$products->single_image) AND !empty($products->single_image))
            {
                unlink('uploads/single_image/'.$products->single_image);
            }
            $products->delete();
            return redirect()->back()->with('success','products information successfully deleted.');
        }
        
         else
        {
            return redirect()->back()->with('error','Something Error Found !, Please try again.');
        }
           
        }

    }

    

        public function showBrand($id){
// dd($id);
        $brand = 'DB'::table('brands')->where('sub_id',$id)->get();

        return response()->json($brand);
    }

   
        }


    


