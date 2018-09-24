<?php if (have_posts()):while (have_posts()):the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">


        <header class="entry-header clearfix">

            <?php if (has_post_thumbnail()): ?>
                <figure>
                    <?php
                    the_post_thumbnail('italian-restaurant-page-image-col-md-8',
                        array
                    ('class' => 'img-responsive kt-featured-img', 'alt' => get_the_title
                        ()));
                    ?>
                </figure>
            <?php endif; ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="kt-post-meta entry-meta clearfix">

                <div class="kt-post-meta-body">

                    <?php _e('by ', 'italian-restaurant') . the_author(); ?>
                    | <?php echo get_the_date(get_option
                    ('date_format')); ?>

                    <i class="fa fa-comment"></i> <?php echo comments_number(__('No comments',
                        'italian-restaurant'), __('1 Comment', 'italian-restaurant'), __('% Comments',
                        'italian-restaurant')); ?>
                    <i class="fa fa-tags"></i> <?php echo get_the_category_list(',', ''); ?>

                </div>

            </div>
        </header>

        <section class="kt-entry-content clearfix">

            <?php
            the_content();
            ?>
        </section>

        <?php if(has_tag()): ?>
            <i class="fa fa-check"></i> <?php echo get_the_tag_list('',','); ?>
        <?php endif; ?>
        <div class="clearfix"></div>

        <footer class="entry-meta-footer clearfix">

            <!-- Comments -->

            <div class="kt-comments-area">
                <?php comments_template('', true); ?>
            </div>


        </footer>
    </article>
<?php endwhile; endif; ?>