<section id="gallery">
  <div class="container">
    <header>
      <?php
        $gallery_title = get_field('gallery_title');
        if($gallery_title): ?>
          <h2 data-aos="fade-in" data-aos-easing="ease-out"><?php echo esc_html($gallery_title); ?></h2>
      <?php endif; ?>
      <?php
        $gallery_description = get_field('gallery_description');
        if($gallery_description): ?>
          <p data-aos="fade-in" data-aos-easing="ease-out" data-aos-delay='500'><?php echo esc_html($gallery_description); ?></p>
      <?php endif; ?>
    </header>
  </div>

  <div class="gallery">
    <?php if(have_rows('gallery_images')): while(have_rows('gallery_images')): the_row(); ?>

      <?php
        $gallery_image = get_field('gallery_image');
        $gallery_image_title = get_field('gallery_image_title');
        $gallery_image_description = get_field('gallery_image_description');
      ?>
      <a href="<?php echo esc_url($gallery_image['url']); ?>" class="gallery-item" data-toggle="modal" data-target="#gallery-modal" data-jts_full_size="<?php echo esc_attr($gallery_image['url']); ?>" data-jts_job_title="<?php echo esc_attr($gallery_image_title); ?>">
        <img src="<?php echo esc_url($gallery_image['sizes']['medium']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($gallery_image['alt']); ?>" />
        <div class="gallery-item-caption">
          <h4><?php echo esc_html($gallery_image_title); ?></h4>
          <p><?php echo esc_html($gallery_image_description); ?></p>
        </div>
      </a>

    <?php endwhile; endif; ?>

  </div>
</section>