
$(document).ready(function(){
    $('#slide-video').slick({
        infinite: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow:".arrow-left",
        nextArrow:".arrow-right"
      });

    scrollNav();
});


function scrollNav() {
  $('#link-header').click(function(){  
    //Toggle Class   
    //Animate
    $('html, body').stop().animate({
        scrollTop: $( $(this).attr('href') ).offset().top + 90
    }, 400);
    return false;
  });
  $('.scrollTop a').scrollTop();
}

function goTo(url){
    window.open(url,'_blank');
}

$(document).delegate(".video-slide-item", "click", function() {
    var idvideo = $(this).attr("videoid");
    $("#video-frame").attr("src","https://www.youtube.com/embed/"+idvideo);
});