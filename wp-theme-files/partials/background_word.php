<?php
  $bg_word = get_field('background_word');
  if($bg_word): ?>
    <div class="bg-text">
      <span><?php echo esc_html($bg_word); ?></span>
    </div>
<?php endif; ?>
