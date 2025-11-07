<?php get_header(); ?>

<div class="middle">
   <div class="container py-5">
      <div class="row">
         <main id="primary" class="site-main col-lg-8">
            <?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-4' ); ?>>
                     <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>">
                           <?php the_post_thumbnail( 'large', ['class' => 'card-img-top'] ); ?>
                        </a>
                     <?php endif; ?>

                     <div class="card-body">
                        <h2 class="card-title">
                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="card-text">
                           <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-2">
                           Читать далее &rarr;
                        </a>
                     </div>
                  </article>
               <?php endwhile; ?>

               <?php 
               the_posts_pagination( array(
                  'prev_text' => __( '&larr; Предыдущие записи', 'your-theme-textdomain'),
                  'next_text' => __( 'Следующие записи &rarr;', 'your-theme-textdomain'),
               ));
               ?>

            <?php else :?>
               <p>К сожалению, записей не найдено.</p>
            <?php endif; ?>
         </main>

         <aside class="col-lg-4">
            <?php get_sidebar();?>
         </aside>
      </div>
   </div>

</div>

<?php get_footer(); ?>