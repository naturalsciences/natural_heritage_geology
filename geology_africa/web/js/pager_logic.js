if(typeof jQuery ==="undefined")
{
	

	var script = document.createElement("script");
	script.src = "../../js/jquery-3.3.1.js";
	script.type = "text/javascript";
	document.getElementsByTagName('head')[0].appendChild(script);

}



/**/


window.onload = function() {
    //$(function(){ alert("jQuery + DOM loaded."); })
	
	$(document).ready(
		function()
		{
				$("#appbundle_dsample_search").click(
					function()
					{
						alert($("#appbundle_dsample_searchnum").val());
					}
				);
		}
	);
}