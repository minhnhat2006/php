<?php

function create_type_propety() {
  register_post_type( MY_POST_TYPE,
    array(
      'labels' => array(
        'name' => __( 'Properties' ),
        'singular_name' => __( 'Property' ),
      ),
      'taxonomies'  => array( 'topics', 'category' ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
      //'register_meta_box_cb' => 'my_meta_box_cb',
      'show_ui' => true,
      'query_var' => true
    )
  );
}

/*
function my_meta_box_cb () {
  add_meta_box( MY_POST_TYPE . '_details' , 'Image Gallery', 'my_meta_box_details', MY_POST_TYPE, 'normal', 'high' );
}

function my_meta_box_details () {
  global $post;
  $post_ID = $post->ID; // global used by get_upload_iframe_src
  printf( "<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media') );
}
*/

add_action( 'init', 'create_type_propety' );

if ( function_exists( 'add_theme_support')){
  add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail

/**
https://wordpress.org/plugins/featured-galleries

function add_featured_galleries_to_ctp( $post_types ) {
    array_push($post_types, MY_POST_TYPE);
    return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp' );*/


/*
https://stackoverflow.com/questions/36506088/upload-multiple-featured-images-in-a-custom-post-wordpress
*/
//init the meta box
/*add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){
    //on which post types should the box appear?
    $post_types = array(MY_POST_TYPE);
    foreach($post_types as $pt) {
        add_meta_box('custom_postimage_meta_box',  __( 'Image Gallery', MY_DOMAIN), 'custom_postimage_meta_box_func', $pt, 'side');
    }
}

function custom_postimage_meta_box_func($post){
    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('second_featured_image');
    foreach($meta_keys as $meta_key){
        $image_meta_val = get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a href="<?php echo get_site_url(); ?>" class="addimage thickbox" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('Set Images', MY_DOMAIN); ?></a><br>
            <a href="" class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('Remove Images', MY_DOMAIN); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>

    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('Select Images', MY_DOMAIN); ?>',
            button: {
                text: '<?php _e('Select Images', MY_DOMAIN); ?>'
            },
            multiple: true
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>

    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'Not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('second_featured_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}
*/

/*
https://hugh.blog/2015/12/18/create-a-custom-featured-image-box/
*/
add_action( 'add_meta_boxes', 'listing_images_add_metabox' );
function listing_images_add_metabox () {
  add_meta_box( 'listingimagesdiv', __( 'Gallery Images', MY_DOMAIN ), 'listing_images_metabox', MY_POST_TYPE, 'side', 'low');
}

function listing_images_metabox ( $post ) {
  global $content_width, $_wp_additional_image_sizes;
  $image_ids = preg_split('/,/', get_post_meta( $post->ID, '_listing_images_id', true ), -1, PREG_SPLIT_NO_EMPTY);
  $old_content_width = $content_width;
  $content_width = 254;
  if ( !empty($image_ids) && get_post( $image_ids ) ) {
    $thumbnail_html = '';
    foreach ($image_ids as $image_id) {
      if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
        $thumbnail_html .= wp_get_attachment_image( $image_id, array( $content_width/2, $content_width/2 ) );
      } else {
        $thumbnail_html .= wp_get_attachment_image( $image_id, 'post-thumbnail' );
      }
    }
    if ( ! empty( $thumbnail_html ) ) {
      $content = $thumbnail_html;
      $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_images_button" >' . esc_html__( 'Remove Images', MY_DOMAIN ) . '</a></p>';
      $content .= '<input type="hidden" id="upload_listing_images" name="_listing_cover_images" value="' . esc_attr( implode(',', $image_ids) ) . '" />';
    }
    $content_width = $old_content_width;
  } else {
    $content = '<img src="" style="width:' . esc_attr( $content_width/2 ) . 'px;height:auto;border:0;display:none;" />';
    $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set Images', 'text-domain' ) . '" href="javascript:;" id="upload_listing_images_button" id="set-listing-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set listing image', 'text-domain' ) . '">' . esc_html__( 'Set Images', 'text-domain' ) . '</a></p>';
    $content .= '<input type="hidden" id="upload_listing_images" name="_listing_cover_images" value="" />';
  }
  echo $content;
}
add_action( 'save_post', 'listing_images_save', 10, 1 );
function listing_images_save ( $post_id ) {
  if( isset( $_POST['_listing_cover_images'] ) ) {
    $image_ids = $_POST['_listing_cover_images'];
    update_post_meta( $post_id, '_listing_images_id', $image_ids );
  }
}