<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BRO
 */
?>
<?php global $first_post; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php if (has_post_thumbnail()) { ?>
            <figure class="featured-image">
                <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                    <?php if ($first_post == true) { ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php
                    } else {
                        the_post_thumbnail();
                    }
                    ?>
                </a>
            </figure>
        <?php }
        ?>

        <?php
        if (is_single()) {
			if ( $first_post == true ) {
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			}
        } else {
            the_title(sprintf('<h2 class="entry-title index-excerpt"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
        }

        if (has_excerpt($post->ID)) {
            echo '<div class="deck">';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '</div><!-- .deck -->';
        }


        if ('post' === get_post_type()) :
            ?>
            <div class="index-entry-meta">
            <?php bro_index_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif;
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content index-excerpt">
        <?php
        the_excerpt();
        ?>

        <div class="continue-reading">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">


                <?php
                printf(
                        wp_kses(__('Continue reading %s', 'bro'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
                );
                ?>
            </a>
        </div>


    </div><!-- .entry-content -->


</article><!-- #post-## -->
