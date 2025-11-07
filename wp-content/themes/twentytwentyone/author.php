<?php
/**
 * Шаблон для вывода архива записей автора.
 */

get_header();

// Получаем объект текущего автора, чтобы использовать его данные по всей странице
$current_author = (isset($_GET['author_name'])) ? get_user_by('slug', get_the_author()) : get_userdata(intval($author));

?>

<div class="author-page-container">

    <?php get_sidebar('left')?>

    <!-- ОСНОВНОЙ КОНТЕНТ: Информация об авторе и его посты -->
    <div id="primary" class="content-area author-main-content">
        <main id="main" class="site-main">

            <!-- Блок с информацией об авторе -->
            <header class="author-header">
                <div class="author-avatar">
                    <?php echo get_avatar($current_author->ID, 120); ?>
                </div>
                <div class="author-info">
                    <h1 class="author-title"><?php echo esc_html($current_author->display_name); ?></h1>
                    <div class="author-bio">
                        <?php echo wpautop(esc_html($current_author->description)); // wpautop для сохранения параграфов ?>
                    </div>
                </div>
            </header>

            <hr>

        </main>
    </div>

        <?php get_sidebar('right')?>


</div><!-- .author-page-container -->

<?php
get_footer();