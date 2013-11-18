$(document).ready(function(){
  $("banner1").click(function(){
    $(this).fadeOut();
  });
});
function esconder(){
	$("#banner1").hide();
	$("#centrado").hide();
	window.setTimeout(function(){	$("#banner1").fadeIn("slow"); $("#centrado").fadeIn("slow");},500);
}