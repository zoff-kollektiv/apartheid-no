<?php
  $background_id = get_field('background_page');

  $link = get_permalink($background_id);
?>

<div class="full-bleed">
  <div class="background-reference">
    <div class="constraint">
      <h3 class="background-reference__title">
        <small class="background-reference__label">Hintergrund</small>
        <a href="<?php echo $link; ?>" class="title title--is-small">
          <span class="title__inner">
            <?php echo get_the_title($background_id); ?>
          </span>
        </a>
      </h3>

      <div class="paragraph">
        <p>
          <?php echo get_the_excerpt($background_id); ?>
        </p>
      </div>

      <a href="<?php echo $link; ?>" class="background-reference__link" rel="nofollow">
        Weiter lesen auf Hintergrundseite
      </a>
    </div>
  </div>
</div>
