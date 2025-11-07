

<a href="http://localhost/zadanie/">zadanie</a>
<?php get_header(); ?>

<?php 

get_search_form();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
?>

    <article class="single-post">
        
        <a class="post-title" href="<?php get_permalink(); ?>" ><?php the_title(); ?></a>   <!-- Выводит на экран заголовок записи. Принято использовать внутри цикла. -->

        
        <div class="post-meta">
            <div class="author-avatar">
                <?php 
                    // Функция get_avatar() возвращает HTML картинки, поэтому используем echo
                    echo get_avatar( get_the_author_meta('ID'), 96 ); 
                ?>
            </div>
            <div class="author-info">
                <span class="author-name">
                    Автор: <?php the_author(); ?> <!--Выводит имя автора поста. -->
                </span>
                <br>
                <span class="post-date">
                    Опубликовано: <?php the_date(); ?>  <!-- Выводит на экран или получает дату публикации поста или группы постов (опубликованные в один день). Используется в цикле WordPress. -->
                </span>
            </div>

            <div class="authors-list-container">
    <h2>Наши авторы</h2>
    <ul class="authors-list">
        <?php
        // Аргументы для получения пользователей с ролью 'author'
        $args = array(
            'role'    => 'author',
            'orderby' => 'display_name',
            'order'   => 'ASC'
        );
        $authors = get_users( $args );

        // Цикл для вывода каждого автора
        foreach ( $authors as $author ) {
            $author_url = get_author_posts_url( $author->ID );
            echo '<li>';
            echo '<a href="' . esc_url( $author_url ) . '">';
            // Выводим аватар автора
            echo get_avatar( $author->ID, 64 ); 
            echo '<span>' . esc_html( $author->display_name ) . '</span>';
            echo '</a>';
            echo '</li>';
        }
        ?>
    </ul>
</div>
        </div>

                
                <div class="post-content">
                    <?php the_content(); ?><!-- Выводит контент текущего поста (записи). -->
                </div>
            </article>

        <?php 
            endwhile;
        endif; 
        ?>

        <?php get_footer(); ?>