<?php
/* front-page.php
 * Le modèle de page de garde est chargé si une page avant statique est spécifiée sous Admin> Paramètres> Lecture.
 */
$options = get_option('arre_custom_settings');
?>
<?php get_header(); ?>
    <div class="swiper-container">
        <div class="parallax-bg" style="background-image:url('<?php print IMG_DIR; ?>/slide-01-1920x810.jpg')" data-swiper-parallax="-23%"></div>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> >
                                <header>
                                    <h2>
                                            <?php the_title(); ?>
                                    </h2>
                                </header>
                                <span class="secondary label date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php the_time(get_option('date_format')); ?></span>&nbsp;
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
        <?php if(!empty($options)): ?> 
            <section class="coordonates">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <?php if(trim($options['arre_phone_arre_coordonates']) != ''): ?>
                                    <div class="glyphicon glyphicon-earphone" aria-hidden="true"></div><br />
                                    <a href="callto:<?php echo $options['arre_phone_arre_coordonates'] ?>"><?php echo $options['arre_phone_arre_coordonates'] ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 text-center">
                            <?php if(trim($options['arre_address_arre_coordonates']) != ''): ?>
                                    <div class="glyphicon glyphicon-map-marker" aria-hidden="true"></div><br />
                                    <?php echo $options['arre_address_arre_coordonates'] ?> 
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 text-center">
                            <?php if(trim($options['arre_email_arre_coordonates']) != ''): ?>
                                    <div class="glyphicon glyphicon-envelope" aria-hidden="true"></div><br />
                                    <a href="mailto:<?php echo $options['arre_email_arre_coordonates'] ?> " ><?php echo $options['arre_email_arre_coordonates'] ?> </a>  
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="google-map">
            <div class="map"></div>
        </section>
        <section class="home-footer">
            <div class="container">
                <div class="row">
                    <?php if(!empty($options)): ?> 
                        <div class="col-lg-4 text-center">
                            <img src="<?php print IMG_DIR; ?>/logo-arre-nav.png" alt="logo de l'arre" />
                            <h3 class="asso-subtitle">Association Ressource pour la Réussite Éducative</h3>                        
                            <ul class="social-network social-circle">
                                <?php if(trim($options['arre_facebook_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_facebook_social_platform'] ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_youtube_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_youtube_social_platform'] ?>" class="icoYoutube" title="Youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_google_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_google_social_platform'] ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_twitter_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_twitter_social_platform'] ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_viadeo_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_viadeo_social_platform'] ?>" class="icoViadeo" title="Viadeo"><i class="fa fa-viadeo" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_linkedin_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_linkedin_social_platform'] ?>" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_pinterest_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_pinterest_social_platform'] ?>" class="icoPinterest" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                                <?php if(trim($options['arre_instagram_social_platform']) != ''): ?>
                                        <li><a href="<?php echo $options['arre_instagram_social_platform'] ?>" class="icoInstagram" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>  
                                <?php endif; ?>

                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php get_sidebar('footer-sidebar'); ?> 
                </div> 
            </div>
        </section>
    </main>
<?php get_footer(); ?>