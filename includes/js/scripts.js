Fluidvids.init({
    selector: 'iframe',
    players: ['www.youtube.com', 'player.vimeo.com', 'vimeo.com']
  });
  
jQuery(function($) {
	$(document).ready( function() {
	  //enabling stickUp on the '.navbar-wrapper' class
	  $('.site-navigation').stickUp();
	});
});

jQuery(document).ready(function( $ ) {
  // Call Quovolver on the '.quotes' object
  $('.quotes').quovolver({
    children : 'li',
    transitionSpeed : 600,
    autoPlay : true,
    equalHeight : false,

  });
});

jQuery(document).ready(function( $ ) {
    $(".expandImg").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
	});	  
});
jQuery(document).ready(function( $ ) {
// get array of elements
var myArray = $("#tracklist div");
var count = 0;

// sort based on timestamp attribute
myArray.sort(function (a, b) {
    
    // convert to integers from strings
    a = parseInt($(a).attr("tracknumber"), 10);
    b = parseInt($(b).attr("tracknumber"), 10);
    count += 2;
    // compare
    if(a > b) {
        return 1;
    } else if(a < b) {
        return -1;
    } else {
        return 0;
    }
});

// put sorted results back on page
$("#tracklistDisplay").append(myArray);
$("#calls").append(count+1);
});