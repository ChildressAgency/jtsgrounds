<?php 
$services_page = get_page_by_path('services');
$services_page_id = $services_page->ID;

if(have_rows('services', $services_page_id)): ?>
  <section id="services">
    <div class="row no-gutters">
      <div class="col-md-6 services-left-side"></div>
      <div class="col-md-6 services-right-side"></div>
    </div>
    <div id="services-bubbles" class="white-shadow-inner">
      <div class="container">
        <h2>OUR SERVICES</h2>
        <?php $s = 1; while(have_rows('services', $services_page_id)): the_row(); ?>

          <?php
            $service_title = get_sub_field('service_title');
            $service_link = get_sub_field('service_link');
            $service_image = get_sub_field('service_image');
          ?>
          <a href="<?php echo esc_url($service_link['url']); ?>" id="bubble-<?php echo $s; ?>" class="service-bubble" style="background-image: url(<?php echo esc_url($service_image['sizes']['medium']); ?>);">
            <div class="bubble-inner">
              <h3><?php echo esc_html($service_title); ?></h3>
            </div>
          </a>

        <?php $s++; endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>