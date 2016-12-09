<?php
/* front-page.php
 * Le modèle de page de garde est chargé si une page avant statique est spécifiée sous Admin> Paramètres> Lecture.
 */
?>
<?php get_header(); ?>
    <div class="swiper-container">
        <div class="parallax-bg" style="background-image:url(http://lorempixel.com/900/600/nightlife/2/)" data-swiper-parallax="-23%"></div>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-100">Slide 1</div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-300">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla laoreet justo vitae porttitor porttitor. Suspendisse in sem justo. Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod. Aliquam hendrerit lorem at elit facilisis rutrum. Ut at ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec, tincidunt ut libero. Aenean feugiat non eros quis feugiat.</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-100">Slide 2</div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-300">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla laoreet justo vitae porttitor porttitor. Suspendisse in sem justo. Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod. Aliquam hendrerit lorem at elit facilisis rutrum. Ut at ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec, tincidunt ut libero. Aenean feugiat non eros quis feugiat.</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-100">Slide 3</div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-300">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla laoreet justo vitae porttitor porttitor. Suspendisse in sem justo. Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod. Aliquam hendrerit lorem at elit facilisis rutrum. Ut at ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec, tincidunt ut libero. Aenean feugiat non eros quis feugiat.</p>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
    </div>
    <main>
        front page.php
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> >
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