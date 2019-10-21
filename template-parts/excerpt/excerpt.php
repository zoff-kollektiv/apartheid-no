<?php
$caption = get_the_post_thumbnail_caption(); ?>

<div class="full-bleed full-bleed--fill-blue full-bleed--with-margin-bottom">
  <div class="constraint">
    <em class="excerpt excerpt--is-inverted">
      <?php echo get_the_excerpt(); ?>
    </em>

    <?php if ($caption): ?>
      <small class="excerpt__featured-image-caption">
        <?php echo $caption; ?>
      </small>
    <?php endif; ?>
  </div>
</div>
