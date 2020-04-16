<?php
  $btn_link = get_field('button_link');
  if($btn_link): ?>
    <a href="<?php echo esc_url($btn_link['url']); ?>" class="btn-main btn-grow"><?php echo esc_html($btn_link['title']); ?></a>
<?php endif; ?>