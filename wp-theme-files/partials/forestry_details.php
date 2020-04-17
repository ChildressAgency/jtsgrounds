<section id="forestry-details">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <article data-aos="fade-right" data-aos-easing="ease-out" data-aos-delay="500">
          <?php the_field('forestry_details_left_side'); ?>
        </article>
      </div>
      <div class="col-lg-4">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mulching-machine.png" class="img-fluid d-block mulching-image" alt="" />
      </div>
      <div class="col-lg-4">
        <article data-aos="fade-left" data-aos-easing="ease-out" data-aos-delay="500">
          <?php the_field('forestry_details_right_side'); ?>
        </article>
      </div>
    </div>
  </div>
</section>
