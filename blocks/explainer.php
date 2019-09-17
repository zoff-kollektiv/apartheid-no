<?php
$term = get_field('term');
$intro = get_field('intro');
?>


<details class="explainer">
  <summary class="explainer__summary">
    <div class="constraint">
      <em class="explainer__term"><?php echo $term; ?>,</em>
      <p class="explainer__intro"><?php echo $intro; ?></p>
    </div>
  </summary>

  <?php while (have_rows('explanation')):
      the_row(); ?>
    <?php if (get_row_layout() == 'text'): ?>
      <div class="constraint">
        <div class="paragraph">
          <?php echo get_sub_field('text'); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (get_row_layout() == 'image'):
        $image = get_sub_field('image'); ?>
      <div class="constraint">
        <figure class="figure">
          <?php echo wp_get_attachment_image($image['ID'], 'image', null, [
              'class' => 'figure__media'
          ]); ?>

          <figcaption class="figure__caption-container">
            <?php if ($image['title']): ?>
              <strong class="figure__title">
                <?php echo $image['title']; ?>
              </strong>
            <?php endif; ?>

            <?php if ($image['description']): ?>
              <p class="figure__description">
                <?php echo $image['description']; ?>
              </p>
            <?php endif; ?>

            <?php if ($image['caption']): ?>
              <small class="figure__caption">
                <?php echo $image['caption']; ?>
              </small>
            <?php endif; ?>
          </figcaption>
        </figure>
      </div>
    <?php
    endif; ?>
  <?php
  endwhile; ?>
</details>
