<?php
/* front-page.php
 * Le modèle de page de garde est chargé si une page avant statique est spécifiée sous Admin> Paramètres> Lecture.
 */
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
        front page.php 
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

                                    <p>
                                        Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.

Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.

Restabat ut Caesar post haec properaret accitus et abstergendae causa suspicionis sororem suam, eius uxorem, Constantius ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet ambigeret metuens saepe cruentum, spe tamen quod eum lenire poterit ut germanum profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium repentina. cuius post obitum maritus contemplans cecidisse fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.

Ibi victu recreati et quiete, postquam abierat timor, vicos opulentos adorti equestrium adventu cohortium, quae casu propinquabant, nec resistere planitie porrecta conati digressi sunt retroque concedentes omne iuventutis robur relictum in sedibus acciverunt.

Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis vacua ab omni periculo atque etiam suspicione belli?

Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.

Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.

Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.

Hacque adfabilitate confisus cum eadem postridie feceris, ut incognitus haerebis et repentinus, hortatore illo hesterno clientes numerando, qui sis vel unde venias diutius ambigente agnitus vero tandem et adscitus in amicitiam si te salutandi adsiduitati dederis triennio indiscretus et per tot dierum defueris tempus, reverteris ad paria perferenda, nec ubi esses interrogatus et quo tandem miser discesseris, aetatem omnem frustra in stipite conteres summittendo.

Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.

Inter haec Orfitus praefecti potestate regebat urbem aeternam ultra modum delatae dignitatis sese efferens insolenter, vir quidem prudens et forensium negotiorum oppido gnarus, sed splendore liberalium doctrinarum minus quam nobilem decuerat institutus, quo administrante seditiones sunt concitatae graves ob inopiam vini: huius avidis usibus vulgus intentum ad motus asperos excitatur et crebros.

Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.

Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.

Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.

Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.
                                        </p>
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

        <section class="google-map">
            <div class="map"></div>
        </section>
        
    </main>
<?php get_footer(); ?>