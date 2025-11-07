<?php
    $current_author = (isset($_GET['author_name'])) ? get_user_by('slug', get_the_author()) : get_userdata(intval($author));
?>
    <aside id="author-sidebar-left" class="author-sidebar">
        <div class="author-sidebar-inner">
            <h2 class="sidebar-title">Последние записи автора</h2>
            <ul>
                <?php
                $author_posts_args = array(
                    'author' => $current_author->ID,
                    'posts_per_page' => 5, // Сколько последних записей выводить
                );
                $author_posts = new WP_Query($author_posts_args);
                if ($author_posts->have_posts()) {
                    while ($author_posts->have_posts()) : $author_posts->the_post();
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    }
                else {
                    ?>
                    <li>Записей не найдено.</li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </aside>