<?php
$modifier = '';

if (is_front_page()) {
    $modifier = 'hero--is-centered';
}
?>

<section class="hero <?php echo $modifier; ?>">
  <?php echo get_the_post_thumbnail(null, 'hero', [
      'class' => 'hero__image'
  ]); ?>

  <div class="constraint">
    <h1 class="hero__title">
      <?php if (is_front_page()): ?>
        <?php echo get_bloginfo('name'); ?>
        <p class="hero__chapter-subline">
          <?php echo get_bloginfo('description'); ?>
        </p>
      <?php else: ?>
        <small class="hero__chapter">Kapitel <?php echo get_field('chapter_number'); ?></small>
        <?php the_title(); ?>
      <?php endif; ?>
    </h1>
  </div>
</section>
