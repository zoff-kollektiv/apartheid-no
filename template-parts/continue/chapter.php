<?php
$next = get_next_post();
$summary = get_field('summary');
?>

<?php if ($next): ?>
  <section class="next full-bleed full-bleed--fill-red">
    <div class="constraint">
      <?php if($summary): ?>
        <em class="excerpt excerpt--is-inverted"><?php echo $summary; ?></em>
      <?php endif; ?>

      <a href="<?php echo get_the_permalink($next->ID); ?>" class="next__link">
      <small class="next__link-label">Nächstes Kapitel lesen:</small>
      <?php echo $next->post_title; ?>
    </a>
    </div>
  </section>
<?php endif; ?>
