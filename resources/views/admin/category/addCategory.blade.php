@extends('master')
@section('header','Add Category')
@section('title','Category')

@section('main-content')

 <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Create Category</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category_name">Category Name</label>
                                <input class="form-control" type="text" name="category_name">
                                @if ($errors->has('category_name'))
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>

                                <select id="" class="custom-select" name="status">
                                    <option value="">--select--</option>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                                @if ($errors->has('status'))
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                @endif
                            </div>

 							<div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control" type="text" name="description"></textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image">

                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>


                            <div class="form-group col-md-1">
                       <!--  <label for="image">Image Preview</label> -->
                                <div id="image-preview" ></div> 
                            </div>

                        </div>
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('custom_js')
   <script>
        $('input[type= "file"][name="image"]').val('');
        $('input[type= "file"][name="image"]').val('').on('change',function() {
        var img_path = $(this)[0].value;
        var preview = $('#image-preview');
        var extension =img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        //alert(extension);
        if(extension =='jpeg'  || extension =='jpg'     || extension =='png') {
            if(typeof(FileReader) != 'undefined') {
            preview.empty();
            var reader = new FileReader();
            reader.onload = function(e) {
                $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:80px;height:60px; margin-top:15px;'}).appendTo(preview);   
        }
        preview.show();
        reader.readAsDataURL($(this)[0].files[0]);
    }else{
            $(preview).html('not supported');
        }
    }  
    else {
        $(preview).empty();
    }


        });
    </script>
@endsection