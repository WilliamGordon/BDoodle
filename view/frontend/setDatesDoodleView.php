<?php $title = 'BDoodle'; ?>

<?php ob_start(); ?>

<style>
    label {
        display:block;
    }

    .big-checkbox {
        width: 30px; 
        height: 30px;
    }
    #datesCol {
        margin-right: 20px;
    }
    
    .buttonSame {
        padding : 10px;
    }

    #addhoursCol {
        padding : 10px; 
    }

    #submit {
        padding-top : 20px;
        clear:both;
    }

    .HourColl {
        margin-right: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col-9">
        <h1 class="display-4">Quelles sont les propositions ? </h1>
        <p class="lead">Sélectionnez une ou plusieurs dates pour votre événement. Ajoutez des horaires si besoin est.</p>
                    <hr>
                    <br>
            <?php echo '<form name="dates_from" action="index.php?section=options&code='.$_GET['code'].'&nbposdate='.$_GET['nbposdate']. '" method="POST" onsubmit="return validate_form();" >' ?>
            <div class="col-12 ">
                <div id="inputSection">
                    <div id="datesCol" class="float-left">
                        <?php
                                    for ($i=1; $i <= $_GET['nbposdate']; $i++) 
                                    { 
                                        echo '<div>';
                                        echo    '<label>Date Possibles: ' . $i .'</label>';
                                        echo    '<input class="date form-control form-control-sm" type="date" name="dh'.$i.'[]">';
                                        echo    '<div class="invalid-feedback" id="errorDate'.$i.'"></div>';
                                        echo '<br>';
                                        echo '</div>';
                                    }
                                    ?>
                    </div>
                    <div class="HourColl float-left" id="hoursCol">
                        <?php
                                    for ($i=1; $i <= $_GET['nbposdate']; $i++) 
                                    {
                                        if($i == 1)
                                        {
                                            echo '<div id="buttonSame" class="float-left buttonSame">';
                                            echo '<input type="button" class="btn btn-secondary btn-sm" value="répliquer" onclick="SameHours(1)"/>';
                                            echo '</div>';
                                        } 
                                        if($i == 1)
                                        {
                                            echo '<div id="hoursColGrp1" class="float-left">';
                                            echo    '<label>Heure Possibles:</label>';
                                            echo    '<input class="hour HourGrp1 form-control form-control-sm" type="time" id="h1.'.$i.'" name="dh'.$i.'[]">';
                                            echo '<br>';
                                        } else 
                                        {
                                            echo    '<label>Heure Possibles:</label>';
                                            echo    '<input class="hour HourGrp1 form-control form-control-sm" type="time" id="h1.'.$i.'"  name="dh'.$i.'[]">';
                                            echo '<br>';
                                        }
                                    }
                                    echo '</div>'
                                ?>
                    </div>
                </div>
                <div id="addhoursCol" class="float-left">
                    <input type="button" id="button1" class="btn btn-secondary btn-sm" value="+" onclick="addAnotherRowOfHours(<?= $_GET['nbposdate']?>, 1)" />
                </div>
                <div id="submit">
                    <button type="submit" class="btn btn-primary">Créer l'événement</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>