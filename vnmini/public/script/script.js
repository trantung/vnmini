  $('.slick-auto').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 8000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerPadding: '40px',
          centerMode: true,
          slidesToShow: 1
        }
      }
    ]
  });
  $('.slick-auto-2').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 80000,
    responsive: [
     {
        breakpoint: 1208,
        settings: {
          // centerPadding: '10px',
          slidesToShow:3
        }
      },
      {
        breakpoint: 767,
        settings: {
          centerPadding: '40px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 540,
        settings: {
          slidesToShow: 2
        }
      }
    ]
  });
  var quantity = 0;
  $('#add-quantity').click(function(){
      var tmp =  parseInt($('#quantity').val());
      if(tmp > quantity ){
          quantity = tmp;
      }else if(tmp<0 || isNaN(tmp)){
           quantity = 0;
      }else{
          quantity+=1;
      }
      $('#quantity').val(quantity);
      console.log(quantity);
  });

  $('#sub-quantity').click(function(){
      var tmp =  parseInt($('#quantity').val());
      if( tmp<=0 || isNaN(tmp)){
          quantity = 0;
      }else{
          console.log( tmp-1);
          console.log( tmp);
          quantity= tmp-1;
      }
      $('#quantity').val(quantity);
      console.log(quantity);
  });

  // back to top.
  jQuery(document).ready(function($){
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
      ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
      if( $(this).scrollTop() > offset_opacity ) { 
        $back_to_top.addClass('cd-fade-out');
      }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
      event.preventDefault();
      $('body,html').animate({
        scrollTop: 0 ,
        }, scroll_top_duration
      );
    });

});

//Add product to cart
var cart = {
  'add': function(url){
    location=url;
  },
  'update': function(url) {

    $.ajax({
      url: url,
      type: 'PUT',
      data: 'quantity=' + $('#quantity').val(),
      dataType: 'json',
      beforeSend: function() {
        console.log($('#quantity').val());
        $('#cart > button').button('');
      },
      success: function(json) {
        $('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        $('#cart > button').button('reset');
        $('#cart-total').html(json['total']);
        var url      = window.location.href;
        $('#cart').load(url+' #cart');
        $('#content').load(url+' #content');
        setTimeout(function() {$('.alert').fadeOut(1000)},3000)
      }
    });
  },
  'remove': function(url,key) {
    console.log(url);
    $.ajax({
      url: url,
      type: 'DELETE',
      data: 'key=' + key,
      dataType: 'json',
      beforeSend: function() {
        $('#cart > button').button('');
      },
      success: function(json) {
        $('#content').parent().before('<div class="alert alert-warning"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        $('#cart > button').button('reset');

        $('#cart-total').html(json['total']);
        // var pathname = window.location.pathname;
        var url      = window.location.href;
        $('#cart').load(url+' #cart');
        $('#content').load(url+' #content');
        setTimeout(function() {$('.alert').fadeOut(1000)},3000)
      }
      
    });
  }
}
