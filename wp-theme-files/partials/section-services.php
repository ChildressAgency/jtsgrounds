<?php if(have_rows('services')): ?>
  <section id="services">
    <div class="row no-gutters">
      <div class="col-md-6 services-left-side"></div>
      <div class="col-md-6 services-right-side"></div>
    </div>
    <div id="services-bubbles" class="white-shadow-inner">
      <div class="container">
        <h2>OUR SERVICES</h2>
        <?php $s = 1; while(have_rows('services')): the_row(); ?>

          <?php
            $service_title = get_sub_field('service_title');
            $service_link = get_sub_field('service_link');
            $service_image = get_sub_field('service_image');
          ?>
          <a href="<?php echo esc_url($service_link['url']); ?>" id="bubble-<?php echo $s; ?>" class="service-bubble" style="background-image: url(<?php echo esc_url($service_image['url']); ?>);">
            <div class="bubble-inner">
              <h3><?php echo esc_html($service_title); ?></h3>
            </div>
          </a>

        <?php $s++; endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>