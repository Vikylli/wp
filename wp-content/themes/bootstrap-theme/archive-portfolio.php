<?php
/**
 * Архив портфолио
 */
get_header(); ?>

<main id="primary" class="site-main">
  <div class="container-fluid px-0">
    <div class="py-5 px-3 px-md-4">

      <h1 class="display-5 mb-4"><?php post_type_archive_title(); ?></h1>

      <?php if (have_posts()) : ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <?php while (have_posts()) : the_post(); ?>
            <div class="col">
              <a href="<?php the_permalink(); ?>"
                 class="d-block position-relative portfolio-card text-decoration-none"
                 aria-label="<?php the_title_attribute(); ?>">

                <div class="ratio ratio-4x3">
                  <?php if (has_post_thumbnail()) :
                    the_post_thumbnail('portfolio-thumb', ['class' => 'img-cover', 'alt' => esc_attr(get_the_title())]);
                  else : ?>
                    <div class="bg-light d-flex align-items-center justify-content-center">
                      <span class="text-muted">Нет изображения</span>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                  <span class="h5 m-0 text-white text-center px-3"><?php the_title(); ?></span>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
        </div>

        <nav class="mt-5" aria-label="Навигация по портфолио">
          <?php the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => '←',
            'next_text' => '→',
            'screen_reader_text' => 'Страницы'
          ]); ?>
        </nav>
      <?php else : ?>
        <p class="text-muted">Пока нет опубликованных работ.</p>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>