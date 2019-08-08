<main class="content">
  <section class="hero">
    <div class="constraint">
      <h1 class="hero__title">
        <?php the_title(); ?>
      </h1>
    </div>
  </section>

  <div class="full-bleed full-bleed--fill-blue">
    <div class="constraint">
      <em class="excerpt">
        <?php echo get_the_excerpt(); ?>
      </em>
    </div>
  </div>

  <?php the_content(); ?>
</main>
