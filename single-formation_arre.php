<?php
/* single-formations.php
 * Le modèle de poste formation unique est utilisé lorsqu'un visiteur demande un poste unique. Pour cela, et tous les autres modèles de requêtes, index.php est utilisé si le modèle de requête n'est pas présent.
 */
?>
<?php get_header(); ?>
    <main>
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <header class="header-page">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <p><?php the_excerpt(); ?></p>
                    <?php if (function_exists('yoast_breadcrumb')): ?>
                             <?php yoast_breadcrumb('<ul class="breadcrumb"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <li>', '</li></ul>'); ?>
                    <?php endif; ?>
                </header>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> >
                                        <?php if(has_post_thumbnail()): ?> 
                                            <figure>
                                                    <?php the_post_thumbnail('featured_1140_480', array( 'class' => 'img-rounded img-responsive' )); ?>
                                                    <?php if(get_post(get_post_thumbnail_id())->post_excerpt != ''): ?>
                                                        <figcaption>
                                                            <p>
                                                                <small>
                                                                    <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>  
                                                                <em><?php echo get_post(get_post_thumbnail_id())->post_content; ?></em>
                                                                </small>
                                                            </p>
                                                        </figcaption>
                                                        
                                                    <?php endif; ?>
                                            </figure>
                                        <?php endif; ?>                                    
                                            
                                        
                                        <?php the_content('Lire la suite'); ?>
                                        <div class="label format">
                                        <?php  
                                                $format = get_post_format() ? : 'standard';  
                                                /* aside, chat, gallery, link, image, quote, status, video, audio */                                      
                                                get_template_part( 'partials/format', $format );                                        
                                        ?>
                                        </div>
                                        <div class="label date">
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                                            <?php the_time(get_option('date_format')); ?>
                                        </div>

                                        <?php if(has_category( '', $post->ID )): ?>
                                            <div class=" label categories"> 
                                                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>                          
                                                <?php the_category(' '); ?>                  
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $terms = get_the_terms($post->ID, 'formationstype');
                                        if ($terms && !is_wp_error($terms)) : ?>
                                            <div class=" label categories"> <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 
                                        <?php
                                            foreach ($terms as $term) : 
                                            $term_link = get_term_link( $term );

                                            // If there was an error, continue to the next term.
                                            if ( is_wp_error( $term_link ) ) {
                                                continue;
                                            }
                                            ?>
                                                <a href="<?php echo esc_url($term_link); ?>"><?php echo $term->name; ?> </a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>  
                                    </article>
                                    <nav>
                                        <?php
                                            $args = array(
                                                'before' => '<ul class="pagination pagination-lg">',
                                                'after' => '</ul>',
                                                'before_link' => '<li>',
                                                'after_link' => '</li>',
                                                'current_before' => '<li class="active">',
                                                'current_after' => '</li>',
                                                'previouspagelink' => '&laquo;',
                                                'nextpagelink' => '&raquo;'
                                            );

                                            bootstrap_link_pages($args);
                                        ?>
                                    </nav>
                                    <div class="post-divider"></div> 
                                    <hr />           
                                    
                                <?php endwhile; ?>
                            <?php else: ?>
                                    <article>
                                        <h2>Pas d'article trouvé!</h2>
                                        
                                        <br />
                                        <p>
                                            Aucun article ne correspond à votre requête.					
                                        </p>
                                        <br />
                                        <br />
                                    </article>
                            
                        </div> 
                    </div>   
                </div> 
                <?php endif; ?>
    </main>
<?php get_footer(); ?>