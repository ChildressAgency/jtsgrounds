<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <?php 
      $phone = get_field('phone_number', 'option');
      if($phone): ?>
        <div id="masthead">
          <div class="container">
            <p class="call-us">Call us now <a href="<?php echo esc_url('tel:' . $phone); ?>"><?php echo esc_html($phone); ?></a></p>
          </div>
        </div>
    <?php endif; ?>

    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a href="<?php echo esc_url(home_url()); ?>" class="logo">
          <img src="<?php echo get_stylesheet_directory_url(); ?>/images/logo.png" class="img-fluid d-block" alt="<?php echo esc_attr(bloginfo('name')); ?> Logo" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav" aria-controls="header-nav" aria-expanded="false" aria-label="Toggle Navigation">
          <svg class="icon-bars">
            <use xlink:href="#icon-bars" />
          </svg>
        </button>

        <?php
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'header-nav',
            'container_class' => 'collapse navbar-collapse',
            'menu_id' => '',
            'menu_class' => 'navbar-nav ml-auto',
            'echo' => true,
            'fallback_cb' => 'jtsgrounds_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new WP_Bootstrap_Navwalker()
          );
          wp_nav_menu($header_nav_args);
        ?>
      </div>
    </nav>
  </header>

  <?php
    $hero_image = get_field('hero_image');
    $hero_image_css = get_field('hero_image_css');

    if(!$hero_image){
      $hero_image = get_field('hero_default_image', 'option');
      $hero_image_css = get_field('hero_default_image_css', 'option');
    }
  ?>
  <section id="hero" class="<?php if(is_front_page()){ echo ' hp-hero'; } ?>" style="background-image: url(<?php echo esc_url($hero_image); ?>); <?php echo esc_attr($hero_image_css); ?>>
    <div class="container">
      <div class="hero-caption" data-aos="fade-right" data-aos-easing="ease-out">
        <?php
          $hero_title = get_field('hero_title');
          if(!$hero_title){
            $hero_title = get_the_title(); 
          }
        ?>
        <h1><?php echo esc_html($hero_title); ?></h1>
        <?php the_field('hero_caption'); ?>
        <?php
          $hero_link = get_field('hero_link');
          if($hero_link): ?>
            <a href="<?php echo esc_url($hero_link['url']); ?>" class="btn-main btn-grow"><?php echo esc_html($hero_link['title']); ?></a>
        <?php endif; ?>
      </div>
    </div>

    <?php if(get_field('show_average_rating')): ?>
      <div class="customer-rating d-none d-sm-block" data-aos="fade-left" data-aos-easing="ease-out">
        <h4>9.5/10</h4>
        <span class="star-rating"></span>
        <p>Our average rating by customers</p>
      </div>
    <?php endif; ?>

    <a href="<?php echo esc_url('tel:' . $phone); ?>" class="hero-phone">
      <svg class="hero-phone-icon">
        <use xlink:href="#icon-phone" />
      </svg>
    </a>

    <div class="jts-overlay white-shadow-inner"></div>
  </section>
