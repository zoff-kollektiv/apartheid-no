<?php if (has_excerpt()): ?>
  <div class="full-bleed full-bleed--fill-blue full-bleed--with-margin-bottom">
    <div class="constraint">
      <em class="excerpt">
        <?php the_excerpt(); ?>
      </em>
    </div>
  </div>
<?php endif; ?>
