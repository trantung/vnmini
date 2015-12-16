@extends('layouts.master')
@section('css_open')
<style type="text/css">
    .product_list_id{
        display: none;
    }
    ul{
        background-color:#fff;
        list-style-type:none;
    }
    li:hover
    {
        background-color:#c3c6e0;
        cursor:pointer;
    }
</style>
@stop

@section('content')
<div class="page-header">
    <h1>Chi tiết sản phẩm phụ</h1>
</div>
@include('admin.error-message')
{{ Form::open(['action' => ['ProductExtraController@update', $product->id], 'method' => 'PUT' ]) }}
    <div class="form-group col-sm-4 col-md-8">
         <label for="category">Select Type:</label>
        {{ Form::select('type_id' , ['' => 'Select type'] + CommonCategory::getTypeProduct(), $product->type_id, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm:</label>
        {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ Form::text('code', $product->code, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Sản phẩm chính</label>
        {{ Form::text('primary_name', $primaryName, ['class' => 'form-control', 'id' => 'primary_name', 'onkeyup'=>"autocomplet()"]) }}    
        <ul id="product_list_id" class="list-group"></ul>
        {{ Form::hidden('product_id', $primary->product_id, ['class' => 'form-control', 'id' => 'primary_id']) }}
    </div>

    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ Form::text('origin_price', $product->origin_price, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ Form::text('new_price', $product->new_price, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-sm-4 col-md-8">
        <a class="btn btn-success" href="{{ action('ProductExtraController@index') }}">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>           
{{ Form::close() }}
@include('admin.script')
@stop
@section('script_close')
<script type="text/javascript">
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    $('#imgInp').change(function(){
        readURL(this, '#blah1');
    });
    $('#imgInp2').change(function(){
        readURL(this, '#blah2');
    });

    $("#name").change(function(){
        $.ajax({
            url: '/product/ajax',
            type: 'POST',
            success: function(response) {
                owner_json = response.data;
                var availableTags = $.map(owner_json, function(el) { return el; });
                $( '#relate_id' ).autocomplete({
                    source: availableTags
                });
                console.log(1);            }
        });  
    })
    

    // autocomplet : this function will be executed every time we change the text
function autocomplet() {
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#primary_name').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: '{{ route("admin.product.ajax") }}',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#product_list_id').show();
                $('#product_list_id').html(data);
            }
        });
    } else {
        $('#product_list_id').hide();
    }
}

// set_item : this function will be executed when we select an item
function set_item(item, id) {
    // change input value
    $('#primary_name').val(item);
    $('#primary_id').val(id);
    // hide proposition list
    $('#product_list_id').hide();
}

$('li').mouseover(function()
  {
          
    $('li:hover').css('background','red'); 
  });
$('li').mouseout(function()
  {
          $(this).css('background', 'transparent');
  });
</script>
@stop