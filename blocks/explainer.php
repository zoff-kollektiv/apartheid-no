<?php
$term = get_field('term');
$intro = get_field('intro');
?>

<div class="constraint">
  <details class="explainer">
    <summary class="explainer__summary">
      <em class="explainer__term"><?php echo $term; ?>,</em>
      <?php echo $intro; ?>
    </summary>
  </details>
</div>
