<?php
/* 404.php
 * Le modèle 404 est utilisé lorsque WordPress ne peut pas trouver un article, une page ou un autre contenu qui correspond à la demande du visiteur.
 */
?>
<?php get_header(); ?>
    <main>
        page.php
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="bitter_font_h1 txt_purple">OUPS!!</h2>
                    <h3 class="bitter_font_h2">La page que vous cherchez n'existe pas.</h3>
                    <p class="bitter_font">Pas de panique voici la solution :<br /> Utilisez le moteur de recherche ci-dessus pour trouver votre bonheur.</p>
                    <a href="<?php echo home_url(); ?>" class="btn btn-default">Retour à l'accueil</a>
                </div> 
            </div>
        </div>
    </main>
<?php get_footer(); ?>