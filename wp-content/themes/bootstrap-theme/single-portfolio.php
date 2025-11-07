<?php
/**
 * Одна работа портфолио (CPT 'portfolio')
 * Полноширинный макет, без сайдбара
 */
get_header(); ?>

<main id="primary" class="site-main">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- Hero-изображение во всю ширину -->
    <section class="container-fluid px-0">
      <?php if (has_post_thumbnail()) : ?>
        <!-- Можно сменить соотношение: ratio-21x9 / ratio-16x9 / ratio-4x3 -->
        <div class="ratio ratio-21x9 portfolio-hero">
          <?php the_post_thumbnail('full', [
            'class' => 'img-cover',
            'alt'   => esc_attr(get_the_title())
          ]); ?>
        </div>
      <?php endif; ?>
    </section>

    <!-- Контент -->
    <article <?php post_class('portfolio-single container py-5'); ?>>

      <header class="mb-4">
        <h1 class="display-5 mb-2"><?php the_title(); ?></h1>

        <?php if (has_excerpt()) : ?>
          <p class="lead text-muted mb-0"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>

        <?php
        // Категории портфолио (если включали таксономию)
        $terms = get_the_terms(get_the_ID(), 'portfolio_cat');
        if ($terms && !is_wp_error($terms)) {
          echo '<ul class="list-inline small text-muted mt-3 mb-0">';
          foreach ($terms as $t) {
            echo '<li class="list-inline-item me-2"><a class="link-secondary text-decoration-none" href="' . esc_url(get_term_link($t)) . '">' . esc_html($t->name) . '</a></li>';
          }
          echo '</ul>';
        }
        ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <hr class="my-5">

      <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
        <a class="btn btn-outline-secondary" href="<?php echo esc_url( get_post_type_archive_link('portfolio') ); ?>">
          ← К списку работ
        </a>

        <?php
        // Навигация между работами (в пределах той же категории)
        the_post_navigation([
          'prev_text' => '<span class="btn btn-link p-0">&larr; %title</span>',
          'next_text' => '<span class="btn btn-link p-0">%title &rarr;</span>',
          'in_same_term' => true,
          'taxonomy' => 'portfolio_cat',
          'screen_reader_text' => 'Навигация по работам',
        ]);
        ?>
      </div>

    </article>

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>