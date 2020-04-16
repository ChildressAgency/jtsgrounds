<?php get_header(); ?>
  <main id="main">
    <section id="mission">
      <div class="container-fluid">
        <?php
          $bg_word = get_field('background_word');
          if($bg_word): ?>
            <div class="bg-text">
              <span><?php echo esc_html($bg_word); ?></span>
            </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <article class="section-content" data-aos="fade-right" data-aos-easing="ease-out" data-aos-delay="750">
              <header>
                <h2><?php the_field('first_section_title'); ?></h2>
                <p class="slogan"><?php the_field('first_section_subtitle'); ?></p>
              </header>
              <?php the_field('first_section_content'); ?>
              <?php
                $first_section_button = get_field('first_section_button');
                if($first_section_button): ?>
                  <a href="<?php echo esc_url($first_section_button['url']); ?>" class="btn-main btn-grow"><?php echo esc_html($first_section_button['title']); ?></a>
              <?php endif; ?>
            </article>
          </div>  
          <div class="col-md-6">
            <?php
              $first_section_image = get_field('first_section_image');
              if($first_section_image): ?>
                <img src="<?php echo esc_url($first_section_image['url']); ?>" class="img-fluid d-block mx-auto mission-img" alt="<?php echo esc_attr($first_section_image['alt']); ?>" data-aos="slide-left" data-aos-easing="ease-out" />
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section id="our-team">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7">
            <?php 
              $second_section_image = get_field('second_section_image');
              if($second_section_image): ?>
                <img src="<?php echo esc_url($second_section_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($second_section_image['alt']); ?>" />
            <?php endif; ?>
          </div>
          <div class="col-lg-5">
            <?php the_field('second_section_content'); ?>
            <?php
              $second_section_button = get_field('second_section_button');
              if($second_section_button): ?>
                <a href="<?php echo esc_url($second_section_button['url']); ?>" class="btn-main btn-grow"><?php echo esc_html($second_section_button['title']); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/section', 'services'); ?>

    <?php get_template_part('partials/section', 'gallery'); ?>

    <?php
      $quality_section_content = get_field('quality_section_content');
      $quality_section_button = get_field('quality_section_button');
      if($quality_section_content): ?>
        <section id="quality">
          <div class="row no-gutters">
            <div class="col-lg-7 text-side">
              <div class="quality-article">
                <?php echo apply_filters('the_content', $quality_section_content); ?>
                <?php if($quality_section_button): ?>
                  <a href="<?php echo esc_url($quality_section_button['url']); ?>" class="btn-main btn-grow"><?php echo esc_html($quality_section_button['title']); ?></a>
                <?php endif; ?>
              </div>
            </div>
            <?php 
              $quality_section_image = get_field('quality_section_image');
              if($quality_section_image): ?>
                <div class="col-lg-5 image-side" style="background-image:url(<?php echo esc_url($quality_section_image['url']); ?>);"></div>
            <?php endif; ?>
          </div>
        </section>
    <?php endif; ?>
  </main>
<?php get_footer();