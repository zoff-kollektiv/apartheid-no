<div class="full-bleed full-bleed--with-margin">
  <div class="constraint">
    <div class="poster">
      <?php
      $images_count = sizeof(get_field('images'));

      while (have_rows('images')):

          the_row();

          $poster_id = get_sub_field('poster');
          $poster = get_post($poster_id);
          ?>

        <figure class="figure figure--is-<?php if ($images_count == 1):
            echo 'reversed';
        else:
            echo 'columnized';
        endif; ?>">
          <?php echo wp_get_attachment_image($poster_id, 'poster', null, [
              'class' => 'figure__media',
              'loading' => 'lazy'
          ]); ?>

          <figcaption class="figure__caption-container">
            <?php if ($poster->post_title): ?>
              <strong class="figure__title">
                <?php echo $poster->post_title; ?>
              </strong>
            <?php endif; ?>

            <?php if ($poster->post_content): ?>
              <p class="figure__description">
                <?php echo $poster->post_content; ?>
              </p>
            <?php endif; ?>

            <?php if ($poster->post_excerpt): ?>
              <small class="figure__caption">
                <?php echo $poster->post_excerpt; ?>
              </small>
            <?php endif; ?>
          </figcaption>
        </figure>

      <?php
      endwhile;
      ?>

    </div>
  </div>
</div>
