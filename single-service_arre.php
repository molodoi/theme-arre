<?php
/* single-service.php
 * Le modèle de poste service unique est utilisé lorsqu'un visiteur demande un poste unique. Pour cela, et tous les autres modèles de requêtes, index.php est utilisé si le modèle de requête n'est pas présent.
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
                                            <ul class="nav nav-pills text-right">
                                                <?php 
                                                    $terms = get_terms('formationstype');

                                                    foreach ( $terms as $term ) {
                                                        echo '<li role="presentation"><a href="'.$term->slug.'">'.$term->name.'</a></li>';
                                                    }
                                                ?>
                                            </ul>  
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