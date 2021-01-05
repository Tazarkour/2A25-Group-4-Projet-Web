$(document).ready(function(){
 // navigation toggling 
 $('#navbar-toggler').click(function(){
  $('.navbar-nav').slideToggle(1000);
 });

 // fixed navbar 
 $(window).scroll(function(){
  let position = $(window).scrollTop();
  if(position >= 100){
   $('.navbar-wrapper').addClass('fxd-navbar-wrapper');
   $('.navbar-toggler').css("color", "#000");
   $('.nav-link').css("color", "#000");
   $('.navbar-brand').css("color", "#000");
   $('.special-nav-btn').css("background", "#f85959");
   $('.special-nav-btn .nav-link').css("color", "#fff");
   $('.navbar').css("margin", "1rem auto");
  } else {
   $('.navbar-wrapper').removeClass('fxd-navbar-wrapper');
   $('.navbar-toggler').css("color", "#fff");
   $('.nav-link').css("color", "#fff");
   $('.navbar-brand').css("color", "#fff");
   $('.special-nav-btn').css("background", "transparent");
   $('.special-nav-btn').hover(function(){
    $(this).css("background", "#f85959");
   })
   $('.navbar').css("margin", "0 auto");
  }
 });

 // featured slider 
 $('.gallery').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
 });

 // testimonial slider 
 $('.test-slider').slick({
   dots: true,
   infinite: true,
   speed: 300,
   slidesToShow: 1,
   adaptiveHeight: true,
   autoplay: true,
   autoplaySpeed: 3000,
   infinite: true
 });
});