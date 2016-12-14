<?php
/* search.php
 * Le modèle d'attachement d'image est une version plus spécifique de attachment.php et est utilisé lors de l'affichage d'une pièce jointe d'image unique. S'il n'est pas présent, WordPress utilisera attachment.php à la place.
 */
?>
<?php get_header(); ?>
<header class="header-page">
    <h2>
    <?php
            $allsearch = &new WP_Query("s=$s&showposts=-1");
            $key = wp_specialchars($s, 1);
            $count = $allsearch->post_count;
            if ($count < 1):
                echo 'Il y a ';
            else:
                echo 'Il y a ';
            endif;

            echo $count;

            if ($count > 1):
                echo ' résultats';
            else:
                echo ' résultat';
            endif;
            echo ' pour : ' . $key;
            wp_reset_query();
    ?>
    </h2>
    <?php if (function_exists('yoast_breadcrumb')): ?>
            <?php yoast_breadcrumb('<ul class="breadcrumb"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <li>', '</li></ul>'); ?>
    <?php endif; ?>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
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
    

      </div><!-- /.row -->
    </div><!-- /.container -->
<?php get_footer(); ?>