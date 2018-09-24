<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chili_Lite
 */
?>

    <div id="post-<?php the_ID(); ?>" class="news-page-content-section-area">
        <div class="single-news-area">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',array('class'=>'media-object')); ?></a>
          <div class="news-body">
            <h3><?php the_title(); ?></h3>                            
            <div class="informations">
                <ul>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time(get_option( 'date_format' )); ?></li>
                    <li><i class="fa fa-user" aria-hidden="true"></i>  <?php esc_html_e('By Admin: ','chili-lite'); the_author(); ?></li>
                    <li><i class="fa fa-comments-o" aria-hidden="true"></i> <?php  comments_number( esc_html__('Comment: 0','chili-lite'), esc_html__('Comment: 1','chili-lite'), esc_html__('Comments %','chili-lite') ); ?></li>
                </ul>
            </div>
            <?php the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'chili-lite' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ) ); 

                global $numpages;
                if ( is_singular() && $numpages > 1 ) {
                      if ( is_singular( 'attachment' ) ) {
                        // Parent post navigation.
                        the_post_navigation( array(
                          'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'chili-lite' ),
                        ) );
                      } elseif ( is_singular( 'post' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                          'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next - ', 'chili-lite' ) . '</span> ' . 
                            '<span class="post-title">%title</span>',
                          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous - ', 'chili-lite' ) . '</span> ' . 
                            '<span class="post-title">%title</span>',
                        ) );
                      }
                }
            ?> 
          </div>                                
        </div>
    </div> 
    <?php if(has_tag()): ?>
        <div class="news-page-tag-section-area">
            <h4><?php esc_html_e('Tags','chili-lite'); ?></h4>
            <ul>
            <?php
                $chili_lite_posttags = get_the_tags(); 
                $chili_lite_loop = 1;
                if ($chili_lite_posttags) {
                  foreach($chili_lite_posttags as $chili_lite_posttag) {
                    if($chili_lite_loop > 1) echo ', '; 
                    echo '<li><a href="'.esc_url(get_tag_link($chili_lite_posttag->term_id)).'">'.esc_html($chili_lite_posttag->name) .'</a></li>'; 
                    $chili_lite_loop ++; 
                  }
                } 
            ?> 
            </ul>
        </div>
    <?php endif; ?>
