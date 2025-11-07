<?php 
/*
Template Name: Search_page
*/


global $query_string; // получение строк запроса вида GET

if (isset($query_string)){
    wp_parse_str( $query_string, $search_query ); // парсинг строки запроса в переменную search_query  
    $search_query['post_type'] = 'post'; // указание типа запроса  
    $search = new WP_Query( $search_query ); // запуск запроса  
    $wp_query = $search; // присвоение нового запроса стандартному  
}

?>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php get_search_form(); // подключаем searchform.php ?>

        <?php if ( have_posts() ) : ?>
            <h2>Результаты поиска:</h2>
            <ul>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php the_excerpt(); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>Ничего не найдено. Попробуйте другой запрос.</p>
        <?php endif; ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>