<?php
/* page.php
 * Le modèle de page est utilisé lorsque les visiteurs demandent des pages individuelles, qui sont un modèle intégré.
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
                    <?php if (function_exists('yoast_breadcrumb')): ?>
                            <?php yoast_breadcrumb('<ul class="breadcrumb"><li>', '</li></ul>'); ?>
                    <?php endif; ?>
                </header>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">                    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> >
                                <?php 
                                    if(!empty($post->post_excerpt)) :
                                        the_excerpt();
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="more-link">Lire la suite</a>
                                        <?php
                                    else:
                                        ?>  <?php
                                        the_content('Lire la suite');
                                    endif; 
                                ?>
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
                        </div> 
                        <div class="col-lg-5"> 
                            <?php if(has_post_thumbnail()): ?> 
                                <figure>
                                    <?php the_post_thumbnail('medium', array( 'class' => 'img-rounded img-responsive' )); ?>
                                </figure>
                            <?php endif; ?>
                        </div> 
                    </div>      
            <?php endwhile; ?>
            <?php else: ?>
            <div class="container">
                    <div class="row">
                        <article>
                    <h2>Pas d'article trouvé!</h2>
                    
                    <br />
                    <p>
                        Aucun article ne correspond à votre requête.					
                    </p>
                    <br />
                    <br />
                </article>
                <div class="post-divider"></div>            
                </div> 
            </div> 
        <?php endif; ?>               
        </div>
    </main>
<?php get_footer(); ?>