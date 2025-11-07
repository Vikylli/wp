<?php

function x_ctx_title($title) {
    $result='Не определено';
    if (is_archive()) {
        $result='Архивная страница:' . $title; 
    }

    if (is_search()) {
        $result='Cтраница поиска:' . $title;
    }

    if (is_single()) {
        $result='Страница поста:' . $title;
    }

    if (is_page()) {
        $result='Страница:' . $title;
    }

    if (is_404()) {
        $result='Cтраница не найдена:' . $title; 
    }

    if (is_home() || is_front_page()) {
        $result='Главная' . $title; 
    } return $result; 
}

add_filter('my_filter', 'x_ctx_title');


function my_theme_register_author_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Сайдбар: Посты автора', 'your-theme-textdomain' ),
        'id'            => 'author-posts-sidebar',
        'description'   => __( 'Этот сайдбар отображается на странице автора слева.', 'your-theme-textdomain' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Сайдбар: Категории автора', 'your-theme-textdomain' ),
        'id'            => 'author-categories-sidebar',
        'description'   => __( 'Этот сайдбар отображается на странице автора справа.', 'your-theme-textdomain' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_theme_register_author_sidebars' );