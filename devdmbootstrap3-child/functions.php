<?php	

/////////////////////////////
// Add Custom Functions Here
/////////////////////////////


////////////////////////////////////////////////////////////////////
// Register Widget Areas
////////////////////////////////////////////////////////////////////
    

    function aspire_widgets_init() {
        
        // Add widget areas, see example below
        
        /*
        register_sidebar( array(
            'name' => 'Newsletter',
            'id' => 'newsletter',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ) );
        */

    }
    add_action( 'widgets_init', 'aspire_widgets_init' );


/////////////////////
//  Add Widgets Here
/////////////////////

    class example_widget extends WP_Widget {

        function __construct() {
            parent::__construct(
                // Base ID of your widget
                'newsletter_widget', 
        
                // Widget name will appear in UI
                __('Example Widget', 'example_widget_domain'), 
        
                // Widget description
                array( 'description' => __( 'Example Widget', 'example_widget_domain' ), ) 
            );
        }

        // Widget front-end
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            
            // if ( ! empty( $title ) )
            //     echo $args['before_title'] . $title . $args['after_title'];
            
            // Output HTML goes below
            ?>
            
            
            <?php 

            echo $args['after_widget'];
        }
                
        // Widget Backend 
        public function form( $instance ) {

        }
            
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } // Class example_widget ends here


//////////////////////////
// Add custom image sizes
//////////////////////////

	// Add cusom images sizes, see example below

	/*
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(300,300, true);
	*/


/////////////////////////////
// Customise Admin Login Page
/////////////////////////////

// @todo: add options for these in the setting page?

	// CSS for custom logo on the login screen
	function asp_logo_file() {
		//if ( get_option( 'asp_logo_file' ) != '' ) {
			echo '<style>#login{padding: 0; opacity: 1}.login h1 a { background-image: url("'.get_template_directory_uri().'/img/admin-logo.png"); background-size: auto auto; width: 320px; height: 280px}</style>';
		//}
	}

	// CSS for custom background color
	function asp_login_background_color() {
		//if ( get_option( 'asp_login_background_color' ) != '' ) {
			echo '<style>body { background : #4A3424 url("wp-content/themes/carrs/img/background-admin.jpg") no-repeat; } </style>';
		//}
	}

	// CSS for custom CSS
	//function asp_custom_css() {
	//	//if ( get_option( 'ca_custom_css' ) != '' ) {
	//		echo '<style>'. get_option( 'asp_custom_css' ) . '</style>';
	//	//}
	//}

	add_action( 'login_head', 'asp_logo_file' );
	add_action( 'login_head', 'asp_login_background_color' );
	//add_action( 'login_head', 'asp_custom_css' );

// No closing php tag


