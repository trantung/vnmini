@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>News</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="{{ route('admin.new.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề: </label>
                    <input type="text" class="form-control" id="title" value="" name="title" required>
                </div>
                <div class="form-group">
                <label>Chi tiết: </label>
                <textarea class="form-control" rows="6" id="editor1" name="description" required></textarea>
                </div>
                <div class="form-group"> 
                    <label>Ảnh: </label>
                    <input type ="file" id = "img" name ="image" accept="image/*"/>
                    <br />
                    <img src="" class="img-rounded" alt="Image" width="500" height="236" id="blah">
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <a class="btn btn-success" href="{{route('admin.new.index')}}">Back</a>
                    <input type="submit" value ="Submit" class ="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@include('admin.script')
<script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        $('[name="image"]').change(function(){
        readURL(this);
    });
        initSample();
    </script>
@endsection