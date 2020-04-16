<?php
add_action('wp_footer', 'show_template');
function show_template() {
  global $template;
  
  if(WP_DEBUG === true){
    print_r($template);
  }
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'jtsgrounds_scripts');
function jtsgrounds_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'jtsgrounds-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('jtsgrounds-scripts');
}

add_filter('script_loader_tag', 'jtsgrounds_add_script_meta', 10, 2);
function jtsgrounds_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'jtsgrounds_styles');
function jtsgrounds_styles(){
  wp_register_style(
    'google-fonts',
    '//fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap'
  );

  wp_register_style(
    'jtsgrounds-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('jtsgrounds-css');
}

add_action('after_setup_theme', 'jtsgrounds_setup');
function jtsgrounds_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  add_theme_support(
    'html5',
    array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    )
  );

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');

  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'footer-nav' => 'Footer Navigation',
  ));

  load_theme_textdomain('jtsgrounds', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function jtsgrounds_header_fallback_menu(){ ?>
  <div id="header-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('home')); ?>" class="nav-link" title="Home">Home</a>
      </li>
      <li class="nav-item<?php if(is_page('about-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link" title="About Us">About Us</a>
      </li>
      <?php
        $services_page = get_page_by_path('services');
        $services_page_id = $services_page->ID;
        global $post;
      ?>
      <li class="nav-item dropdown<?php if(is_page('services') || ($post->post_parent == $services_page_id)){ echo ' active'; } ?>">
        <a href="#" class="nav-link dropdown-toggle text-nowrap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Services">Services</a>
        <ul class="dropdown-menu">
          <li class="nav-item<?php if(is_page('forestry-mulching')){ echo ' active'; } ?>">
            <a href="<?php echo esc_url(home_url('forestry-mulching')); ?>" class="dropdown-item">Forestry Mulching</a>
          </li>
          <li class="nav-item<?php if(is_page('drainage-services')){ echo ' active'; } ?>">
            <a href="<?php echo esc_url(home_url('drainage-services')); ?>" class="dropdown-item">Drainage Services</a>
          </li>
          <li class="nav-item<?php if(is_page('landscaping-services')){ echo ' active'; } ?>">
            <a href="<?php echo esc_url(home_url('landscaping-services')); ?>" class="dropdown-item">Landscaping Services</a>
          </li>
          <li class="nav-item<?php if(is_page('land-clearing')){ echo ' active'; } ?>">
            <a href="<?php echo esc_url(home_url('land-clearing')); ?>" class="dropdown-item">Land Clearing</a>
          </li>
          <li class="nav-item<?php if(is_page('snow-and-ice-management')){ echo ' active'; } ?>">
            <a href="<?php echo esc_url(home_url('snow-and-ice-management')); ?>" class="dropdown-item">Snow & Ice Management</a>
          </li>
        </ul>
      </li>
      <li class="nav-item<?php if(is_page('portfolio')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('portfolio')); ?>" class="nav-link" title="Portfolio">Portfolio</a>
      </li>
      <li class="nav-item<?php if(is_page('testimonials')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('testimonials')); ?>" class="nav-link" title="Testimonials">Testimonials</a>
      </li>
      <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="Contact Us">Contact Us</a>
      </li>
    </ul>
  </div>
<?php }

function jtsgrounds_footer_fallback_menu(){ ?>
  <div id="footer-nav" class="">
    <ul class="navbar-nav">
      <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('home')); ?>" class="nav-link" title="Home">Home</a>
      </li>
      <li class="nav-item<?php if(is_page('about-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link" title="About Us">About Us</a>
      </li>
      <?php
        $services_page = get_page_by_path('services');
        $services_page_id = $services_page->ID;
        global $post;
      ?>
      <li class="nav-item<?php if(is_page('services') || ($post->post_parent == $services_page_id)){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('services')); ?>" class="nav-link" title="Services">Services</a>
      </li>
      <li class="nav-item<?php if(is_page('portfolio')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('portfolio')); ?>" class="nav-link" title="Portfolio">Portfolio</a>
      </li>
      <li class="nav-item<?php if(is_page('testimonials')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('testimonials')); ?>" class="nav-link" title="Testimonials">Testimonials</a>
      </li>
      <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="Contact Us">Contact Us</a>
      </li>
    </ul>
  </div>
<?php }

add_filter('block_categories', 'jtsgrounds_custom_block_category', 10, 2);
function jtsgrounds_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      'slug' => 'custom-blocks',
      'title' => esc_html('Custom Blocks', 'jtsgrounds'),
      'icon' => 'wordpress'
    )
  );
}

add_action('acf/init', 'jtsgrounds_register_blocks');
function jtsgrounds_register_blocks(){
  if(function_exists('acf_register_block_type')){
    
  }
}