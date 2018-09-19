<?php $title = 'BDoodle'; ?>

<?php ob_start(); ?>


<style>

    #submitBox {
            clear:both;
        }
    #emailWrapper {
        padding-right:20px;
        margin-left:5%;
    }

    #inputbox {
        width:100%;
    }

    </style>

<script>

    function addEmail()
        {
            //CREATE FORM GROUP DIV
            var newDiv = document.createElement("div");
            newDiv.setAttribute("class", "form-group");
            

            //CREATE NEW INPUT
            var newInputEmail = document.createElement("Input");
            newInputEmail.setAttribute("type", "email");
            newInputEmail.setAttribute("class", "form-control");
            var newInputName = "email[]"; 
            newInputEmail.setAttribute("name", newInputName);
            newInputEmail.setAttribute("placeholder", "Email d'un participant");
            
            
            document.getElementById("emailWrapper").appendChild(newDiv);
            newDiv.appendChild(newInputEmail);
        }
</script>

<?php

$host = "http://$_SERVER[HTTP_HOST]";
$script_name = $_SERVER['SCRIPT_NAME'];
$section = "?section=choices";
$code = "&code=".$_GET['code'];
$url = $host . $script_name . $section . $code;




?>


<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col-6"><h1 class="display-4 text-center"> Inviter les participants via Mail</h1></div>
        <div class="col"></div>
    </div>

    <div class="row text-center">
        <div class="col"></div>
        <div class="col-3">
            <p class="lead">Insérez les emails des participants</p>
            <?php echo '<form action="index.php?section=emails&code='.$_GET['code'].'" method="POST">' ?>
                <div id="inputBox">
                    <div id="emailWrapper" class="left">
                    <div id="emailBox" class="form-group">
                        <input type="email" class="form-control" name="email[]" placeholder="Email d'un participant">
                    </div>
                    </div>
                    <div id="addSubButtonBox" class="left">
                        <input type="button" class="btn btn-secondary btn-sm" value="+" onclick="addEmail()">
                    </div>
                    </div>
            <div id="submitBox" class="form-group">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            </form>
            
        </div>
        
        <div class="col"></div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <br>
            <br>
            <br>
            <p class="lead">Ou partagez ces lien avec les participants</p>
            <p><?= $url?></p>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>