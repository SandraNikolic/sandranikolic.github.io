<?php if (have_posts()):while (have_posts()):the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">
        <div class="row">
            <div class="col-md-12">
                <section class="kt-entry-content clearfix">
                    <?php if (has_post_thumbnail()): ?>
                        <figure>
                            <?php
                            the_post_thumbnail('italian-restaurant-page-image-col-md-12',
                                array
                                ('class' => 'img-responsive kt-featured-img', 'alt' => get_the_title()));
                            ?>
                        </figure>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php else: ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <?php
                    the_content();
                    ?>
                </section>

                <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'italian-restaurant') . '</span>', 'after' => '</div>')); ?>

                <div class="clearfix"></div>

                <footer class="entry-meta-footer clearfix">

                    <!-- Comments -->

                    <div class="kt-comments-area">
                        <?php comments_template('', true); ?>
                    </div>


                </footer>

            </div>

        </div>
    </article>

<?php endwhile;
else: ?>
    <div class="kt-not-found">

        <?php _e('Well, it seems that nothing is here..', 'italian-restaurant'); ?>
    </div>
<?php endif; ?>