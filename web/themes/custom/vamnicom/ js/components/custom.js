jQuery(document).ready(function(){
                        
/*onclick date age calculation*/
                        
jQuery('#edit-dateofbirth-datepicker-popup-0').change(function(){
var myBD = jQuery('#edit-dateofbirth-datepicker-popup-0').val();
var today = new Date();
var dd = Number(today.getDate());
var mm = Number(today.getMonth()+1);
var yyyy = Number(today.getFullYear()); 
var myBDM = Number(myBD.split("/")[0])
var myBDD = Number(myBD.split("/")[1])
var myBDY = Number(myBD.split("-")[2])
var age = yyyy - myBDY;
 if(mm < myBDM)
        {
        age = age - 1;      
        }
        else if(mm == myBDM && dd < myBDD)
        {
        age = age - 1
        };

        jQuery('#edit-age').val(age);
});

                        /*end*/
			/*jQuery('#block-menu-menu-alumni-menu .content li.last a').attr('target', '_blank');*/
			var url = document.URL; 
	    	var hi = url.search('/hi/');
			if(hi != -1 ) {
		 		jQuery('.page-node-131 .region-sidebar-first #block-menu-block-8 h2').text('पुस्तकालय');
				jQuery('.page-node-131 ul.brdcrumbs li').eq(1).text('पुस्तकालय >> ');
				jQuery('.page-node-131 ul.brdcrumbs li').eq(2).text(' सदस्यता के लिए आवेदन');
				jQuery('.page-node-131 .inner-con .page-title').text('सदस्यता के लिए आवेदन');
				jQuery('.page-node-2 .region-contact-us #node-1 h2 a').text('प्रतिक्रिया / सुझाव ');
				jQuery('#block-menu-block-7 h2').text('सिक्टैब ');
				jQuery('#node-1 #webform-component-email label').html("ईमेल <span class='form-required' title='This field is required.'>*</span>");
				jQuery('#node-1 #webform-component-mobile label').html("मोबाइल <span class='form-required' title='This field is required.'>*</span>");
			}
	/*Operating System Browser Specific Menu CSS*/
	var isLinux = navigator.platform.toUpperCase().indexOf('LINUX')!==-1;
	if (isLinux) {
 		
 		if(jQuery.browser.mozilla) {
 			var url = document.URL; 
	    	var hi = url.search('/hi/');
			if(hi != -1 ) {
 				jQuery('form#search-block-form').css("margin-left","-78px");
 				//jQuery('.header ul.lang .region-language-switcher').css('margin-top','25px');
 				jQuery('#google_translate_element').css('margin-top','3px');
 			} else {
 				jQuery('form#search-block-form').css("margin-left","-24px");
 				
 			}
 		}
 		
 		var isChrome =  window.chrome;
 		if(isChrome) {	
	 		var url = document.URL; 
	    	
	    	var hi = url.search('/hi/');
			if(hi != -1 ) {
				
				jQuery('form#search-block-form').css("margin-left","-89px");
				jQuery('.front .wlcm-box .wtxt p.link1').css("float","right");
				jQuery('.front .wlcm-box .wtxt p.link1').css("margin-left","-20px");
				jQuery('.front .wlcm-box .wtxt p.link1').css("width","160px");
				//jQuery('.header ul.lang .region-language-switcher').css('margin-top','25px');
				
		    } else {
		    	jQuery('form#search-block-form').css("margin-left","-21px");
		    }
 			
 		}
 		
	}	
		
	/*jQuery('#node-333 .form-item').each(function(){
		jQuery(this).find('input').attr('placeholder', jQuery(this).find('label').text());
	});
	*/

	jQuery('#site-name a').removeAttr('href');
	jQuery('.page-node-2 #block-webform-client-block-1 #node-1 h2 a').removeAttr('href');
	jQuery('.language-switcher-locale-url li.last a').attr('href','/hi/node');
	jQuery('.view-student-records .item-list h3 a').attr('href','javascript:void(0);');
    jQuery('.view-student-records .item-list h3').unbind('click').click(function() {
        jQuery(this).next().slideToggle('slow');
    });
    
    /*seach bar in menu*/
    jQuery('#search-block-form #edit-submit').click(function(){
    if(jQuery('#edit-search-block-form--2').val() == '') {
        alert('Enter text to search');
        return false;
    }
  
});
    
    jQuery('#edit-search-block-form--2').attr('placeholder','Search  Here');
    
    jQuery(".menu-block-wrapper ul.menu li a.active-trail").click(function(e){
    e.preventDefault();
    if(false == jQuery(this).next().is(':visible')) {
    	if(!jQuery(this).parent().hasClass('menu-mlid-724')) {
    		
    		if(!jQuery(this).parent().hasClass('menu-mlid-725')) {
    		jQuery('.menu-block-wrapper ul.menu li ul.menu').slideUp(300);
    	  }
    		//jQuery('.menu-block-wrapper ul.menu li ul.menu').slideUp(300);
    	}
    	
    }
    jQuery(this).next().slideToggle(300);
});
 
jQuery('.menu-block-wrapper .menu ul:eq(0)').show();
    
    jQuery('.menu-block-wrapper ul.menu li.active-trail a.active-trail').attr('href','javascript:void(0);');
    //jQuery('.menu-block-wrapper ul.menu > li a:first-child').attr('href','javascript:void(0);');
    
    jQuery('.not-logged-in.page-user div.page-title').replaceWith('<div class="page-title">Log in</div>');
     jQuery('.modal-title span.popups-close').replaceWith('<a class="close" href="#">Close Window</a>');
    
    /*alumni register page title*/
    jQuery('fieldset#edit-profile-alumni-profile legend').eq(0).hide();
    
	jQuery('#webform-client-form-1 .form-submit').click(function(e){
    var errorvar = 0;
    jQuery('.required').each(function(){
    
        if(jQuery(this).val() == ''){
            errorvar = 1;
             jQuery(this).addClass("error");
        }
    });
   
    if(errorvar == 1){
        alert('Please fill the value in redbox.');
        jQuery('#messages').hide();
        e.preventDefault();
    } 
        
});

/* Added this code for display current month tab active on prog By: NileshC Date: Nove-11,2014*/        
jQuery(".page-node-157 .quicktabs-wrapper ul li:first-child").removeClass("active");
var d = new Date();
var month = d.getMonth()+1;
if (month === 1){month = 10}
else if(month === 2){month = 11}
else if(month === 3){month = 12}
else if(month === 4){month = 1}
else if(month === 5){month = 2}
else if(month === 6){month = 3}
else if(month === 7){month = 4}
else if(month === 8){month = 5}
else if(month === 9){month = 6}
else if(month === 10){month = 7}
else if(month === 11){month = 8}
else if(month === 12){month = 9}
jQuery(".page-node-157 .quicktabs-wrapper ul li:nth-child("+month+")").addClass("active");
jQuery( ".page-node-157 .quicktabs-wrapper ul li.active a" ).trigger( "click" );
/* End active tab */
	

jQuery( "#edit-submitted-upload-upload" ).addClass( "required" );
});
/*Placeholder in search form Hindi*/
window.onload = function() {
	var url = document.URL; 
	var hi = url.search('/hi/');
	if(hi != -1 ) {
		
	    jQuery('#edit-search-block-form--2').attr('placeholder',"यहाँ खोज");
	}
}

