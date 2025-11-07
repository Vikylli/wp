<?php
    $current_author = (isset($_GET['author_name'])) ? get_user_by('slug', get_the_author()) : get_userdata(intval($author));
?>

<aside id="author-sidebar-right" class="author-sidebar">
    <div class="author-sidebar-inner">
        <h2 class="sidebar-title">Рубрики автора</h2>
        <ul>
            <?php
            $author_post_ids = get_posts(array(
                'author' => $current_author->ID,
                'posts_per_page' => -1, // все посты
                'fields' => 'ids',
            ));

            $author_category_ids = array();

            if ($author_post_ids) {
                foreach ($author_post_ids as $post_id) {
                    $post_categories = wp_get_post_categories($post_id);
                    if (!empty($post_categories)) {
                        $author_category_ids = array_merge($author_category_ids, $post_categories);
                    }
                }
            }

            // Шаг 3: Удаляем дубликаты ID категорий и выводим их.
            if (!empty($author_category_ids)) {
                $unique_category_ids = array_unique($author_category_ids);

                foreach ($unique_category_ids as $cat_id) {
                    $category = get_category($cat_id);
                    echo '<li><a href="' . esc_url(get_category_link($cat_id)) . '">' . esc_html($category->name) . '</a></li>';
                }
            } else {
                echo '<li>Автор еще не использовал рубрики.</li>';
            }
            ?>
        </ul>
    </div>
</aside>