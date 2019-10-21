<?php
$caption = get_the_post_thumbnail_caption(); ?>

<div class="full-bleed full-bleed--fill-blue full-bleed--with-margin-bottom">
  <div class="constraint">
    <?php if (has_excerpt()): ?>
      <em class="excerpt excerpt--is-inverted">
        <?php the_excerpt(); ?>
      </em>
    <?php endif; ?>

    <?php if ($caption): ?>
      <small class="excerpt__featured-image-caption">
        <?php echo $caption; ?>
      </small>
    <?php endif; ?>
  </div>
</div>
