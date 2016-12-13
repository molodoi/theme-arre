<?php get_header(); ?>
    <main>
    index.php
        <div class="container">
            <div class="row">
                <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post(); ?>
                            <div class="col-lg-4">                    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(' '); ?> >
                                <header>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="secondary label date">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                                        <?php the_time(get_option('date_format')); ?>
                                    </div>&nbsp;
                                    <?php if(has_category( '', $post->ID )): ?>
                                        <div class="categories"> 
                                            <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>                          
                                            <?php the_category(' '); ?>                  
                                        </div>&nbsp;
                                    <?php endif; ?>
                                </header>
                                
                                
                                <?php if(has_post_thumbnail()): ?> 
                                    <figure>
                                        <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-rounded img-responsive' )); ?>
                                    </figure>
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
        </div>
    </main>
<?php get_footer(); ?>