<?php
$modifier = '';
$chapter_number = get_field('chapter_number');

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
        <?php if (
            $chapter_number &&
            $chapter_number !== 0 &&
            $chapter_number !== 99
        ): ?>
          <small class="hero__chapter">Kapitel <?php echo $chapter_number; ?></small>
        <?php endif; ?>
        <?php the_title(); ?>
      <?php endif; ?>
    </h1>
  </div>
</section>
