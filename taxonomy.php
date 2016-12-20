<?php
/* taxonomy.php
 * Le modèle de terme de taxonomie est utilisé lorsqu'un visiteur demande un terme dans une taxonomie personnalisée.
 */
?>
<?php get_header(); ?>
<header class="header-page">
    <h2>
        <?php single_cat_title(); ?>
    </h2>

        <p><?php echo category_description(); ?></p>

    <?php if (function_exists('yoast_breadcrumb')): ?>
            <?php yoast_breadcrumb('<ul class="breadcrumb"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <li>', '</li></ul>'); ?>
    <?php endif; ?>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <main>                
                <?php if(have_posts()): ?>
                    <div class="row">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="col-lg-6">                    
                            <article id="post-<?php the_ID(); ?>" <?php post_class('article-index'); ?> >                            
                                <?php if(has_post_thumbnail()): ?> 
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-full-width img-responsive' )); ?>
                                        </a>
                                    </figure>
                                <?php endif; ?>
                                <header>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>                                    
                                </header>

                                <div class="secondary label date">
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
                                if(!empty($post->post_excerpt)) :
                                    the_excerpt();
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-default btn-center">Lire la suite</a>
                                    <?php
                                else:
                                    ?>  <?php
                                    the_content('Lire la suite');
                                endif; 
                                ?>
                            </article>           
                        </div>
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
                    <?php endif; ?>
                </div>
            </main>
            <div class="row">
                <?php if (get_next_posts_link() || get_previous_posts_link()): ?>
                    <div class="col-lg-12">
                        <nav class="text-center">
                            <ul class="pager">                                        
                                <?php if (get_previous_posts_link()): ?>
                                    <li class="previous">
                                        <?php previous_posts_link('<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Pr&#xE9;c&#xE9;dent'); ?>
                                    </li>  
                                <?php endif; ?>
                                <?php if (get_next_posts_link()): ?>
                                    <li class="next">
                                        <?php next_posts_link('Suivant <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'); ?>
                                    </li>
                                <?php endif; ?>                                             
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- /.blog-main -->

        <aside class="col-lg-3">
            <?php get_sidebar(); ?>
        </aside>       

      </div><!-- /.row -->
    </div><!-- /.container -->
<?php get_footer(); ?>
