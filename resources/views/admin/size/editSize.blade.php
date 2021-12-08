@extends('master')
@section('header','Edit Size')
@section('title','Size')


@section('main-content')

<section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Edit Size</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('update.size',$sizes->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="form-group col-md-6">  
                        <label for="size_name">Size Name</label>
                        <input class ="form-control" type="text" name="size_name" value="{{$sizes->size_name}}">
                                   
                           @if ($errors->has('size_name'))
                                    <p class="text-danger">{{ $errors->first('size_name') }}</p>
                                @endif
                            </div>

                              <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select id="" class="custom-select" name="status">
                                    <option value="">--select--</option>
                                    <option {{$sizes->status ==1? 'selected' : ''}} value="1">Open</option>
                                    <option {{$sizes->status ==0? 'selected' : ''}} value="0">Close</option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                @endif
                            </div>

                           
                            </div>
     
                        </div>

                        <input class="btn btn-success" type="submit" name="submit" value="submit"   style="height: 40px; width: 90px"/>                 
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection