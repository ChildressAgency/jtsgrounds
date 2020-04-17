<?php get_header(); ?>
  <main id="main">
    <section id="testimonials">
      <div class="container">
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>

        <?php if(have_rows('testimonials')): ?>
          <div class="testimonials swiper-container">
            <div class="swiper-wrapper">
              <?php while(have_rows('testimonials')): the_row(); ?>
                <div class="testimonial swiper-slide">
                  <div class="testimonial-inner">
                    <?php 
                      $star_review = get_sub_field('star_review');
                      if($star_review): ?>
                        <span class="star-rating <?php echo esc_attr($star_review); ?>"></span>
                      <?php endif; ?>
                    <blockquote>
                      <?php the_sub_field('testimonial'); ?>
                      <footer>
                        <cite>&mdash; <?php the_sub_field('testimonial_author'); ?></cite>
                        <p class="date"><?php the_sub_field('testimonial_date'); ?></p>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section id="leave-a-review">
      <div class="container">
        <h3>Leave Us A Review</h3>
        <?php echo do_shortcode(get_field('leave_a_review_form_shortcode')); ?>
      </div>
    </section>
  </main>
<?php get_footer();