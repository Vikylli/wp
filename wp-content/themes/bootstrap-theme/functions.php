<?php

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_image_size('portfolio-thumb', 1200, 900, true);
});


add_action('init', function () {
    register_post_type('portfolio', [
        'labels' => [
            'name'          => 'Портфолио',
            'singular_name' => 'Работа',
            'add_new'       => 'Добавить работу',
            'add_new_item'  => 'Добавить работу',
            'edit_item'     => 'Редактировать',
            'new_item'      => 'Новая работа',
            'view_item'     => 'Просмотреть',
            'search_items'  => 'Искать работы',
            'not_found'     => 'Работы не найдены',
            'all_items'     => 'Все работы',
            'menu_name'     => 'Портфолио',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'portfolio'], 
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);
});


add_action('pre_get_posts', function ($q) {
    if (!is_admin() && $q->is_main_query() && is_post_type_archive('portfolio')) {
        $q->set('posts_per_page', 12);
    }
});