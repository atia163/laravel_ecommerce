@extends('master')
@section('header','Add Product')
@section('title','Product')

@section('main-content')
 <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3>Create Product</h3>
                </div>
                @include('admin.includes.message')
                <div class="card-body">
                    <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cat_id">Category Name</label>
                                 <select id="" class="custom-select" name="cat_id">
                                    <option value="">--select category name--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cat_id'))
                                    <p class="text-danger">{{ $errors->first('cat_id') }}</p>
                                @endif
                            </div>

                             <div class="form-group col-md-6">
                                <label for="subcat_id">SubCategory Name</label>
                                 <select id="subcat_id" class="custom-select" name="subcat_id">
                                    <option value=""></option>
                                </select>
                                @if ($errors->has('subcat_id'))
                                    <p class="text-danger">{{ $errors->first('subcat_id') }}</p>
                                @endif
                            </div>

                             <div class="form-group col-md-6">
                                <label for="brand_id">Brand Name</label>
                                 <select id="brand_id" class="custom-select" name="brand_id">
                                    <option value=""></option>
                                </select>
                                @if ($errors->has('brand_id'))
                                    <p class="text-danger">{{ $errors->first('brand_id') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_name">Product Name</label>
                                 <input id="product_name" class="custom-select" name="product_name">
                                @if ($errors->has('product_name'))
                                    <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_weight">Product Weight</label>
                                 <input id="product_weight" class="custom-select" name="product_weight">
                                @if ($errors->has('product_weight'))
                                    <p class="text-danger">{{ $errors->first('product_weight') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_stock">Product Stock</label>
                                 <input id="product_stock" class="custom-select" name="product_stock">
                                @if ($errors->has('product_stock'))
                                    <p class="text-danger">{{ $errors->first('product_stock') }}</p>
                                @endif
                            </div>
							<div class="form-group col-md-6">
                                <label for="color_id">Product Color</label>
                                 <select id="color_id" class="custom-select" name="color_id">
                                    <option value="">--Choose a Color--</option>
                                    @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color_id'))
                                    <p class="text-danger">{{ $errors->first('color_id') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="size_id">Product Size</label>
                                 <select id="size_id" class="custom-select" name="size_id">
                                    <option value="">--Choose a Size--</option>
                                    @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color_id'))
                                    <p class="text-danger">{{ $errors->first('color_id') }}</p>
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
                                <label for="price">Price</label>
                                <input id="" type="number" class="custom-select" name="price">
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="discount">Discount</label>
                                <input id="" class="custom-select" name="discount">
                                @if ($errors->has('discount'))
                                    <p class="text-danger">{{ $errors->first('discount') }}</p>
                                @endif
                            </div>

 							<!-- <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control" type="text" name="description"></textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div> -->

                            <div class="form-group col-md-5">
                                <label for="image">Singe Image</label>
                                <input class="form-control" type="file" name="image">

                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                              <div class="form-group col-md-1">
                                <!-- <label for="image">Image Preview</label> -->
                                <div id="image-preview"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="multiimage">Multiple Image</label>
                                <input class="file" type="file"  id="file1" name="multiimage[]" multiple data-overwrite-initial = "false">

                                @if ($errors->has('multiimage'))
                                    <p class="text-danger">{{ $errors->first('multiimage') }}</p>
                                @endif
                            </div>
                        
                        </div>
                        <input class="btn btn-success col-md-12" type="submit" name="submit" value="SUBMIT">
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('custom_js')
   <script>

   	//image preview

   	$('input[type= "file"][name="image"]').val('');
       $('input[type= "file"][name="image"]').val('').on('change',function(){
       	var img_path = $(this)[0].value;
       	var preview = $('#image-preview');
       	var extention = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
       	// alert(extention);

       	if(extention == 'jpeg' || extention == 'jpg' || extention == 'png'){
       		if(typeof(FileReader) != 'undefined'){
       			preview.empty();
       			var reader = new FileReader();

       			reader.onload = function(e){
       				$('<img/>',{'src': e.target.result, 'class':'img-fluid','style':'width:80px;height:60px; margin-top:15px;'}).appendTo(preview);
       			}
       			preview.show();
       			reader.readAsDataURL($(this)[0].files[0]);
       		}else{
       			$(preview).html('not supported');
       		}
       	}
       	else{
       		$(preview).empty();
       	}
       });

		//for SubCategory

      $('select[name="cat_id"]').on('change', function () {
                    var catId = $(this).val();
                    // alert(catId);
                    if (catId) {
                        $.ajax({
                            url: "{{url('admin/brand/showSubCategory')}}"+"/" + catId,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {

                             $('select[name="subcat_id"]').empty();
                             $('#subcat_id').append('<option value ="">----select subcategory----</option>');
					        $.each(data,function(index,subcatObj){
					            $('#subcat_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.sub_name+'</option>');
					        });
                            }
                        });
                    } else {
                        $('select[name="subcat_id"]').empty();
                    }
                });

      //FOR BRAND

       $('select[name="subcat_id"]').on('change', function () {
                    var subcatId = $(this).val();
                    // alert(subcatId);
                    if (subcatId) {
                        $.ajax({
                            url: "{{url('admin/product/showBrand')}}"+"/" + subcatId,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {

                             $('select[name="brand_id"]').empty();
                              $('#brand_id').append('<option value ="">----select brand----</option>');
					        $.each(data,function(index,subcatObj){
					            $('#brand_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.brand_name+'</option>');
					        });
                            }
                        });
                    } else {
                        $('select[name="brand_id"]').empty();
                    }
                });

       			$('#file1').fileinput({
       				theme: 'fa',
       				uploadUrl:"/image/submit",
       				uploadExtraData:function(){
       					return {
       						_token:$("input[name='_token']").val()
       					};
       				},
       				allowedFileExtensions:['jpg','png','gif','jpeg'],
       				overwriteInitial:false,
       				maxFileSize:2000,
       				maxFileNum:0,
       				slugCallback:function(filename){
       					return filename.replace('(','_').replace(']','_');
       				}
       			});
    </script>
@endsection