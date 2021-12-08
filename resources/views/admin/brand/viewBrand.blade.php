@extends('master')
@section('header','view Brand')
@section('title','Brand')

@section('main-content')
<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All SubCategory</h4>
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
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($brands as $brand)   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$brand->name}}</td>
              <td>{{$brand->sub_name}}</td>
              <td>{{$brand->brand_name}}</td>
              <td>{{$brand->status ==1 ? 'open' :'Close'}}</td>
              <td><img style="width:60px; height:60px;"src="{{asset('uploads/brands/' .$brand->image)}}"  alt="not found"></td>
              <td>
                  <a href="{{route('admin.editBrand',$brand->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteBrand',$brand->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
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