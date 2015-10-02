<header class="container">
    <div class="logo"> 
        <a href="/">
            <img src="{{ asset('img/logo.png') }}">
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
                <form class="home-search navbar-form" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
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
                    <li class="first"><a href="/">Home</a></li>
                    @foreach($sorts as $sort)
                        <li><a href="{{ route('frontend.sort.show', $sort->id) }}">{{ $sort->name }}</a></li>
                    @endforeach
                    <li><a href="{{ route('frontend.tintuc') }}">Tin töùc</a></li>
                    <li><a href="{{ route('frontend.lienhe') }}">Lieân heä</a></li>
                </ul>
                <!-- menu -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
    
</header>