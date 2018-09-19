<?php $title = 'BDoodle'; ?>

<?php ob_start(); ?>

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col"></div>
                <div class="col-10">
                    
                    <h1 class="display-4">Retrouvez-vous avec Doodle</h1> 
                    <p class="lead">Le plus simple pour choisir des dates, des lieux et plus.</p>
                    <a href="?section=create" class="btn btn-success" role="button" >Créer un sondage Doodle</a>
                </div>
                <div class="col"></div>
            </div>
        </div>       

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>