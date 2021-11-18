@extends('master')
@section('header','View SubCategory')
@section('title','Category')
@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All SubCategory</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-category" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>SubCat Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($subcat as $sub)   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$sub->name}}</td>
              <td>{{$sub->sub_name}}</td>
              <td>{{$sub->status ==1 ? 'open' :'Close'}}</td>
              <td><img style="width:60px; height:60px;"src="{{asset('uploads/subcategory/' .$sub->image)}}"  alt="not found"></td>
              <td>
                  <a href="{{route('admin.editSubCategory',$sub->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteSubCategory',$sub->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
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