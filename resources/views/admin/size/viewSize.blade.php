@extends('master')
@section('header','View Size')
@section('title','Size')
@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Sizes</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-brand" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Size Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($sizes as $size)   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$size->size_name}}</td>
              <td>{{$size->status ==1 ? 'open' :'Close'}}</td>
            <td>
                  <a href="{{route('admin.editSize',$size->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteSize',$size->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
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