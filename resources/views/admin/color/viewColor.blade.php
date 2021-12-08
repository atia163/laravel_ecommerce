@extends('master')
@section('header','View Color')
@section('title','Color')

@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> All Colors</h4>
                </div>

                @include('admin.includes.message')

                <div class="card-body">
                    <table id="all-brand" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Color Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($colors as $color)   
                 <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$color->color_name}}</td>
              <td>{{$color->status ==1 ? 'open' :'Close'}}</td>
            <td>
                  <a href="{{route('admin.editColor',$color->id)}}"class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> </a>
                  <a href="{{route('admin.deleteColor',$color->id)}}"class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i</a>
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
