<?php
/* 404.php
 * Le modèle 404 est utilisé lorsque WordPress ne peut pas trouver un article, une page ou un autre contenu qui correspond à la demande du visiteur.
 */
?>
<?php get_header(); ?>
    <header class="header-page">
        <h2>OUPS!!!</h2>
        <?php if (function_exists('yoast_breadcrumb')): ?>
                <?php yoast_breadcrumb('<ul class="breadcrumb"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <li>', '</li></ul>'); ?>
        <?php endif; ?>
    </header>
    <main>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br />
                    <br />
                    <img src="<?php print IMG_DIR; ?>/logo-arre-nav.png" alt="logo de l'arre" />
                    <h4 class="asso-subtitle">Association Ressource pour la Réussite Éducative</h4> 
                    <br />
                    <h2>404</h2>
                    <h3>La page que vous cherchez n'existe pas.</h3>
                    <br />
                    <br />
                    <br />
                    <a href="<?php echo home_url(); ?>" class="btn btn-default">Retour à l'accueil</a>
                </div> 
            </div>
        </div>
    </main>
<?php get_footer(); ?>