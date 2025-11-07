<?php
/*
Template Name: Custom Query — Pages List
*/
get_header();

$args = array(
  'post_type'      => 'page',   
  'posts_per_page' => -1,      
  'orderby'        => 'date',
  'order'          => 'DESC',
  'post_status'    => 'publish',
);

$query = new WP_Query($args);
?>

<main class="custom-query">
  <?php if ($query->have_posts()): ?>
    <?php while ($query->have_posts()): $query->the_post(); ?>

    <?php
    $raw_title = trim(get_post_field('post_title', get_the_ID()));
      $display_title = ($raw_title === '') ? 'нет названия' : get_the_title();
    ?>

      <article id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html($display_title); ?></a></h2>
        <p>Дата публикации: <?php echo esc_html(get_the_date()); ?></p>
      </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php else: ?>
    <p>Страниц не найдено.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>