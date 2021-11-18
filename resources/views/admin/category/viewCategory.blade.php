@extends('master')
@section('header','View Category')
@section('title','Category')
@section('main-content')


<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Category</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-category" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($categories as $category )   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->status ==1 ? 'open' :'Close'}}</td>
              <td><img style="width:60px; height:60px;"src="{{asset('uploads/category/' .$category->image)}}"  alt="not found"></td>
              <td>
                  <a href="{{route('admin.editCategory',$category->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteCategory',$category->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
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