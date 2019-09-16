<header class="header">
  <div class="constraint">
    <?php if (is_front_page()): ?>
      <strong class="header__title">Apartheid No!</strong>
    <?php else: ?>
      <a href="<?php echo home_url(); ?>" class="header__title">Apartheid No!</a>
    <?php endif; ?>

    <div class="header__navigation-container">
      <?php get_component('navigation/navigation', [
          'title' => 'Kapitel',
          'type' => 'chapters',
          'items' => array_map(
              function ($item) {
                  return $item->to_array();
              },
              get_posts([
                  'post_type' => 'chapters'
              ])
          )
      ]); ?>

      <?php get_component('navigation/navigation', [
          'title' => 'Hintergründe',
          'type' => 'background',
          'items' => array_map(
              function ($item) {
                  return $item->to_array();
              },
              get_posts([
                  'post_type' => 'background'
              ])
          )
      ]); ?>
    </div>

  </div>
</header>
