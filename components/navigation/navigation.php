<?php

$active_class = '';

if ($is_active) {
    $active_class = 'navigation--is-active';
}
?>

<details class="navigation navigation--theme-<?php echo $type; ?> <?php echo $active_class; ?>">
  <summary class="navigation__summary">
    <span class="navigation__summary-text"><?php echo $title; ?></span>
  </summary>

  <ul class="navigation__menu">
    <?php if (isset($items) && sizeof($items) > 0): ?>
      <?php foreach ($items as $item):
          $chapter_number = get_field('chapter_number', $item['ID']); ?>
        <li>
          <a href="<?php echo get_the_permalink($item['ID']); ?>">
            <?php if (
                $chapter_number &&
                $chapter_number !== 0 &&
                $chapter_number !== '99'
            ): ?>
              <?php echo $chapter_number; ?>&nbsp;-&nbsp;
            <?php endif; ?>
            <?php echo $item['post_title']; ?>
          </a>
        </li>
      <?php
      endforeach; ?>
    <?php endif; ?>
  </ul>
</details>
