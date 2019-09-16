<?php
$background_color = get_field('background_color');
$media_count = 1;
?>

<div class="full-bleed full-bleed--with-margin full-bleed--fill-<?php echo $background_color; ?>">
  <div class="constraint constraint--wide">
    <div class="media">
      <?php while (have_rows('media')):
          the_row();

          if (get_row_layout() == 'image'):

              $image_id = get_sub_field('image');
              $image = get_post($image_id);
              ?>

        <figure class="figure <?php if ($media_count % 2 == 0):
            echo 'figure--is-reversed';
        endif; ?>">
          <?php echo wp_get_attachment_image($image_id, 'full'); ?>

          <figcaption class="figure__caption-container">
            <?php if ($image->post_title): ?>
              <strong class="figure__title">
                <?php echo $image->post_title; ?>
              </strong>
            <?php endif; ?>

            <?php if ($image->post_content): ?>
              <p class="figure__description">
                <?php echo $image->post_content; ?>
              </p>
            <?php endif; ?>

            <?php if ($image->post_excerpt): ?>
              <small class="figure__caption">
                <?php echo $image->post_excerpt; ?>
              </small>
            <?php endif; ?>
          </figcaption>
      </figure>

      <?php
          endif;

          $media_count++;
      endwhile; ?>
    </div>
  </div>
</div>
