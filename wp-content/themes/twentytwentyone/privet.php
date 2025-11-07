<?php
/*
Template Name: Автор по дате
*/
get_header();

$author_id = 0;

if ( isset($_GET['author']) ) {
    $author_id = absint($_GET['author']);
}

if ( !$author_id && isset($_GET['author_name']) ) {
    $slug = sanitize_title_for_query( wp_unslash($_GET['author_name']) );
    if ( $slug ) {
        $u = get_user_by('slug', $slug);
        if ( $u ) {
            $author_id = (int) $u->ID;
        }
    }
}

$year = $monthnum = $day = 0;
if ( ! empty($_GET['date']) ) {
    $date = sanitize_text_field( wp_unslash($_GET['date']) );
    if ( preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date, $m) ) {
        $year     = (int) $m[1];
        $monthnum = (int) $m[2];
        $day      = (int) $m[3];
    }
}

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => 5,
    'offset'         => 2,
    'no_found_rows'  => true,
);

if ( $author_id ) {
    $args['author'] = $author_id;
}

if ( $year && $monthnum && $day ) {
    $args['date_query'] = array(
        array(
            'year'     => $year,
            'monthnum' => $monthnum,
            'day'      => $day,
            'compare'  => '='
        )
    );
}

$query = new WP_Query( $args );
?>

<main class="author-date-posts">
    <h1><?php the_title(); ?></h1>

    <form method="get" style="margin:16px 0">
        <label>
            author_name:
            <input type="text" name="author_name" value="<?php echo isset($_GET['author_name']) ? esc_attr($_GET['author_name']) : ''; ?>" placeholder="admin">
        </label>
        <label>
            Дата:
            <input type="date" name="date" value="<?php echo isset($_GET['date']) ? esc_attr($_GET['date']) : ''; ?>">
        </label>
        <button type="submit">Показать</button>
    </form>

    <?php if ( $query->have_posts() ) : ?>
        <ul>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    — <?php echo esc_html( get_the_date('Y-m-d') ); ?>
                    — <?php echo esc_html( get_the_author() ); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Ничего не найдено. Проверьте автора и дату.</p>
    <?php endif; wp_reset_postdata(); ?>
</main>

<?php get_footer();