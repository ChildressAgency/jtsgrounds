<?php get_header(); ?>
<main id="main">
  <section id="about-mission">
    <div class="container">
      <?php get_template_part('partials', 'background_word'); ?>
      <div class="row">
        <div class="col-lg-7">
          <article class="section-content" data-aos="fade-right" data-aos-easing="ease-out" data-aos-delay="750">
            <?php the_field('first_section_left_side'); ?>
          </article>
        </div>
        <div class="col-lg-5">
          <?php
            if(have_rows('first_section_right_side')){
              while(have_rows('first_section_right_side')){
                the_row();

                switch(get_row_layout()){
                  case 'image':

                    echo '<div class="img-with-block-shadow" data-aos="fade-in">';
                    $image = get_sub_field('image');
                    echo '<img src="' . esc_url($image['url']) . '" class="img-fluid d-block" alt="' . esc_attr($image['alt'])  .'" data-aos="zoom-in" data-aos-easing="ease-out" data-aos-delay="500" />';
                    echo '</div>';

                  break;
                  case 'video':

                    echo '<div class="embed-responsive embed-responsive-16by9">';
                    $iframe = get_sub_field('video');
                    $iframe = str_replace('></iframe>', ' class="embed-responsive-item"></iframe>', $iframe);
                    echo $iframe;
                    echo '</div>';

                  break;
                  case 'before-after':

                    $before_image = get_sub_field('before_image');
                    $after_image = get_sub_field('after_image');

                    echo '<div class="row">';
                      echo '<div class="col-md-6"><h4 class="text-center">Before</h4>';
                        echo '<img src="' . esc_url($before_image['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($before_image['alt']) . '" />';
                      echo '</div><div class="col-md-6"><h4 class="text-center">After</h4>';
                        echo '<img src="' . esc_url($after_image['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($after_image['alt']) . '" />';
                    echo '</div></div>';

                  break;
                }
              }
            }
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php if(is_page('forestry-mulching')){ get_template_part('partials', 'forestry_details'); } ?>

  <?php 
    $additional_content = get_field('additional_content_section'); 
    if($additional_content): ?>
      <section id="more-content">
        <div class="container">
          <article data-aos="fade-in" data-aos-easing="ease-out">
            <?php echo apply_filters('the_content', $additional_content); ?>
          </article>
        </div>
      </section>
  <?php endif; ?>

  <?php get_template_part('partials/section', 'gallery'); ?>

  <?php if(is_page('landscaping-services')){ get_template_part('partials', 'landscaping_services'); } ?>
</main>
<?php get_footer();