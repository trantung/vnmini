@extends('layouts.admin')

@section('css_open')
 <link href="{{ asset('/css1/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
@stop
@section('script_close')
<script src="{{ asset('js1/fileinput.min.js') }}" type="text/javascript"></script>
@stop
@section('content')
<div id="content">
@if(Session::has('message'))
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('message') }}</strong>
  </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-error fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('error') }}</strong>
  </div>
@endif
    <div class="page-header">
        <h1>Product / Create </h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7.5">
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#frmImportExcel" style="padding: 6px 12px; !important;">
            Import Excel
        </button>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="frmImportExcel" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form id="frmExcel" class="form-horizontal" role="form" action="{{ route('product.import.excel') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Import product From Excel
                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                        <div style="position:relative;">
            <a class='btn btn-primary' href='javascript:;'>
                Choose File...
                <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="excel" size="40"  onchange='$("#upload-file-info").html($(this).val());' required accept=".xls,.xlsx" id="myFile">
            </a>
            &nbsp;
            <span class='label label-info' id="upload-file-info"></span>
            <div class="form-group">
                    <label  class="col-sm-4 control-label"
                              for="from_line">From Row:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" 
                        id="from_line" placeholder="example 13, 14 ...." name="start_row"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"
                          for="to-line" >To Row:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            id="to-line" placeholder="example 50, 55 ...." name="end_row"/>
                    </div>
                  </div>
        </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close
                    </button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-info">Import</button>
                        </div>
                      </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    <div class="container">
    <br/>
    <br>
    <h2>Normal Import</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
            <div class="form-group col-sm-4 col-md-8">
                <label for="category">Select Category:</label>
                  <select class="form-control" id="category" name="category" required>
                  <option value="">Select category</option>
                @foreach(App\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder"product name" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="model">Model:</label>
              <input type="text" class="form-control" id="model" name="model" placeholder"product model" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="code">Code:</label>
              <input type="text" class="form-control" id="code" name="code" placeholder"product code" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="size">Size:</label>
              <input type="text" class="form-control" id="size" name="size" placeholder"product size" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="color">Color Id:</label>
              <input type="text" class="form-control" id="color" name="color" placeholder"product color" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="color_name">Color Name:</label>
              <input type="text" class="form-control" id="color_name" name="color_name" placeholder"color name" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
                <label for="silk">Select Silk Code:</label>
                  <select class="form-control" id="silk" name="silk" required>
                  <option value="">Select silk code</option>
                @foreach(App\Silk::all() as $silk)
                    <option value="{{ $silk->id }}">{{ $silk->code}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="price">Price:</label>
              <input type="text" class="form-control" id="price" name="price" placeholder"product price" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="country">Country:</label>
              <input type="text" class="form-control" id="country" name="country" placeholder"product country">
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="description">Description:</label>
              <textarea class="form-control" rows="5" id="description" name = "description"></textarea>
            </div>
            <div class="form-group col-sm-4 col-md-8">
                <input id="input-file" class="file" type="file" multiple data-min-file-count="1" name = "image[]">
                <br>
                <a class="btn btn-success" href="{{ action('Admin\ProductController@index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>           
            <div class ="form-group col-sm-4 col-md-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $("#frmExcel").submit(function( event ) {
      var ext = $('#myFile').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['xls','xlsx']) == -1) {
            alert('invalid extension!');
            return false;
        }
      return true;
    });
    $("input:checkbox").click(function() {
        if ($(this).is(":checked")) {
            var group = "input:checkbox[name='" + $(this).attr("name") + "']";
            $(group).prop("checked", false);
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            console.log(input.id);
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image'+ input.id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection