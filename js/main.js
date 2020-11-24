/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 100;
		yOffset = 0;
		
		
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.preview").hover(function(e){
		
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		
		$("body").append("<p id='preview'><img src='"+ this.href +"' alt='Image preview' />"+ c +"</p>");								 
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.css("z-index","1")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$("#preview").remove();
    });	
    
    $("a.preview").mousemove(function(e){
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});
    
    //================================================================
    
    xOffset2 = 10
	yOffset2 = 0;
		
	$("a.preview2").mousemove(function(e){
		$("#preview2")
			.css("top",(e.pageY - xOffset2) + "px")
			.css("left",(e.pageX + yOffset2) + "px");
	});
	
	$("a.preview2").hover(function(e){
		
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		
		$("body").append("<p id='preview2'><img src='"+ this.href +"' alt='Image preview2' />"+ c +"</p>");								 
		$("#preview2")
			.css("top",(e.pageY - xOffset2) + "px")
			.css("left",(e.pageX + yOffset2) + "px")
			.css("z-index","1")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$("#preview2").remove();
    });	
				
};


// starting the script on page load
$(document).ready(function(){
	imagePreview();
});