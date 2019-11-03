<?php
$chapter_number = intval(get_field('chapter_number'));
$next = get_posts([
  'post_type' => 'chapters',
  'meta_query' => [
    [
      'key' => 'chapter_number',
      'value' => $chapter_number + 1
    ]
  ]
]);

$summary = get_field('summary');
?>

<?php if ($next): ?>
  <section class="next full-bleed full-bleed--fill-red">
    <div class="constraint">

      <?php if ($summary): ?>
        <em class="excerpt excerpt--is-inverted"><?php echo $summary; ?></em>
      <?php endif; ?>

      <a href="<?php echo get_the_permalink(
          $next[0]->ID
      ); ?>" class="next__link next__link--next">
      <small class="next__link-label">Nächstes Kapitel lesen:</small>
      <?php echo $next[0]->post_title; ?>
    </a>
    </div>
  </section>
<?php endif; ?>
