jQuery(document).ready(function($) {
    $("#nav-toggler").click(function(){
      $("#collapse-nav").toggleClass("collapsed");
      //console.log($("#collapse-nav").attr("class"));
    });
});
