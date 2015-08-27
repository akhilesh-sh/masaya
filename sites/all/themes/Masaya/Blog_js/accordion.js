jQuery(document).ready(function(){
	function close_accordion_section() {
		jQuery('.accordion .accordion-section-title').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(0).removeClass('open');
	}
	jQuery('.accordion-section-title').click(function(e) {
		var currentAttrValue = jQuery(this).attr('href');
	  	// console.log(currentAttrValue);
		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();
			jQuery(this).addClass('active');
			jQuery('.accordion ' + currentAttrValue).slideDown(200).addClass('open'); 
	    jQuery('html, body').animate({
		  scrollTop: (jQuery(''+currentAttrValue).offset().top-105)
		}, 200);
	    // console.log(jQuery(''+currentAttrValue).offset().top);
		}
		e.preventDefault();
	});
});