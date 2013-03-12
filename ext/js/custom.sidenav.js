 var topRange      = 200,  // measure from the top of the viewport to X pixels down
     edgeMargin    = 20,   // margin above the top or margin from the end of the page
     animationTime = 600, // time in milliseconds
     contentTop = [];

$(document).ready(function(){

 // Stop animated scroll if the user does something
 $('html,body').bind('scroll mousedown DOMMouseScroll mousewheel keyup', function(e){
 if ( e.which > 0 || e.type == 'mousedown' || e.type == 'mousewheel' ){
  $('html,body').stop();
 }
})

 // Set up content an array of locations
 $('.side-nav').find('a').each(function(){
  contentTop.push( $( $(this).attr('href') ).offset().top );
 })

 // Animate menu scroll to content
  $('.side-nav').find('a').click(function(){
   var sel = this,
       newTop = Math.min( contentTop[ $('.side-nav a').index( $(this) ) ], $(document).height() - $(window).height() ); // get content top or top position if at the document bottom
   $('html,body').stop().animate({ 'scrollTop' : newTop }, animationTime, function(){
    window.location.hash = $(sel).attr('href');
   });
   return false;
 })

 // adjust side menu
 $(window).scroll(function(){
  var winTop = $(window).scrollTop(),
      bodyHt = $(document).height(),
      vpHt = $(window).height() + edgeMargin;  // viewport height + margin
  $.each( contentTop, function(i,loc){
   if ( ( loc > winTop - edgeMargin && ( loc < winTop + topRange || ( winTop + vpHt ) >= bodyHt ) ) ){
    $('.side-nav li a')
     .removeClass('active')
     .eq(i).addClass('active');
   }
  })
 })

})