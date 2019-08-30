(function($) {
	$('document').ready(function() {
		
		//$('.front .region-homepage-slider #block-banner-banner .details_wrapper .detail p span').css('font-size','16px');
		/*Alumni Register Form-- Address field-- Same as above functionality */
		$('#edit-profile-alumni-profile-field-permanent-address-und-1').live('change', function() {
			if ($(this).is(':checked')) {
				$('#edit-profile-alumni-profile-field-address-und-0-value').val($('#edit-profile-alumni-profile-field-current-address-und-0-value').val());
				$('#edit-profile-alumni-profile-field-city-1-und-0-value').val($('#edit-profile-alumni-profile-field-city-und-0-value').val());
				$('#edit-profile-alumni-profile-field-state-1-und-0-value').val($('#edit-profile-alumni-profile-field-state-und-0-value').val());
				$('#edit-profile-alumni-profile-field-pin-code-1-und-0-value').val($('#edit-profile-alumni-profile-field-pin-code-und-0-value').val());
				$('#edit-profile-alumni-profile-field-landline-number-1-und-0-value').val($('#edit-profile-alumni-profile-field-landline-number-und-0-value').val());
			} else {
				$('#edit-profile-alumni-profile-field-address-und-0-value').val(" ");
				$('#edit-profile-alumni-profile-field-city-1-und-0-value').val(" ");
				$('#edit-profile-alumni-profile-field-state-1-und-0-value').val(" ");
				$('#edit-profile-alumni-profile-field-pin-code-1-und-0-value').val(" ");
				$('#edit-profile-alumni-profile-field-landline-number-1-und-0-value').val(" ");
			}
		});
		
		/*Opening Student details page in new tab*/
		$('#quicktabs-tabpage-pgdm-6 .view-batch-details .views-field-title-1 a').each(function () {
    		$(this).attr('target','_blank');
		});

		
		/*PopUp Code PGDM*/
		//$('#block-menu-block-17').hide();
		$(".menu li.menu-mlid-724 a").append(" >>"); 
		if ($(".menu li.menu-mlid-724").length) {
			$("#block-menu-block-17").dialog({
				autoOpen : false,
				show : {
					effect : "blind",
					duration : 1000
				},
				hide : {
					effect : "explode",
					duration : 1000
				}
			});
	
			$(".menu li.menu-mlid-724").click(function() {
				$("#block-menu-block-17").dialog("open");
			});
		
		}
		/*Downloading PDF from links -- Related to PGDM */
		$(".menu-mlid-1621 a").attr('href','/sites/default/files/Mandetory_disclosure.pdf');
		$(".menu-mlid-1621 a").attr('target','_blank');
		$(".menu-mlid-1627 a").attr('href','/sites/default/files/Mandetory_disclosure.pdf');
		$(".menu-mlid-1627 a").attr('target','_blank');
		//$(".menu-mlid-1622 a").attr('href','/sites/default/files/Handbook.pdf');
		//$(".menu-mlid-1622 a").attr('target','_blank');
		//$(".menu-mlid-1628 a").attr('href','/sites/default/files/Handbook.pdf');
		//$(".menu-mlid-1628 a").attr('target','_blank');
		
		//$("#block-menu-block-19").hide();
		$(".menu li.menu-mlid-725 a").append(" >>"); 
		if ($(".menu li.menu-mlid-725").length) {
			$("#block-menu-block-19").dialog({
				autoOpen : false,
				show : {
					effect : "blind",
					duration : 1000
				},
				hide : {
					effect : "explode",
					duration : 1000
				}
			});
	
			$(".menu li.menu-mlid-725").click(function() {
				$("#block-menu-block-19").dialog("open");
			});
		
		}
		
  });
}(jQuery));
