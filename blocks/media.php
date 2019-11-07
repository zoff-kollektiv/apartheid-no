<?php
$background_color = get_field('background_color');
$media_count = 1;

// Handle legacy media blocks
if ($background_color === 'blue') {
    $background_color = 'red';
}
?>

<?php if (have_rows('media')): ?>
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
            <?php echo wp_get_attachment_image($image_id, 'media', null, [
                'class' => 'figure__media'
            ]); ?>

            <?php if (
                $image->post_title ||
                $image->post_content ||
                $image->post_excerpt
            ): ?>
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
            <?php endif; ?>
        </figure>

        <?php
            endif;

            if (get_row_layout() == 'video'): ?>

        <figure class="figure <?php if ($media_count % 2 == 0):
            echo 'figure--is-reversed';
        endif; ?>">
            <?php
            $video_title = get_sub_field('title');
            $video_description = get_sub_field('description');
            $video_caption = get_sub_field('caption');

            get_component('video/video', [
                'image_id' => get_sub_field('preview_image'),
                'quote' => get_sub_field('quote'),
                'length' => get_sub_field('length'),
                'url' => get_sub_field('vimeo_url')
            ]);
            ?>

            <?php if ($video_title || $video_description || $video_caption): ?>
              <figcaption class="figure__caption-container">
                <?php if ($video_title): ?>
                  <strong class="figure__title">
                    <?php echo $video_title; ?>
                  </strong>
                <?php endif; ?>

                <?php if ($video_description): ?>
                  <div class="figure__description">
                    <?php echo $video_description; ?>
                  </div>
                <?php endif; ?>

                <?php if ($video_caption): ?>
                  <small class="figure__caption">
                    <?php echo $video_caption; ?>
                  </small>
                <?php endif; ?>
              </figcaption>
            <?php endif; ?>
        </figure>

        <?php endif;

            $media_count++;
        endwhile; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
