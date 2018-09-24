<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">

    <main class="kt-entry-content kt-category-list clearfix">

        <?php if (have_posts()):while (have_posts()):the_post(); ?>

            <div class="kt-blog-post matchHeight">
                <?php if (has_post_thumbnail()): ?>

                    <div class="kt-blog-post-image">

                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title_attribute(); ?>">
                            <figure>
                                <?php
                                the_post_thumbnail('italian-restaurant-page-image-col-md-8',
                                    array('class' => 'img-responsive kt-featured-img', 'alt' => get_the_title()));
                                ?>
                            </figure>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="kt-blog-list-body">

                    <h2 class="h1">
                        <a class="kt-article-title" href="<?php
                        the_permalink(); ?>"
                           title="<?php the_title_attribute(); ?>"> <?php
                            the_title();
                            ?>
                        </a>
                    </h2>

                    <div class="kt-post-meta blog-list-meta clearfix">
                        <p class="meta-comments">

                            <?php echo get_the_date(get_option('date_format')); ?>

                            / <?php _e('By ', 'italian-restaurant') . the_author(); ?> /
                            <i class="fa fa-comment"></i> <a href="<?php
                            the_permalink(); ?>#comments"><?php
                                echo
                                comments_number(__('No comments',
                                    'italian-restaurant'), __('1 Comment', 'italian-restaurant'), __('% Comments',
                                    'italian-restaurant')); ?></a></p>

                    </div>

                    <section class="blog-list-content">
                        <?php the_excerpt(); ?>
                    </section>
                    <a class="blog-list-read-more" href="<?php the_permalink(); ?>"
                       title="<?php
                       the_title_attribute();
                       ?>"><?php _e('READ MORE', 'italian-restaurant'); ?></a>

                    <section class="blog-list-categories">
                        <i class="fa fa-tags"></i> <?php echo get_the_category_list(',', ''); ?>
                    </section>

                </div>

            </div>

            <!--kt-blog-post ends here -->
        <?php endwhile;
        else: echo 'No posts';
        endif;

        ?>
    </main>


    <div class="clearfix"></div>
    <div id="kt-pagination">

        <?php
        if (function_exists('italian_restaurant_custom_pagination')) {
            italian_restaurant_custom_pagination("","",$paged);
        }
        ?>

    </div>
    <footer class="entry-meta-footer clearfix">

        <!-- Comments -->
        <?php if(comments_open()): ?>
            <div class="kt-comments-area">
                <?php comments_template('', true); ?>
            </div>
        <?php endif; ?>

    </footer>

    <?php
    do_action('beyond_after_post_content');
    ?>

</section>
