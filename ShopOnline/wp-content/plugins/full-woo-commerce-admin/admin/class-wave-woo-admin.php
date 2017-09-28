<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wave_woo_admin
 * @subpackage wave_woo_admin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wave_woo_admin
 * @subpackage wave_woo_admin/admin
 * @author     Your Name <email@example.com>
 */
class wave_woo_admin_Admin {

    /**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wave_woo_admin    The ID of this plugin.
	 */
    private $wave_woo_admin;

    /**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
    private $version;
    private $pluginurl;
    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wave_woo_admin       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
    public function __construct( $wave_woo_admin, $version ) {

        $this->wave_woo_admin = $wave_woo_admin;
        $this->version = $version;
        $this->pluginurl = plugin_dir_url( __FILE__ ) ;
        $this->pluginurl_js = plugin_dir_url( __FILE__ ) . "js/";

        $this->post_type= "product";
        $this->post_columns = array("sku"=>__("Sku","wave_woo_admin"), "name"=>__("Name","wave_woo_admin"));
        $this->taxonomy = "product_cat";


    }

    /**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
    public function enqueue_styles() {

        /**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wave_woo_admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wave_woo_admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style( $this->wave_woo_admin, plugin_dir_url( __FILE__ ) . 'css/wave-woo-admin.css', array(), $this->version, 'all' );

    }

    private function whoami()
    {
        $screen = get_current_screen();
        if($screen->base=="woocommerce_page_wave-woo-admin") return true; else return false; 
    }
    public function wave_jquery_fancy_tree()
    {
        if ($this->whoami()) 
        {
            wp_enqueue_script( "wave_jquery_ui", "//code.jquery.com/ui/1.11.3/jquery-ui.min.js", array( 'jquery' ), $this->version, false );	

             wp_enqueue_style("wave_fancy_tree", $this->pluginurl_js  . 'fancytree/skin-win8/ui.fancytree.css"', array(), $this->version, 'all' );
            wp_enqueue_script("wave_fancy_tree", $this->pluginurl_js  . 'fancytree/jquery.fancytree-all.min.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script("wave_fancy_tree_dnd", $this->pluginurl_js  . 'fancytree/src/jquery.fancytree.dnd5.js', array( 'jquery', 'wave_fancy_tree' ), $this->version, false );
            wp_enqueue_script("wave_jquery_counter", $this->pluginurl_js  . 'sophilabs-jquery-counter-7cc91ab/src/jquery.counter.js', array( 'jquery'  ), $this->version, false );
            wp_enqueue_style("wave_jquery_counter", $this->pluginurl_js  . 'sophilabs-jquery-counter-7cc91ab/src/jquery.counter-analog.css"', array(), $this->version, 'all' );
        }


    }
   
    public function wave_jquery_layout()
    {
        if ($this->whoami()) 
        {
            wp_enqueue_script("wave_layout", $this->pluginurl_js  . 'layout/jquery.layout.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_style("wave_layout", $this->pluginurl_js  . 'layout/jquery.layout.css"', array(), $this->version, 'all' );

            wp_enqueue_script("wave_fancy_tree_init",$this->pluginurl_js . 'wave_fancytree_init.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script("wave_init", $this->pluginurl_js  . 'wave_init.js', array('wave_fancy_tree_init', 'wave_fancy_tree', 'wave_layout' ), $this->version, true );
            wp_enqueue_script("wave_infinite", $this->pluginurl_js  . 'wave_infinite.js', array(  'wave_init'  ), $this->version, true );

            wp_localize_script( 'wave_init', 'ajax_object',
                               array( 'ajax_url' => admin_url( 'admin-ajax.php' ),
                                     'wave_nonce' => wp_create_nonce('wave_ajax'),
                                    ) );

        }
    }
    public function wave_menu_page() //called from class-wave-woo-admin
    {

        add_submenu_page( 'woocommerce', 'Full Woo Commerce Admin', 'Full Admin', 'manage_options', 'wave-woo-admin',  array(&$this, 'wave_menu_page_html') ); 

    }
    public function wave_menu_page_html()
    {
        $output .= "";
        $output .= ' <div id="wave_header">
        <div id="title" class="element">    Full Woo Commerce Admin     </div>
  
        
       
         <div id="count" class="element"></div> 
  
        <div id="search">
         
        &nbsp;<select id="wave_search_options"></select>
        &nbsp;<input id="wave_search" size="20">
        &nbsp;<img src="' . $this->pluginurl . 'img/question.jpg" class="element" id="searchbutton">
        &nbsp;<img src="' . $this->pluginurl . 'img/reset.jpg" class="element" id="resetbutton">
         </div>
         </div>';
        $output .= "<div id='wave_layout'><div id='wavetree'  	class='pane ui-layout-west'>";
		$output .= "<div id='resetAllProducts'>ALL PRODUCTS</div>";
        $output .=self::fn_wave_get_children($this->taxonomy, 0);
        $output .= '</div><div id="wavewing" class="pane ui-layout-center">
      
        <div id="wave_table"> </div><div class="waiting"></div></div></div>';
        echo $output;
    }
    function fn_wave_get_children($tax,$parent)
    {
        $atts = array("tax"=>$tax, "parent"=>$parent);
        $terms = get_terms($atts['tax'],array('parent' => $atts['parent'],   'hide_empty' =>false));
        if ($parent>0) $output  = '<ul id="categorytree' .$atts['parent'] . '">';
        else $output= '<ul  id="treeData"  >';
      //  print_r($terms);
        //avoid duplicating terms // to investigate 20170401
        $arrDisplayed=array();
        foreach($terms as $term) {
            // $term_child = get_term_by('id',$term_child_id,$atts['tax']);

            if (!in_array($term->term_id,  $arrDisplayed ))
            {
                $arrDisplayed[]= $term->term_id;
                $output .= '
            <li id="leaf' .  $term->term_id  .'">' . $term->term_id  . "-" .  $term->name   ;
                $output.= self::fn_wave_get_children($atts['tax'], $term->term_id);
                $output .="</li>";
            }


        }
        $output .= '</ul>';

        return $output;
    }
    public function wave_move_category_dnd_action_callback()
{

check_ajax_referer('wave_ajax' ,'wave_nonce');
$sourceCategory =   str_replace("leaf","",$_POST["sourceCategory"]);
$destCategory =   str_replace("leaf","",$_POST["destCategory"]);
$objsourceCategory = get_term_by('id',absint( $sourceCategory));
    $update = wp_update_term($sourceCategory, 'product_cat', array(
        'parent' => $destCategory

    )) ;
    if ( ! is_wp_error( $update ) ) echo 1; else echo 0;
    wp_die();
}
public function  wave_title_filter($where )
{
    global $wpdb;

        $search_term = $wpdb->esc_like($_POST["s"]); //instead of esc_sql()
        $search_term = ' \'%' . $search_term . '%\'';

        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$search_term;

    return $where;
}

    public function wave_get_category_products_action_callback()
    {
        check_ajax_referer('wave_ajax' ,'wave_nonce');
        $product_category = str_replace("leaf","",$_POST["category"]);
        $arr_meta_query=array();
        $s=$_POST["s"];
        $sf=$_POST["sf"];
        if ($s!="" &&  $sf=="sku")
        {
            $arr_meta_query[]=array(
            'key'           => '_sku',
            'value'         =>  $s ,
            'compare'       => 'LIKE'
            );
        }
        if ($s!="" &&  $sf=="" )
        {
             $sQuery=$s;
        }

        if ( $product_category !="")
			{
				$taxQuery = array(array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'id', 
                    'terms'     => $product_category
                ));
			}
        $args = array( 
            'post_type' => 'product', 
            "posts_per_page"=>10,
           "s"=>$sQuery,
            "paged"=>$_POST["paged"],
            'meta_query' =>$arr_meta_query
        );
		if (is_array($taxQuery)) $args["tax_query"] = $taxQuery;
      if ($s!="" && $sf=="title") add_filter('posts_where',array($this,'wave_title_filter'),10,2);
        $query = new WP_Query( $args ); // $query is the WP_Query Object
      // echo $query->request;


       $arrData=array();
       $arrData["count"]=$query->found_posts;
       $arrData["countmax"]=wp_count_posts( "product");
       $arrData["maxnumpage"]=$query->max_num_pages;
        $posts = $query->get_posts();   // $posts contains the post objects
        if ($s!="" && $sf=="title") remove_filter('posts_where',array($this,'wave_title_filter'),10,2);
        $arrRecords = array();
        // echo  count($posts);
        foreach( $posts as $post ) {  
            $product = wc_get_product( $post->ID );
	  	$sku = $product->get_sku();
            $arrimage=  wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'thumbnail' ));
            if (is_array($arrimage)) $image=$arrimage[0]; else 
             $image =wc_placeholder_img_src("thumbnail");
            $arrRecords[] = array( 'id' => $post->ID, 
                                    'sku'=>$sku,
                                  'link'=> get_edit_post_link($post->ID),
                                  'name' => $post->post_title,
                                 'image'=>$image);
        }
       /* try for dynatable $output= array(
        'records'=>$arrRecords ,
        "queryRecordCount"=> count($arrRecords),
  "totalRecordCount"=> count($arrRecords)); */
         wp_send_json( array("data"=>$arrData,"products" =>$arrRecords) );
      


        wp_die();
    }
    /**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
    public function enqueue_scripts() {

        /**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wave_woo_admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wave_woo_admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        //wp_enqueue_script( $this->wave_woo_admin, plugin_dir_url( __FILE__ ) . 'js/wave-woo-admin.js', array( 'jquery' ), $this->version, false );

    }

}
