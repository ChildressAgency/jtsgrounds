<?php get_header(); ?>
  <main id="main">
    <section id="about-mission">
      <div class="container">
        <?php
          $bg_word = get_field('background_word');
          if($bg_word): ?>
            <div class="bg-text">
              <span><?php echo esc_html($bg_word); ?></span>
            </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-lg-7">
            <article class="section-content" data-aos="fade-right" data-aos-easing="ease-out" data-aos-delay="750">
              <?php the_field('about_us_content'); ?>
            </article>
            <div class="stats">
              <div id="happy-customers" class="stat">
                <h4>
                  <span class="stat-number odometer" data-top_number="<?php echo esc_attr(get_field('happy_customers_stat')); ?>"></span>
                  <small>Happy <span>Customers</span></small>
                </h4>
              </div>
              <div id="completed-jobs" class="stat">
                <h4>
                  <span class="stat-number odometer" data-top_number="<?php echo esc_attr(get_field('completed_jobs_stat')); ?>"></span>
                  <small>Completed <span>Jobs</span></small>
                </h4>
              </div>
              <div id="years-in-business" class="stat">
                <h4>
                  <span class="stat-number odometer" data-top_number="<?php echo esc_attr(get_field('years_in_business')); ?>"></span>
                  <small>Years <span>In Business</span></small>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="img-with-block-shadow" data-aos="fade-in">
              <?php 
                $about_us_image = get_field('about_us_image');
                if($about_us_image): ?>
                  <img src="<?php echo esc_url($about_us_image['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($about_us_image['alt']); ?>" data-aos="fade-in" data-aos-easing="eas-out" data-aos-delay="500" />
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      $our_company_content = get_field('our_company_section_content');
      if($our_company_content): ?>
        <section id="our-company">
          <div class="row no-gutters">
            <?php $our_company_image = get_field('our_company_section_image'); ?>
            <div class="col-lg-5 image-side order-2 order-lg-1" style="background-image:url(<?php echo esc_url($our_company_image['url']); ?>);"></div>
            <div class="col-lg-7 text-side order-1 order-lg-2">
              <article class="section-content" data-aos="fade-left" data-aos-easing="ease-out">
                <?php echo apply_filters('the_content', $our_company_content); ?>
              </article>  
            </div>
          </div>
        </section>
    <?php endif; ?>

    <?php
      $our_team_content = get_field('our_team_section_content');
      if($our_team_content): ?>
        <section id="about-our-team">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <article class="section-content">
                  <?php echo apply_filters('the_content', $our_team_content); ?>
                  <blockquote>
                    <p>"Quote from a <strong>customer or an employee</strong> will go here."</p>
                  </blockquote>
                </article>
              </div>
              <div class="col-lg-6">
                <?php 
                  $our_team_image = get_field('our_team_section_image'); 
                  if($our_team_image): ?>
                    <img src="<?php echo esc_url($our_team_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($our_team_image['alt']); ?>" />
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
    <?php endif; ?>
  </main>
<?php get_footer();