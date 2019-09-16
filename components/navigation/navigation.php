<details class="navigation">
  <summary class="navigation__summary">
    <?php echo $title; ?>
  </summary>

  <ul class="navigation__menu">
    <?php if (isset($items) && sizeof($items) > 0): ?>
      <?php foreach ($items as $item): ?>
        <li>
          <a href="<?php echo get_the_permalink($item['ID']); ?>">
            <?php echo $item['post_title']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</details>
