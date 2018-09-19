<?php

require('controller/mainController.php');

function allVarSetAndFiled($values) 
{
    $counter = 0;
    foreach($values as $value) 
    {
        if(isset($value) && !empty($value))
        {   
            $counter++;
        }
    }
                
    if(($counter == sizeof($values)) && sizeof($values) != 0)
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

try {
    if(isset($_GET['section'])){

        switch ($_GET['section']) {
            case 'create':

                if(isset($_POST['title'], $_POST['authorName'], $_POST['place'], $_POST['description'], $_POST['nbposdate']))
                {
                    if(!empty($_POST['title']) && !empty($_POST['authorName']) && !empty($_POST['place']) && !empty($_POST['description']) && !empty($_POST['nbposdate']))
                    {
                        $title      = $_POST['title'];
                        $authorName = $_POST['authorName'];
                        $place      = $_POST['place'];
                        $note       = $_POST['description'];
                        $nbposdate  = $_POST['nbposdate'];
                        createDoodle($title, $authorName, $place, $note, $nbposdate);
                    } else 
                    {
                        createFormDoodle();
                    }
                } else
                {
                    createFormDoodle();
                }
                break;
            case 'options':
                if(allVarSetAndFiled($_POST))
                {
                    $nbDates = sizeof($_POST);
                    $nbDatesCorrect = 0;
                    $today = new DateTime(date('Y-m-d'));
                    foreach ($_POST as $key => $value) {
                        $newDate = new DateTime($value[0]);
                        if($newDate >= $today)
                        {
                            $nbDatesCorrect++;
                        }
                    }

                    if(($nbDates == $nbDatesCorrect) && $nbDates != 0)
                    {
                        setDatesDoodle($_POST, $_GET['code']);
                    } else {
                        DatesFormDoodle($_GET['nbposdate']);
                    }

                } else 
                {
                    DatesFormDoodle($_GET['nbposdate']);
                }

                break;
            case 'emails':
                if(allVarSetAndFiled($_POST))
                {
                    SendEmails($_POST, $_GET['code']);
                } else
                {
                    ShowEmailPage($_GET['code']);
                }
                break;
            case 'choices':
                if(allVarSetAndFiled($_POST))
                {
                    addChoicesDoodle($_POST, $_GET['code']);
                } elseif (isset($_POST['new_participant']) && !empty($_POST['new_participant'])) 
                {
                    addParticipantWithoutChoice($_POST, $_GET['code']);
                }
                choiceFormTableDoodle($_GET['code']);
                break;
        } 
    } else 
    {
        landingPage();
    }

} catch (Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}
