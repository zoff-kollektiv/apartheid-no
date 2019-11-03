<?php
$image = get_field('image');
$image_src = wp_get_attachment_image_src($image['ID'], 'image', false);
$image_classname = '';

// if image is landscape, add columnized class
if ($image_src[1] > $image_src[2]) {
  $image_classname = 'figure--is-columnized';
}
?>

<div class="full-bleed full-bleed--with-margin">
  <div class="constraint">
    <figure class="figure <?php echo $image_classname; ?>">
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
</div>
