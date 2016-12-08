<?php
/* page.php
 * Le modèle de page est utilisé lorsque les visiteurs demandent des pages individuelles, qui sont un modèle intégré.
 */
?>
<?php get_header(); ?>
    <main>
        page.php
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(' panel'); ?> >
                                <header>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                </header>
                                <span class="secondary label date"><?php the_time(get_option('date_format')); ?></span>&nbsp;
                                <?php if(has_category( '', $post->ID )): ?>
                                    <span class="categories">                         
                                        <?php the_category(' '); ?>                  
                                    </span>&nbsp;
                                <?php endif; ?>
                                
                                <?php if(has_post_thumbnail()): ?> 
                                    <figure>
                                            <a href="<?php the_permalink(); ?>" class="th">
                                                <?php the_post_thumbnail(array(600,250)); ?>
                                            </a>
                                        </figure>
                                        <br />
                                    <?php endif; ?>
                                    
                                    
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
                            <div class="post-divider"></div>            
                            
                        <?php endwhile; ?>
                    <?php else: ?>
                            <article class="panel">
                                <h2>Pas d'article trouvé!</h2>
                                
                                <br />
                                <p>
                                    Aucun article ne correspond à votre requête.					
                                </p>
                                <br />
                                <br />
                            </article>
                    <?php endif; ?>
                </div> 
            </div>
        </div>
    </main>
<?php get_footer(); ?>