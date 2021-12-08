@extends('master')
@section('header','view Product')
@section('title','Product')

@section('main-content')
<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Products</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-product" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>SubCat Name</th>
                                <th>Brand Name</th>
                                <th>Product Name</th>
                                <th>Product Weight</th>
                                <th>Product Stock</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Status</th>
                                <th>Price</th> 
                                <th>Discount</th>
                                <th>Single Image</th>
                                <!-- <th>Multiple Image</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($products as $product)   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->sub_name}}</td>
              <td>{{$product->brand_name}}</td>
              <td>{{$product->product_name}}</td>
              <td>{{$product->product_weight}}</td>
              <td>{{$product->stock}}</td>
              <td>{{$product->color_name}}</td>
              <td>{{$product->size_name}}</td>
              <td>{{$product->status ==1 ? 'open' :'Close'}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->discount}}</td>
              
              <!-- <td>{{$product->multiple_image}}</td> -->
             
            
              <td><img style="width:60px; height:60px;"src="{{asset('uploads/products/' .$product->single_image)}}"  alt="not found"></td>
              <td>
                  <a href="{{route('admin.editproduct',$product->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteproduct',$product->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
             </td>
        
                 </tr>
                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>





@endsection