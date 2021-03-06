<?php

$BLOCKS = [
    [
        'name' => 'image',
        'title' => __('Image'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'format-image',
        'keywords' => array('image'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ],

    [
        'name' => 'media',
        'title' => __('Media'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'admin-media',
        'keywords' => array('media'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ],

    [
        'name' => 'poster',
        'title' => __('Poster'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'welcome-comments',
        'keywords' => array('poster'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ],

    [
        'name' => 'fullscreen-video',
        'title' => __('Fullscreen Video'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'video-alt',
        'keywords' => array('video'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ],

    [
        'name' => 'background-reference',
        'title' => __('Background'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'format-status',
        'keywords' => array('background'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ],

    [
        'name' => 'explainer',
        'title' => __('Explainer'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'sort',
        'keywords' => array('explainer'),
        'post_types' => array('chapters', 'background'),
        'mode' => 'auto',
        'supports' => array(
            'align' => false
        )
    ]
];

function acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);

    if (file_exists(get_theme_file_path("blocks/{$slug}.php"))) {
        include get_theme_file_path("blocks/{$slug}.php");
    }
}

function acf_init_blocks()
{
    global $BLOCKS;

    if (function_exists('acf_register_block_type')) {
        foreach ($BLOCKS as $block) {
            acf_register_block_type($block);
        }
    }
}

function allowed_block_types($allowed_blocks)
{
    global $BLOCKS;

    $acf_blocks = array_map(function ($block) {
        return "acf/{$block['name']}";
    }, $BLOCKS);

    $allowed_core_blocks = ['core/heading', 'core/paragraph', 'core/list'];

    return array_merge($acf_blocks, $allowed_core_blocks);
}

function register_post_types()
{
    register_post_type('chapters', array(
        'labels' => array(
            'name' => 'Chapters',
            'singular_name' => 'Chapter'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'kapitel'
        ),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-media-document',
        'show_in_nav_menus' => true,
        'supports' => array(
            'title',
            'excerpt',
            'editor',
            'thumbnail',
            'revisions'
        )
    ));

    register_post_type('background', array(
        'labels' => array(
            'name' => 'Background',
            'singular_name' => 'Background'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'hintergrund'
        ),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-media-text',
        'supports' => array('title', 'excerpt', 'editor', 'revisions')
    ));
}

function cleanup_admin()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}

function register_menus()
{
    register_nav_menus(array(
        'header' => __('Header'),
        'footer' => __('Footer')
    ));
}

function overwrite_core_blocks()
{
    register_block_type('core/paragraph', array(
        'render_callback' => function ($attributes, $content) {
            return '<div class="constraint">
          <div class="paragraph">' .
                $content .
                '</div>
        </div>';
        }
    ));

    register_block_type('core/heading', array(
        'render_callback' => function ($attributes, $content) {
            return '<div class="constraint">
          <div class="heading">' .
                $content .
                '</div>
        </div>';
        }
    ));

    register_block_type('core/list', array(
        'render_callback' => function ($attributes, $content) {
            return '<div class="constraint">
          <div class="list">' .
                $content .
                '</div>
        </div>';
        }
    ));
}

function get_component($path, array $params = [])
{
    extract($params, EXTR_SKIP);
    require get_template_directory() . '/components/' . $path . '.php';
}

function init_javascript()
{
    if (!is_admin()) {
        wp_enqueue_script(
            'main',
            get_bloginfo('template_url') . '/dist/index.js',
            [],
            '1.0',
            true
        );
    }
}

add_image_size('hero', 1280, 0, false);
add_image_size('media', 700, 0, false);
add_image_size('poster', 400, 0, false);
add_image_size('image', 850, 0, false);

add_theme_support('post-thumbnails');
add_action('init', 'register_post_types');
add_action('init', 'register_menus');
add_action('admin_menu', 'cleanup_admin');
add_action('acf/init', 'acf_init_blocks');
add_action('init', 'overwrite_core_blocks');
add_filter('allowed_block_types', 'allowed_block_types');
add_action('wp_enqueue_scripts', 'init_javascript');
?>
