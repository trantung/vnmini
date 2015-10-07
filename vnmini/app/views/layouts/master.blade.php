<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>VN STONE ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admins/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admins/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admins/css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('ckeditor/samples/css/samples.css')}}">
    <link href="{{ asset('admins/css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('admins/js/jquery.js') }}"></script>
    <script src="{{ asset('admins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('admins/ckeditor/adapters/jquery.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places" style=""></script>
    <script>
        $(function() {
            var current = $(location).attr('href');
            $($("a[href='"+current+"']")).parents('li').addClass('active');
        });
$(document).ready(function(){
    $('#btnUpdatePassWord').prop('disabled', true);
    function showError(obj, removeClass, addClass, color){
        obj.removeClass(removeClass);
        obj.addClass(addClass);
        obj.css("color",color);

    };
    var hasError = true;
    $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    
    if($("#password").val().length <= 6){
        hasError = false;
        showError($("#oldPass"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#oldPass"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    }
    if($("#password1").val().length >= 6){
        hasError = false;
        showError($("#6char"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#6char"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    }
    
    if(ucase.test($("#password1").val())){
        hasError = false;
        showError($("#ucase"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#ucase"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    }
    
    if(lcase.test($("#password1").val())){
        hasError = false;
        showError($("#lcase"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#lcase"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    }
    
    if(num.test($("#password1").val())){
        hasError = false;
        showError($("#num"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#num"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    }
    
    if($("#password1").val() == $("#password2").val() && $("#password1").val().length>=6){
        hasError = false;
        showError($("#pwmatch"),'glyphicon-remove', 'glyphicon-ok','#00A41E');
    }else{
        hasError = true;
        showError($("#pwmatch"),'glyphicon-ok', 'glyphicon-remove','#FF0004');
    };

    $('#btnUpdatePassWord').prop('disabled', hasError);
});
    $('#passwordForm').submit(function(event) {

        var formData = {
            'old_password'      : $('#password').val(),
            'new_password'      : $('#password1').val(),
            're_password'       : $('#password2').val(),
        };
        // process the form
        $.ajax({
            type        : 'PUT',
            url         : $(this).attr('action'), // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
            beforeSend: function() {
                $('#btnUpdatePassWord').prop('disabled', true);
            },
        })
        // using the done promise callback
        .done(function(data) {
            if(data['error']){
                $('#err_msg').text(data['error']);
            }
            if(data['success']){
                $('#err_msg').text(data['success']);
                window.setTimeout('location.reload()', 5000);
            }
        });
        event.preventDefault();
    });
});
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admins/js/bootstrap.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css_open')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">VN Stone Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('get.logout') }}"><i class="fa fa-fw fa-user"></i> Logout</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user.show', Auth::user()->id) }}"><i class="glyphicon glyphicon-pencil"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#" data-target="#pwdModal" data-toggle="modal">
                                <i class="glyphicon glyphicon-cog"></i>
                                Update-Pass
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý sản phẩm </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sort.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý loại sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ action('CategoryController@index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý nhóm sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bannerimage.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý ảnh bannner</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bannerslide.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý slide</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.discount.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý chiết khấu</a>
                    </li>
                    

                    <li>
                        <a href="{{ route('admin.order.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý hoá đơn</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.comment.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý comment</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.new.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý tin tức</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.shop.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý thông tin cửa hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.promotion.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý thông tin chiết khấu</a>
                    </li>
                    @if(Auth::user()->isAdmin())
                        <li>
                            <a href="{{ route('admin.user.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý user</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('admin.descriptionseo.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý thông tin seo cho description</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.footer.index') }}"><i class="fa fa-fw fa-dashboard"></i>Quản lý thông tin footer</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!--modal-->
                <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h1 class="text-center">Đổi Mật Khẩu</h1>
                          <h5 style="color:red; text-align:center " id="err_msg"></h5>
                      </div>
                      <div class="modal-body">
                            <form method="post" id="passwordForm" action="{{ route('admin.user.update', Auth::user()->id) }}">
                                <input type="password" class="input-lg form-control" name="password" id="password" placeholder="Mật khẩu cũ">
                                <div class="col-sm-6">
                                 <span id="oldPass" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>Mật khẩu cũ
                                </div>
                                <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Mật khẩu mới">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span id="6char" class="glyphicon glyphicon-remove" style="color:#FF0004;">
                                        </span> 6 ký tự<br>
                                        <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;">
                                        </span> viết hoa 1 ký tự
                                    </div>
                                    <div class="col-sm-6">
                                        <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> kí tự viết thường<br>
                                        <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> kí tự số
                                    </div>
                                </div>
                                <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="nhập lại mật khẩu" autocomplete="off">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> mật khẩu không trùng nhau
                                    </div>
                                </div>
                                <br />
                                <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Loading..." value="Cập nhật" id="btnUpdatePassWord">
                            </form>
                      </div>
                      <div class="modal-footer">
                          <div class="col-md-12">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                          </div>    
                      </div>
                  </div>
                  </div>
                </div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    @yield('script_close')
</body>
</html>
