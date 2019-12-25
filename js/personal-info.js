jQuery(document).ready(function(){
	//load html
	var homePageTitle = document.title;
	var homePageUrl = window.location.href;

	jQuery(document).find('#main-nav li a').click(function(eve){
	    eve.preventDefault();
	    jQuery('#personal-ajax-content').html('<div class="ajax-loader"></div>');
	    jQuery('#personal-ajax-content').show();
	    
	    // window.location.hash = jQuery(this).attr('href')
	    var title = jQuery(this).text();
	    var url = jQuery(this).attr('href');
	    
	    jQuery('#personal-ajax-content').load(jQuery(this).attr('href') + " #wraper", {}, function(e){
	       document.title =  title+ " | " + homePageTitle.split("|")[0];
	       window.history.pushState(document.title, document.title, url);
	      
	    });
	})

	jQuery("body").on("click", "a.btn-close.hover-animate", function(e){
		e.preventDefault();
		history.back();

		setTimeout(function(){
			document.title = homePageTitle;	
		}, 100);
		

		if( jQuery('#personal-ajax-content').length > 0 ){
			jQuery('#personal-ajax-content').hide();
		}else{
			window.location.href = jQuery(this).attr('href');
		}
	})
	
})
