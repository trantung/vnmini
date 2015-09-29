@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Shops</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="{{ route('admin.shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" value="{{ $shop->name }}" name="name" required>
                </div>
                <div class="form-group">
                    <label for="add">Địa chỉ:</label>
                    <input type="text" class="form-control" id="add" value="{{ $shop->address }}" name="address" required>
                </div>
                <div class="form-group">
                    <label for="founder">Người sáng lập:</label>
                    <input type="text" class="form-control" id="founder" value="{{ $shop->user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="manager">Liên hệ:</label>
                    <input type="text" class="form-control" id="manager" value="{{ $shop->contact }}" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="tel">ĐT cố định:</label>
                    <input type="text" class="form-control" id="tel" value="{{ $shop->tel }}" name="tel" required>
                </div>
                <div class="form-group">
                    <label for="mobile">ĐT di động:</label>
                    <input type="text" class="form-control" id="mobile" value="{{ $shop->mobile }}" name="mobile" required>
                </div>
                <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="6" id="editor1" name="description" required>{{ $shop->description }}</textarea>
                </div>
                <div class="form-group"> 
                    <label>Ảnh cửa hàng</label>
                    {{Form::file('image_url',"", array('class'=>'form-control','id'=>'img'))}}
                    <br />
                    <img src="{{ asset('img/shops/').'/'.$shop->image_url }}" class="img-rounded" alt="Cinque Terre" width="500" height="236" id="blah">
                </div>
                <div class="form-group">
                    <label>Vị trí</label>
                </div>
                <div class="form-group col-sm-6 col-md-6">
                    <label for="latitude">Lat:</label>
                        <input class="form-control" id="latitude" value="{{ $shop->lat }}" name="lat" required>
                </div>
                <div class="form-group col-sm-6 col-md-6">
                    <label for="longitude">Long:</label>
                        <input class="form-control" id="longitude" value="{{ $shop->long }}" name="long" required>
                </div>
                <div class = "form-group">
                    <div class="col-md-3 col-md-offset-3" id="mapview" style="width:500px;height:500px"></div>
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <a class="btn btn-success" href="{{route('admin.shop.index')}}">Back</a>
                    <input type="submit" value ="Submit" class ="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@include('admin.script')
<script type="text/javascript">
        var defaultLat = (document.getElementById('latitude').value!=0) ? document.getElementById('latitude').value : 21.00296184;
var defaultLng = (document.getElementById('longitude').value!=0) ? document.getElementById('longitude').value : 105.85202157;
 </script>
<script type="text/javascript" src="{{ asset('admins/js/gmap.js') }}"></script>
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
        $('[name="image_url"]').change(function(){
        readURL(this);
    });
        initSample();
    </script>
@endsection