<a href="<?php echo $url; ?>" class="video">
  <?php echo wp_get_attachment_image($image_id, 'full', null, [
      'class' => 'video__preview-image'
  ]); ?>

  <div class="video__content">
    <span class="video__length">
      <svg aria-hidden="true" focusable="false" class="video__play-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z"></path>
      </svg>

      <?php echo $length; ?>
    </span>

    <blockquote class="video__quote">
      <?php echo $quote; ?>
    </blockquote>
  </div>

  <iframe width="560"
          height="315"
          src="<?php echo $url; ?>"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
</a>