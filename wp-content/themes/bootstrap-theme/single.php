<?php get_header(); ?>

<div class="container py-5">
   <div class="row">
      <main id="primary" class="site-main col-lg-8">
         <?php
         while (have_posts()):
            the_post();
         ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
               <header class="entry-header mb-4">
                  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                     <div class="entry-meta text-muted">
                        <span>Опубликовано: <?php echo get_the_date(); ?></span>
                        <span> | Автор: <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
                     </div>
               </header>
               <?php if ( has_post_thumbnail() ) : ?>
                  <div class="post-thumbnail mb-4">
                     <?php the_post_thumbnail( 'large', ['class' => 'img-fluid'] );?>
                  </div>
               <?php endif; ?>

               <div class="entry-content">
                  <?php the_content(); ?>
               </div>

            <?php
            if ( comments_open() || get_comments_number() ) :
               comments_template();
            endif;
            ?>
         <?php endwhile; ?>
      </main>
      <aside class="col-lg-4">
         <?php get_sidebar();?>
      </aside>
    </div>
</div>

<?php
get_footer();