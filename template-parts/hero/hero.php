<section class="hero">
  <?php echo get_the_post_thumbnail(null, 'post-thumbnail', [
      'class' => 'hero__image'
  ]); ?>

  <div class="constraint">
    <h1 class="hero__title">
      <small class="hero__chapter">Kapitel 1</small>
      <?php the_title(); ?>
    </h1>
  </div>
</section>
