<?php get_header(); ?>
<main id="main">
  <section class="main-content">
    <div class="container">
      <article class="section-content">
        <?php
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>
      </article>
    </div>
  </section>
</main>
<?php get_footer();