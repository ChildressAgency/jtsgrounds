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

      <div class="copyright">
        <p>&copy;<?php echo date('Y'); ?> <?php echo esc_html(blogingo('name')); ?></p>
        <p>website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a></p>
      </div>
    </div>
  </footer>

  <div id="gallery-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="job-title" class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <img src="" id="gallery-image" class="img-fluid d-block mx-auto" alt="" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-main" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>