jQuery(document).ready(function($) {

	// Uploading files
	var file_frame;

	jQuery.fn.upload_listing_images = function( button ) {
		var button_id = button.attr('id');
		var field_id = button_id.replace( '_button', '' );

		// If the media frame already exists, reopen it.
		if ( file_frame ) {
		  file_frame.open();
		  return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
		  title: jQuery( this ).data( 'uploader_title' ),
		  button: {
		    text: jQuery( this ).data( 'uploader_button_text' ),
		  },
		  multiple: true
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			var selection = file_frame.state().get('selection');
			var attachment = selection.first().toJSON();
			var img = jQuery("#listingimagesdiv img:first");
			setImg(img, attachment);

			if (selection.length > 1) {
				for (var i = 1; i < selection.length; i++) {
					cloneImg(img, selection.at(i).toJSON());
				}
			}

			jQuery( '#' + button_id ).attr( 'id', 'remove_listing_images_button' );
			jQuery( '#remove_listing_images_button' ).text( 'Remove Images' );
		});

		// Finally, open the modal
		file_frame.open();

		function setImg(img, attachment) {
			var val = jQuery("#"+field_id).val();
			if (val) {
				jQuery("#"+field_id).val(val + "," + attachment.id);
			} else {
				jQuery("#"+field_id).val(attachment.id);
			}
			img.attr('src',attachment.url);
			img.show();
		}
		function cloneImg(img, attachment) {
			var newimg = img.clone();
			setImg(newimg, attachment)
			newimg.insertAfter(img);
		}
	};

	jQuery('#listingimagesdiv').on( 'click', '#upload_listing_images_button', function( event ) {
		event.preventDefault();
		jQuery.fn.upload_listing_images( jQuery(this) );
	});

	jQuery('#listingimagesdiv').on( 'click', '#remove_listing_images_button', function( event ) {
		event.preventDefault();
		jQuery( '#upload_listing_images' ).val( '' );
		jQuery( '#listingimagesdiv img' ).attr( 'src', '' );
		jQuery( '#listingimagesdiv img' ).hide();
		jQuery( this ).attr( 'id', 'upload_listing_images_button' );
		jQuery( '#upload_listing_images_button' ).text( 'Set Images' );
		jQuery( '#listingimagesdiv img:not(:first)' ).remove();
	});

});