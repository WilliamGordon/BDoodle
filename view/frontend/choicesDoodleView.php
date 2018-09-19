<?php $title = 'BDoodle'; ?>

<?php ob_start(); ?>

<style>

    .whitebg{
        background-color: white;
    }

    .greenishbg{
        background-color: #CDEAA1
    }

</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col"></div>
                <div class="col-8">
                    <h1 class="display-4"> <?= $infoEvent[0]['title'] ?> </h1>
                    <hr>
                    <p class="lead">Evénement créé par <?= $infoEvent[0]['author_name'] ?> </p>
                    <?php
                        if(!is_null($infoEvent[0]['place'])) {echo '<p class="lead"> <span class="font-weight-bold">Lieu:</span>  '. $infoEvent[0]['place'] .'</p>';}
                        if(!is_null($infoEvent[0]['place'])) {echo '<p class="lead"> <span class="font-weight-bold">Note:</span>  '. $infoEvent[0]['note'] .'</p>'; }
                    
                        $datesEvent
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col"></td>
                                <?php foreach ($datesEvent as $date) {?>
                                <td class="text-center" scope="col">
                                    <?= getMonthFirstLetters($date['MONTH(date)'])?> <br> 
                                    <span class="font-weight-bold"><?= $date['DAY(date)']?> </span> <br> 
                                    <?= getFrenchDay($date['DAYNAME(date)'])?> <br> 
                                    <?= getHours($date['hour'])?> 
                                </td> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form action="#" method="POST">
                                    <th class="w-25" scope="row">
                                    <?php
                                        if(isset($_POST['new_participant']) && !empty($_POST['new_participant'])) 
                                        {
                                            echo '<input class="form-control is-valid" type="text" name="new_participant" placeholder=" Nouveau Participant"';
                                            echo ' value="' . $_POST['new_participant']   . '"';
                                            echo '>';
                                        } else if (isset($_POST['new_participant']) && empty($_POST['new_participant'])) 
                                        {
                                            echo '<input class="form-control is-invalid" type="text" name="new_participant" placeholder=" Nouveau Participant ">';
                                            echo '<div class="invalid-feedback"> Veuillez donner un nom </div>';
                                        } else
                                        {
                                            echo '<input class="form-control"type="text" name="new_participant" placeholder=" Nouveau Participant">';
                                        }
                                    ?>
                                    </th>
                                    <?php $counter=1; foreach ($datesEvent as $date) {?>
                                    <td class="text-center" id="cb<?=$counter?>" scope="col"> 
                                        <input class=" big-checkbox" type="checkbox" name="id_date_pos_choosen[]" id="cb<?=$counter?>cb<?=$counter?>" onclick="greenCell('cb<?=$counter?>')" value=<?= $date['id_pos_date'] ?>>
                                    </td> <?php $counter++; } ?>
                                    <td>
                                        <input type="submit">
                                    </td>
                                </form>

                            </tr>
                            <?php 
                            
                            foreach (array_reverse($MappedParticipantsAndChoices) as $participants => $choices) 
                            {
                            echo '<tr><th scope="row">' . $participants . '</th>';
                                foreach ($possibleDates as $date) 
                                {
                                    $selected = false;
                                    foreach ($choices as $value) 
                                    {
                                        if($date[0] == $value)
                                        {
                                            $selected = true;
                                        }
                                    }
                                    if($selected)
                                    {
                                        echo '<td class="text-center" bgcolor="#CDEAA1"><i class="fas fa-check"></i></td>';
                                    } else 
                                    {
                                        echo '<td class="text-center" bgcolor="#FCEDE9"></td>';
                                    }
                                }
                            echo '</tr>';
                            } 
                            
                            ?>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="lead">Résultat : </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col"></td>
                                <?php foreach ($datesEvent as $date) {?>
                                <td scope="col"> 
                                    <?= getMonthFirstLetters($date['MONTH(date)'])?> <br> 
                                    <?= $date['DAY(date)']?> <br> 
                                    <?= getFrenchDay($date['DAYNAME(date)'])?> <br> 
                                    <?= getHours($date['hour'])?> 
                                </td> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Résultats</th>
                                <?php
                                foreach ($endResults as $res) 
                                {
                                    if($res == sizeof($MappedParticipantsAndChoices) && sizeof($MappedParticipantsAndChoices) != 0)
                                    {
                                        echo "<td bgcolor='#28A745'></td>";
                                        $perfectDate = true;
                                    } elseif ($res >= (sizeof($MappedParticipantsAndChoices)/2) && sizeof($MappedParticipantsAndChoices) != 0 && sizeof($MappedParticipantsAndChoices) != 2)
                                    {
                                        echo "<td bgcolor='#FFC107'></td>";
                                    } 
                                    else 
                                    {
                                        echo "<td></td>";
                                    }
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <p class="lead">Légende: 
                        <span class="badge badge-success">Perfect date</span>
                        <span class="badge badge-warning">Popular date</span>
                    </p>
                </div>
                <div class="col"></div>
            </div>
        </div>       

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>