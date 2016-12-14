<?php
/* image.php
 * Le modèle d'attachement d'image est une version plus spécifique de attachment.php et est utilisé lors de l'affichage d'une pièce jointe d'image unique. S'il n'est pas présent, WordPress utilisera attachment.php à la place.
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
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> 
                                            <figure>
                                                    <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
                                                        <p>
                                                            <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
                                                                <img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium img-rounded img-responsive" alt="<?php $post->post_excerpt; ?>" />
                                                            </a>
                                                        </p>
                                                    <?php else : ?>
                                                        <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
                                                    <?php endif; ?>
                                            </figure>                                    
                                            
                                        <?php 
                                        if(!empty($post->post_excerpt)) :
                                            the_excerpt();
                                            
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