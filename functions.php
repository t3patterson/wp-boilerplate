<?php 
//-------------
// Set up CSS file-loading
//-------------
  function theme_dir() {
   return get_template_directory_uri();
  }

  function theme_styles() {
    wp_enqueue_style('main_css', theme_dir() . '/dist/style.min.css' );
  }

  add_action('wp_enqueue_scripts', 'theme_styles');

//-------------
// Set up JS script-loading
//-------------

  function theme_js(){
    global $wp_scripts;

    wp_register_script(
      'html5_shiv', // handle
      'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', //link-to-file
      '', //dependencies
      '', //version #
      false //load in header(`true` loads in footer) 
    );

    wp_register_script(
      'respond_js', 
      'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', 
      '', 
      '', 
      false  
    );

    $wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
    $wp_scripts->add_data('respond_js', 'conditional', 'lt IE 9');
    
    wp_enqueue_script('bootstrap_js', theme_dir() . '/js/bootstrap.min.js', ['jquery'] , '', true);
    wp_enqueue_script('theme_js', theme_dir() . '/js/theme.js', ['jquery','bootstrap_js'], '', true);
  }

  add_action('wp_enqueue_scripts', 'theme_js');

  //-------------
  //Adding theme support
  //-------------

  //allows us to create a new header menu on the backend that will also show on the frontend
  add_theme_support('menus');

  //allows us to create custom post types that lets us dynamically populate posts w images
  add_theme_support('post-thumbnails'); 


  function register_theme_menus(){
    register_nav_menus(
      [
        'header-menu' => __('Header Menu')
      ]
    ); 
  }

  add_action('init', 'register_theme_menus' );
  

  //-------------
  //creting/registering a sidebar widget
  //------------
  function create_widget($name, $id, $description){

    $widget_options = [
      'name' => __($name),
      'id' => $id,
      'description' => __($description),
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
      
    ];

    register_sidebar($widget_options);
  }

  create_widget('Front Page Left', 'front-left', 'Displays on left of hompage');
  create_widget('Front Page Center', 'front-center', 'Displays on center of hompage');
  create_widget('Front Page Right', 'front-right', 'Displays on right of hompage');

  create_widget('Page Sidebar', 'page', 'Displays on pages w sidebar');
  create_widget('Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section');

  create_widget('Company-Description', 'company-desc', 'Wall of Text');


?>