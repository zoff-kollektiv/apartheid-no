<header class="header">
  <div class="constraint">
    <?php if (is_front_page()): ?>
      <strong class="header__title">Apartheid No!</strong>
    <?php else: ?>
      <a href="<?php echo home_url(); ?>" class="header__title">Apartheid No!</a>
    <?php endif; ?>

    <?php get_component('navigation/navigation', [
        'title' => 'Kapitel',
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
</header>
