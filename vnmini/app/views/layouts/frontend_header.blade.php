<header id="fixed-top">
 <div class="container" >

    <div class="logo"> 
        <a href="/">
            <img src="{{ asset($info->logo) }}">
        </a>
    </div>
    <div class="row">
        <nav class="navbar navbar-default col-xs-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-right">
                @if(Request::segments() == null || Request::segments()[0] != 'tin-tuc' )
                    <form class="home-search navbar-form" role="search" action="{{ route('frontend.search') }}" method="GET"> 
                @else
                    <form class="home-search navbar-form" role="search" action="{{ route('frontend.search.new') }}" method="GET"> 
                @endif
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="name">
                            <div class="input-group-addon"><input type="submit" value="submit" ></div>
                        </div>
                    </div>
                </form>
                <!-- form search -->
                <div class="cart" id="cart">
                    <label>
                        Giỏ hàng
                        <span class="cart-item">{{ Cart::count() }} item(s)</span>
                    </label>
                    <a href="{{ route('cart.index') }}">cart</a>
                </div>
                <!-- .cart -->
            </div>
            <!-- .navbar-right -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="first"><a href="/">{{ uniToVni('TRANG CHỦ') }}</a></li>
                    @foreach($sorts as $sort)
                        <li class="dropdown">
                            <a href="{{ route('frontend.sort.category.product', ['sort_name'=>$sort->name_seo,'sort_id'=>$sort->id, 'cate_id'=>0, 'cate_name'=>'tat-ca']) }}" aria-haspopup="true" aria-expanded="false" id="sub-menu-{{$sort->id}}" class="dropdown" >{{ uniToVni($sort->name) }}</a>
                            @if(!$sort->categories->isEmpty())
                            <ul class="sub-menu dropdown-menu" aria-labelledby="sub-menu-1">
                                @foreach($sort->categories->sortBy('weight_number') as $category)
                                    <li><a href="{{ route('frontend.sort.category.product', [$sort->name_seo, $sort->id, $category->id, $category->name_seo]) }}">{{ uniToVni($category->name) }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
                    <li><a href="{{ route('frontend.tintuc') }}">Tin töùc</a></li>
                    <li><a href="{{ route('frontend.lienhe') }}">Lieân heä</a></li>
                </ul>
                <!-- menu -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<script type="text/javascript">
    
        $('.dropdown').hover(
      function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
      }, 
      function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
      }
    );

    $('.dropdown-menu').hover(
      function() {
        $(this).stop(true, true);
      },
      function() {
        $(this).stop(true, true).delay(200).fadeOut();
      }
    );

</script>
</header>