<?php get_header(); ?>
<main id="main">
  <section id="about-mission">
    <div class="container">
      <article class="section-content" data-aos="fade-in" data-aos-easing="ease-out">
        <?php the_field('portfolio_intro'); ?>
      </article>
    </div>
  </section>

  <?php
    $portfolios = new WP_Query(array(
      'post_type' => 'portfolio',
      'posts_per_page' => -1,
      'post_status' => 'publish'
    ));

    if($portfolios->have_posts()): ?>
      <section id="gallery">
        <div class="gallery">
          <?php while($portfolios->have_posts()): $portfolios->the_post(); ?>

            <?php
              $portfolio_title = get_the_title();
              $portfolio_featured_image = get_field('portfolio_featured_image');
              $portfolio_link = get_the_permalink();
            ?>
            <a href="<?php echo esc_url($portfolio_link); ?>" class="gallery-item">
              <img src="<?php echo esc_url($portfolio_featured_image['sizes']['gallery-thumb']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($portfolio_featured_image['alt']); ?>" />
              <div class="gallery-item-caption">
                <h4><?php echo esc_html($portfolio_title); ?></h4>
              </div>
            </a>

          <?php endwhile; ?>
        </div>
      </section>
  <?php endif; ?>
</main>
<?php get_footer();