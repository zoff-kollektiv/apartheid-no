<?php get_header(); ?>

<div class="site">
  <?php get_template_part('template-parts/header/header'); ?>

  <main class="content">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/title/title');
            get_template_part('template-parts/excerpt/excerpt', 'transparent');
            get_template_part('template-parts/content/content');
            get_template_part('template-parts/continue/referer');
        }
    } ?>
  </main>

  <?php get_footer(); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
