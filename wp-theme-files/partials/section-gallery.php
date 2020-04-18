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

  <?php
    $images = get_field('portfolio_gallery');
    if($images): ?>
      <div id="portfolio-gallery" class="gallery" data-toggle="modal" data-target="#gallery-modal">
        <?php $i = 0; foreach($images as $image): ?>

          <a href="<?php echo esc_url($image['url']); ?>" class="gallery-item" data-target="#gallery-carousel" data-slide-to="<?php echo $i; ?>">
            <img src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" class="img-block d-block" alt="<?php echo esc_attr($image['alt']); ?>" />
            <div class="gallery-item-caption">
              <h4><?php echo esc_html($image['title']); ?></h4>
              <p><?php echo esc_html($image['caption']); ?></p>
              <span class="plus">+</span>
            </div>
          </a>

        <?php $i++; endforeach; ?>
      </div>
  <?php endif; ?>
</section>

<div id="gallery-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="job-title" class="modal-title"><?php echo esc_html($gallery_title); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <?php if($images): ?>
          <div id="gallery-carousel" class="carousel slide carousel-fade" data-ride="">
            <div class="carousel-inner">
              <?php $s = 0; foreach($images as $image): ?>

                <div class="carousel-item<?php if($s == 0){ echo ' active'; } ?>" data-image_title="<?php echo esc_attr($image['title']); ?>" data-image_caption="<?php echo esc_attr($image['caption']); ?>">
                  <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>

              <?php $s++; endforeach; ?>
            </div>

            <a href="#gallery-carousel" class="carousel-control-prev" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a href="#gallery-carousel" class="carousel-control-next" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <?php endif; ?>
      </div>

      <div class="modal-footer justify-content-between pt-0" style="color: #fff;"">
        <div class="slide-caption">
          <p id="image-title" class="mb-0"></p>
          <p id="image-caption" class="mb-0"></p>
        </div>
        <button type="button" class="btn-main" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>