$(document).ready(function(){
  var $container = $('.link-rows');
  // init
  $container.isotope({
    // options
    itemSelector: '.individual-card',
    layoutMode: 'masonry'
  });

  $(".link").on( "click", function() {
    $(this).parent().hide();
  });

  $(".openAll").on("click", function() {
    $(".link a").each(function() {
      var clk = document.createEvent("MouseEvents");
      clk.initMouseEvent("click", false, true, window, 0, 0, 0, 0, 0, true, false, false, true, 0, null);
      this.dispatchEvent(clk);
    });
  });

});
