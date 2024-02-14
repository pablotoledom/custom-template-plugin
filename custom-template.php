<?php
/*
Template Name: Custom Template
*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
              <h1>This is a Custom Template</h1>
                <?php
                // Start the loop
                while ( have_posts() ) :
                    the_post();

                    // Display page content
                    the_content();

                // End the loop
                endwhile;
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
