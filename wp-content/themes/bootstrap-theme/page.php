<?php
/**
 * Template Name: about_page
 */
get_header(); ?>

<main id="primary" class="site-main">
  <div class="container py-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto'); ?> style="max-width: 900px;">
        <header class="mb-4">
          <h1 class="display-5 mb-3"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-4">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded', 'alt' => esc_attr(get_the_title())]); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>

    <?php endwhile; else : ?>
      <p class="text-muted">Страница не найдена.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>