<div class="constraint">
  <figure class="figure">
    <?php
      $image = get_field('image');

      echo wp_get_attachment_image($image['ID'], 'full', [
        'class' => 'figure__image'
      ]);
    ?>

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
