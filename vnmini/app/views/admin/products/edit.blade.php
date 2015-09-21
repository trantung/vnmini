@extends('layouts.admin')

@section('content')
<div id="content">
    <div class="page-header">
        <h1>Product / Edit </h1>
    </div>
<form action="{{ route('admin.products.update', ['product_id'=>$product->id]) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{$product->id}}</td>
        <td>
            <div class="form-group">
              <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                @if($category->id == $product->category->id)
                    {{ " selected" }}
                @endif
                >{{ $category->name }}</option>
            @endforeach
              </select>
            </div>
        </td>
        <td><input type="text" value="{{$product->name}}" name="name"/></td>
        <td><textarea  name="description">{{$product->description}}</textarea> </td>
      </tr>
    </tbody>
  </table>
  <center><h3>Product image</h3></center><br/>
      <?php 
        $img_src = asset('/images/products/product'.$product->id).'/';
      ?>
            <div class = "row">
        @foreach($product->productColor as $key => $product_color)
              <div class="col-md-4 col-sm-2 thumbnail">
                <div class="col-md-4"><span>Show index
                <input type="checkbox" class="radio" 
                value="{{ $product_color->id }}" name="index_show" 
                    @if($product->getIndexImage() === $product_color->picture)
                        {{ " checked" }}
                    @endif
                ></span></div>
                <img src="{{ $img_src.$product_color->picture }}" alt="{{ $product_color->name }}" style="width:40%; height:40%;" id="image{{ $product_color->id }}" class="img-responsive">
                <input type="file" name="image[{{ $product_color->id }}]" id="{{ $product_color->id }}" accept="image/*" onchange="readURL(this);" />
              </div>
        @endforeach
            </div>

        <div class ="row">
            <a class="btn btn-default" href="{{ action('Admin\ProductController@index') }}">Back</a>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-warning" type="submit">Update</button>
        </div>
</form>
</div>

<script type="text/javascript">
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