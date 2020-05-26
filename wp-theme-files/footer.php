  <footer id="footer">
    <div class="container-fluid">
      <nav class="navbar<?php if(!is_front_page()){ echo ' top-border'; } ?>">
        <a href="<?php echo esc_url(home_url()); ?>" class="footer-logo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-fluid d-block" alt="<?php echo esc_attr(bloginfo('name')); ?> Logo" />
        </a>

        <?php
          $footer_nav_args = array(
            'theme_location' => 'footer-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'footer-nav',
            'container_class' => '',
            'menu_id' => '',
            'menu_class' => 'navbar-nav',
            'echo' => true,
            'fallback_cb' => 'jtsgrounds_footer_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$S">%3</ul>',
            'depth' => 1,
          );
          wp_nav_menu($footer_nav_args);
        ?>

        <?php
          $facebook = get_field('facebook', 'option');
          $twitter = get_field('twitter', 'option');
          $instagram = get_field('instagram', 'option');
          $youtube = get_field('youtube', 'option');
        ?>
        <div class="footer-social">
          <?php if($facebook): ?>
            <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook" target="_blank">
              <svg class="social-icon">
                <use xlink:href="#icon-facebook" />
              </svg>
            </a>
          <?php endif; if($youtube): ?>
            <a href="<?php echo esc_url($youtube); ?>" id="youtube" aria-label="YouTube" target="_blank">
              <svg class="social-icon">
                <use xlink:href="#icon-youtube" />
              </svg>
            </a>
          <?php endif; if($instagram): ?>
            <a href="<?php echo esc_url($instagram); ?>" id="instagram" aria-label="Instagram" target="_blank">
              <svg class="social-icon">
                <use xlink:href="#icon-instagram" />
              </svg>
            </a>
          <?php endif; if($twitter): ?>
            <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter" target="_blank">
              <svg class="social-icon">
                <use xlink:href="#icon-twitter" />
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </nav>

      <?php
        $loc_phone = get_field('phone_number', 'option');
        $loc_email = get_field('email', 'option');
        $loc_address = get_field('address', 'option');
        $loc_city = get_field('city', 'option');
        $loc_state = get_field('state', 'option');
        $loc_zip = get_field('zip', 'option');
       ?>
      <div class="location" itemscope itemtype="https://schema.org/LocalBusiness">
        <p class="location-name"><span itemprop="name"><?php echo esc_html(bloginfo('name')); ?></span></p>
        <p class="location-phone">
          <a href="<?php echo esc_url('tel:' . $loc_phone); ?>"><span itemprop="telephone"><?php echo esc_html($loc_phone); ?></span>
          </a>
        </p>
        <?php if($loc_email): ?>
          <p class="location-email">
            <a href="<?php echo esc_url('mailto:' . $loc_email); ?>"><span itemprop="email"><?php echo esc_html($loc_email); ?></span>
            </a>
          </p>
        <?php endif; ?>
        <p class="location-address"><span itemprop="streetAddress"><?php echo esc_html($loc_address); ?></span><br /><span itemprop="addressLocality"><?php echo esc_html($loc_city); ?></span>,&nbsp;<span itemprop="addressRegion"><?php echo esc_html($loc_state); ?></span>&nbsp;<span itemprop="postalCode"><?php echo esc_html($loc_zip); ?></span></p>
        <p>
      </div>

      <div class="copyright">
        <p>&copy;<?php echo date('Y'); ?> <?php echo esc_html(bloginfo('name')); ?></p>
        <p>website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a></p>
      </div>
    </div>
  </footer>

  <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>