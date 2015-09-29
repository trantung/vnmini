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