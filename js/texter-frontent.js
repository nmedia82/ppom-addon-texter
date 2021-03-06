"use strict"
jQuery(function($){

    /*********************************
    *    Texter Addon Frontent JS    *
    **********************************/


    /*-------------------------------------------------------
        
        ------ Its Include Following Function -----

        1- Hide All Textboxes Settings
        2- Get All Textboxes Meta Via Loop
        3- Show/Hide Textboxes Setting Meta On Click Event
        4- Show Title Text Over Selected Textbox
        5- Textboxes Google Font Families List Function
        6- Textboxes Font Size Function
        7- Show Textboxes Character Limit Function
        8- Textboxes Text Alignment Function
        9- Textboxes Text colors Function
        10- Create Div To Image And Data Image URL 
        11- Save Textboxes Meta In Hidden Input Function
        12- Create Hidden Input For Textboxes Meta Functions
        13- Create Hidden Input For Data Image URL Function
    ------------------------------------------------------------*/


    /**
        1- Hide All Textboxes Settings
    **/
	$('.ppom-all-textbox-setting').hide();


	/**
        2- Get All Textboxes Meta Via Loop
    **/
	$('.ppom-text-over-image').each(function(i, meta_field){

        var textbox_id = $(meta_field).attr('data-textbox-id');
        var field_id   = $(meta_field).attr('data-field-id');

        // get all font families
        ppom_font_families(textbox_id);

        // get font size
        ppom_font_size(textbox_id);

        // get text alignments
        ppom_text_alignment(textbox_id);

        // get text color
        ppom_text_color(textbox_id);

        // getting textbox meta
        ppom_textbox_meta(textbox_id, field_id);

        // show character limit
        ppom_charater_limit(textbox_id);

    });


	/**
        3- Show/Hide Textboxes Setting Meta On Click Event
    **/
	$('body').on('click', '.ppom-text-over-image', function(e){

		e.preventDefault();

		var textbox_id = $(this).attr('data-textbox-id');
		var closer  = $(this).closest('.texter-remodel-closer');
		closer.find('.texter-title-hide').hide();
        closer.find('.ppom-texter-frontent-wrapper .modal-title').hide();
		closer.find('.ppom-all-textbox-setting').hide();
		closer.find("#ppom-setting-"+textbox_id+"").show();
	});


	/**
        4- Show Title Text Over Selected Textbox
    **/
	$('.ppom-all-textbox-setting input[type="text"]').on('keyup', function(e) {
		e.preventDefault();

        var $this = $(this);
        var div = $this.closest('.texter-remodel-closer');
        var textbox_id = $this.attr('data-input-id');
        div.find("[data-textbox-id='"+textbox_id+"']" ).html($(this).val());
	});


	/**
        5- Textboxes Google Font Families List Function
    **/
    function ppom_font_families(textbox_id){

    	var id = $("#ppom-setting-"+textbox_id+"");
    	
	    $('.texter-font-family-'+textbox_id+'').fontselect().change(function(){

			// replace + signs with spaces for css
			var font = $(this).val().replace(/\+/g, ' ');

			// split font into family and weight
			font = font.split(':');

			// set family on textbox 
			$("[data-textbox-id='"+textbox_id+"']" ).css('font-family', font[0]);
	    });
    }


    /**
        6- Textboxes Font Size Function
    **/
    function ppom_font_size(textbox_id){

		var originalSize = $("[data-textbox-id='"+textbox_id+"']" ).css('font-size');
		var selector_id = $("#ppom-setting-"+textbox_id+"");
			
		// reset font size
		$(".ppom-reset-font", selector_id).click(function(e){
			e.preventDefault();

			$("[data-textbox-id='"+textbox_id+"']" ).css('font-size', originalSize); 
		});

	    // Increase Font Size
	    $(".ppom-inc-font-size", selector_id).click(function(e){
	    	e.preventDefault();

		  	var currentSize = $("[data-textbox-id='"+textbox_id+"']" ).css('font-size');
		 	var currentSize = parseFloat(currentSize)*1.2;
		  	$("[data-textbox-id='"+textbox_id+"']" ).css('font-size', currentSize);
	    });

	    // Decrease Font Size
	    $(".ppom-dec-font-size", selector_id).click(function(e){
	    	e.preventDefault();

		    var currentFontSize = $("[data-textbox-id='"+textbox_id+"']" ).css('font-size');
		    var currentSize = $("[data-textbox-id='"+textbox_id+"']" ).css('font-size');
		    var currentSize = parseFloat(currentSize)*0.8;
		    $("[data-textbox-id='"+textbox_id+"']" ).css('font-size', currentSize);
	    });
	}


	/**
        7- Show Textboxes Character Limit Function
    **/
    function ppom_charater_limit(textbox_id){

    
    	var selector_id = $("#ppom-setting-"+textbox_id+"");

	    var text_max = $('#ppom-img-text-show', selector_id).attr('maxlength');
	
	    if (text_max == '') {
	    	$('.ppom-texter-char-limit', selector_id).html('');
	    }else{
	    	$('.ppom-texter-char-limit', selector_id).html(text_max + ' characters remaining');
	    }
	    
	    $("[data-input-id='"+textbox_id+"']").keyup(function() {
	        
	        if (text_max != '') {

	        var text_length = $(this).val().length;
	        var text_remaining = text_max - text_length;
	        $('.ppom-texter-char-limit', selector_id).html(text_remaining + ' characters remaining');
	        }

	    });
    }


    /**
        8- Textboxes Text Alignment Function
    **/
	function ppom_text_alignment(textbox_id){

		var selector_id = $("#ppom-setting-"+textbox_id+"");

		// text align left
		$(".ppom-text-left", selector_id).click(function(e){
			e.preventDefault();

			var text_align = $("[data-textbox-id='"+textbox_id+"']" ).css('text-align','left');
	    });

		// text align center
	    $(".ppom-text-center", selector_id).click(function(e){
	    	e.preventDefault();

			var text_align = $("[data-textbox-id='"+textbox_id+"']" ).css('text-align','center');
	    });

	    // text align right
	    $(".ppom-text-right", selector_id).click(function(e){
	    	e.preventDefault();

			var text_align = $("[data-textbox-id='"+textbox_id+"']" ).css('text-align','right');
	    });

	    // text align justify
	    $(".ppom-text-justify", selector_id).click(function(e){
	    	e.preventDefault();

			var text_align = $("[data-textbox-id='"+textbox_id+"']" ).css('text-align','justify');
	    });

	}


	/**
        9- Textboxes Text colors Function
    **/
	function ppom_text_color(textbox_id){

		var selector_id = $("#ppom-setting-"+textbox_id+"");

		// iris color picker
		$(".color-iris", selector_id).iris({
			palettes: true,
			change: function(evt, ui) {
			var color = $(this).iris('color', true).toCSS();
			
	    	$("[data-textbox-id='"+textbox_id+"']" ).css('color', color);
			}
		});

		// remove iris color picker if click any away
	    $(document).click(function (e) {
	        if (!$(e.target).is(".color-iris, .iris-picker, .iris-picker-inner, .iris-square-inner, .iris-palette-container, .iris-palette")) {
	            $(".color-iris", selector_id).iris('hide');
	        }
    	});

	    // run iris color picker after remove
	    $(".color-iris", selector_id).click(function (event) {
	        $(".color-iris", selector_id).iris('hide');
	        $(this).iris('show');
	    });
	}


	/**
        10- Create Div To Image And Data Image URL 
    **/
	$('.remodal-confirm').click(function (e) {
		e.preventDefault();

		var field_id = $(this).attr('data-dataname');
		var element = $("#texter_image_"+field_id+"_data");

		html2canvas(element.get(0)).then(canvas => {

            ppom_create_hidden_input_for_data_image( 'image_data_url', canvas.toDataURL(), field_id);
        });
		

	});


	/**
        11- Save Textboxes Meta In Hidden Input Function
    **/
	function ppom_textbox_meta(textbox_id, field_id){

		var selector_id = $("#ppom-setting-"+textbox_id+"");

		var element = $("#texter_image_"+field_id+"_data");

		$('.texter-save-meta-'+field_id+'').click(function (e) {
			e.preventDefault()
			
		    var dataname = $(".texter-dataname-js", selector_id).val();
			var div = $(this).closest('.texter-remodel-closer');

		    var key = $("#ppom-textbox-title", selector_id).val().toLowerCase().replace(/\s+/g, "_");
		    var $_title = $("#ppom-textbox-title", selector_id).val();
		   	var title = $("#ppom-img-text-show", selector_id).val();
		   	var color = $("#ppom-iris-color", selector_id).val();
		   	var bg_color = $("[data-textbox-id='"+textbox_id+"']" ).css('background-color');
		   	var font_family = $("#ppom-get-font-family", selector_id).val();
		   	
		   	if (color == '' || color == undefined) {
		   		color = $("[data-textbox-id='"+textbox_id+"']" ).css('color');
		   	}
		   	if(font_family == '' || font_family == undefined){
		   		font_family = $("[data-textbox-id='"+textbox_id+"']" ).css('font-family');
		   	}
		   	if(bg_color == '' || bg_color == undefined){
		   		bg_color = 'transparent';
		   	}


		   	var font_size = $("[data-textbox-id='"+textbox_id+"']" ).css('font-size');
		   	var alignments = $("[data-textbox-id='"+textbox_id+"']" ).css('text-align');

		   	var position_top  = $("[data-textbox-id='"+textbox_id+"']" ).css('top');
		   	var position_left = $("[data-textbox-id='"+textbox_id+"']" ).css('left');
		   	
		    ppom_create_hidden_input( 'text', title, textbox_id, key, dataname);
		    ppom_create_hidden_input( 'color', color, textbox_id, key, dataname );
		    ppom_create_hidden_input( 'font_family', font_family, textbox_id, key, dataname );
		    ppom_create_hidden_input( 'font_size', font_size, textbox_id, key, dataname );
		    ppom_create_hidden_input( 'text_align', alignments, textbox_id, key, dataname );
		    ppom_create_hidden_input( 'textbox_bg_color', bg_color, textbox_id, key, dataname  );
		    ppom_create_hidden_input( 'box_title', $_title, textbox_id, key, dataname  );
		    ppom_create_hidden_input( 'pos_top', position_top, textbox_id, key, dataname  );
		    ppom_create_hidden_input( 'pos_left', position_left, textbox_id, key, dataname  );

		});
	}


	/**
        12- Create Hidden Input For Textboxes Meta Functions
    **/
    function ppom_create_hidden_input( attr, value, draggable_id, key, dataname ) {

        var container = $('.ppom-wrapper');
        // GETTING X
        var the_id    = 'ppom-'+attr+'-'+draggable_id;
        // remove/reset
        $("#"+the_id).remove();
        var _x = $('<input/>')
                .attr({'type':'hidden','name':'ppom_texter['+dataname+']['+key+']['+attr+']'})
                .attr('id', the_id)
                .val(value)
                .appendTo(container);
    }


    /**
        13- Create Hidden Input For Data Image URL Function
    **/
    function ppom_create_hidden_input_for_data_image( attr, value, dataname ) {

        var container = $('.ppom-wrapper');
        // GETTING X
        var the_id    = 'ppom-'+attr+'-'+dataname;
        // remove/reset
        $("#"+the_id).remove();
        var _x = $('<input/>')
                .attr({'type':'hidden','name':'ppom_texter['+dataname+']['+attr+']'})
                .attr('id', the_id)
                .val(value)
                .appendTo(container);
    }

});