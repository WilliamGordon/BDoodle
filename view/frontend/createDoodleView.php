<?php $title = 'BDoodle'; ?>

<?php ob_start(); ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col"></div>
                <div class="col-4">
                    <h1 class="display-4">Créer un Doodle </h1>
                    <hr>
                    <form action="index.php?section=create" method="POST">
                        <div class="form-group">
                            <label>Nom de l'événement</label>
                            <?php
                                if(isset($_POST['title']) && !empty($_POST['title'])) 
                                {
                                     echo '<input type="text" class="form-control form-control-sm is-valid"';
                                     echo 'value="' . $_POST['title'] . '"';
                                     echo'name="title" placeholder="Pour quelle occasion ?">';
                                } 
                                else if (isset($_POST['title'])&& empty($_POST['nbposdate'])) 
                                {
                                    echo '<input type="text" class="form-control form-control-sm is-invalid"';
                                    echo'name="title" placeholder="Pour quelle occasion ?">';
                                    echo '<div class="invalid-feedback">Veuillez donner un nom pour votre événement</div>';
                                }
                                else 
                                {
                                    echo '<input type="text" class="form-control form-control-sm" name="title" placeholder="Pour quelle occasion ?">';
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Nom de l'auteur</label>
                            <?php
                                if(isset($_POST['authorName']) && !empty($_POST['authorName'])) 
                                {
                                     echo '<input type="text" class="form-control-sm form-control is-valid"';
                                     echo 'value="' . $_POST['authorName'] . '"';
                                     echo'name="authorName" placeholder="Votre nom">';
                                } 
                                else if (isset($_POST['authorName'])&& empty($_POST['nbposdate'])) 
                                {
                                    echo '<input type="text" class="form-control-sm form-control is-invalid"';
                                    echo'name="authorName" placeholder="Votre nom">';
                                    echo '<div class="invalid-feedback">Veuillez ajouter votre nom</div>';
                                    
                                }
                                else 
                                {
                                    echo '<input type="text" class="form-control-sm form-control" name="authorName" placeholder="Votre nom">';
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Lieu</label>
                            <?php
                                if(isset($_POST['place']) && !empty($_POST['place'])) 
                                {
                                     echo '<input type="text" class="form-control-sm form-control is-valid"';
                                     echo 'value="' . $_POST['place'] . '"';
                                     echo'name="place" placeholder="Lieu ou ce déroulera l&apos;événement">';
                                } 
                                else if (isset($_POST['place'])&& empty($_POST['place'])) 
                                {
                                    echo '<input type="text" class="form-control-sm form-control is-invalid"';
                                    echo'name="place" placeholder="Lieu ou ce déroulera l&apos;événement">';
                                    echo '<div class="invalid-feedback">Veuillez ajouter un lieu</div>';
                                }
                                else 
                                {
                                    echo '<input type="text" class="form-control-sm form-control" name="place" placeholder="Lieu ou ce déroulera l&apos;événement">';
                                }
                            ?>

                        </div>
                        
                        <div class="form-group">
                            <label>Note</label>
                            <?php
                            if(isset($_POST['description']) && !empty($_POST['description'])) 
                                {
                                     echo '<input type="text" class="form-control-sm form-control is-valid"';
                                     echo 'value="' . $_POST['description'] . '"';
                                     echo'name="description" placeholder="Description de l&apos;événement">';
                                } 
                                else if (isset($_POST['description'])&& empty($_POST['nbposdate'])) 
                                {
                                    echo '<input type="text" class="form-control-sm form-control is-invalid"';
                                    echo'name="description" placeholder="Description de l&apos;événement">';
                                    echo '<div class="invalid-feedback">Veuillez ajouter une note</div>';
                                }
                                else 
                                {
                                    echo '<input type="text" class="form-control-sm form-control" name="description" placeholder="Description de l&apos;événement">';
                                }
                            ?>

                        </div>

                        <div class="form-group">
                            <label>Combien de date possible ?</label>
                            <?php
                            if(isset($_POST['nbposdate']) && !empty($_POST['nbposdate'])) 
                                {
                                     echo '<input type="number" class="form-control-sm form-control is-valid placeholder="maximum 10" "';
                                     echo 'value="' . $_POST['nbposdate'] . '"';
                                     echo'name="nbposdate" >';
                                } 
                                else if (isset($_POST['nbposdate']) && empty($_POST['nbposdate'])) 
                                {
                                    echo '<input type="number" class="form-control-sm  form-control is-invalid" placeholder="maximum 10"';
                                    echo'name="nbposdate" >';
                                    echo '<div class="invalid-feedback">Veuillez ajouter nombre de dates possibles</div>';
                                }
                                else 
                                {
                                    echo '<input type="number" placeholder="maximum 10" class="form-control-sm form-control" name="nbposdate">';
                                }
                            ?>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Créer l'événement</button>
                </form>
                </div>
                <div class="col"></div>
            </div>
        </div>       

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>