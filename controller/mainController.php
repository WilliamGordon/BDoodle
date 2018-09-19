<?php

use \Wil\BDoodle\Model\DoodleManager;

require('model/DoodleManager.php');
require('functionForController.php');

function landingPage()
{
    require('view/frontend/landingPage.php');
}

function createFormDoodle() 
{
    require('view/frontend/createDoodleView.php');
}

function DatesFormDoodle() 
{
    require('view/frontend/setDatesDoodleView.php');
}

function ShowEmailPage()
{
    require('view/frontend/EmailPageView.php');
}

function SendEmails($emails, $hash)
{
    $showInfo = new DoodleManager();
    $infoEvent      = $showInfo->getInfoEvent($hash);


    foreach ($emails['email'] as $email) {
        echo $email;
    }
    $host = "http://$_SERVER[HTTP_HOST]";
    $script_name = $_SERVER['SCRIPT_NAME'];
    $section = "?section=choices";
    $code = "&code=".$hash;
    $title = $infoEvent[0]['title'];
    $place = $infoEvent[0]['place'];
    $note = $infoEvent[0]['note'];
    $author_name = $infoEvent[0]['author_name'];

    $url = $host . $script_name . $section . $code;
    // // the message
    $subject = "Doodle de " . $author_name;
    $message = "<h1>".$author_name." vous invite à un événement!</h1>";
    $message .= "<p>Participez au doodle à l'adresse suivante</p>\n";
    $message .= $url;

    $header = "From:williamtestdoodle@gmail.c \r\n";
    $header .= "Content-type: text/html\r\n";

    //mail(to,subject,message);
    
    foreach ($emails['email'] as $email) {
        mail($email, $subject, $message, $header);
    }
    header('location:index.php?section=choices&code='.$hash);
}


function createDoodle($title, $author_name, $place, $note, $nbposdate)
{
    $newDoodleInsert = new DoodleManager();
    $newDoodleInsert->addDoodle($title, $author_name, $place, $note);
    $id = $newDoodleInsert->getIdEvent($title, $author_name, $place, $note);
    $newDoodleInsert->updateHash($id['id_event']);
    $hash = $newDoodleInsert->getHash($id['id_event']);

    if(!$newDoodleInsert) {
        throw new Exception("Vous n'avez pas tout rempli");
    } else {
        header('location:index.php?section=options&code='.$hash['hash'].'&nbposdate='.$nbposdate);
    } 
}

function setDatesDoodle($possibleDates, $hash)
{
    $datesInsert = new DoodleManager();
    $id = $datesInsert->getIdFromHash($hash);

    for ($i=1; $i <= sizeof($possibleDates); $i++) { 
        for ($j=1; $j < sizeof($possibleDates['dh1']) ; $j++) { 
            $datesInsert->addDate($possibleDates['dh'.$i][0], $possibleDates['dh'.$i][$j],  $id['id_event']);
        }
    }

    header('location:index.php?section=emails&code='.$hash);
}



function choiceFormTableDoodle($hash) {

    $showInfo = new DoodleManager();
    $infoEvent      = $showInfo->getInfoEvent($hash);
    $idEvent        = $showInfo->getIdFromHash($hash);
    $datesEvent     = $showInfo->getDatesEvent($idEvent['id_event']);
    $participants   = $showInfo->getParticipants($idEvent['id_event']);
    $possibleDates  = $showInfo->getIdPosDates($idEvent['id_event']);
    $allpart        = $showInfo->NameParticipants($idEvent['id_event']);

    $results = [];

    foreach ($participants as $key => $value0) {
        $newArray = [];
        $choices = $showInfo->getChoiceForOneParticipant($value0[1], $idEvent['id_event']);
        foreach ($choices as $key => $value) {
            array_push($newArray, $value['id_pos_date']);
        }
        array_push($results, $newArray);
    }
    
    $MappedParticipantsAndChoices = [];

    for ($i=0; $i < sizeof($results); $i++) { 
        $MappedParticipantsAndChoices[$participants[$i][0]] = $results[$i];
    }

    $endResults = array_fill(0, sizeof($possibleDates), 0);

    foreach ($MappedParticipantsAndChoices as $participants => $choices) 
    {
         $i = 0;
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
                $endResults[$i]++;
            } 
            $i++;
        }
    }
     require('view/frontend/choicesDoodleView.php');
}

function addParticipantWithoutChoice($participantName, $hash)
{
    $doodleManager = new DoodleManager();
    $idEvent = $doodleManager->getIdFromHash($hash);
    $doodleManager->addNewParticipant($choices['new_participant'], $idEvent['id_event']);
    $newParticipantId = $doodleManager->getNewParticipantID($choices['new_participant'], $idEvent['id_event']);

}

function addChoicesDoodle($choices, $hash)
{
    $doodleManager = new DoodleManager();
    $idEvent = $doodleManager->getIdFromHash($hash);

    $participants2 = $doodleManager->getParticipants($idEvent['id_event']);

    $alreadyParticipating = false;

    foreach ($participants2 as $participant)
    {
        if($choices['new_participant'] == $participant[0])
        {
            $alreadyParticipating = true;
        } 
    }

    if(!$alreadyParticipating)
    {
        $doodleManager->addNewParticipant($choices['new_participant'], $idEvent['id_event']);
        $newParticipantId = $doodleManager->getNewParticipantID($choices['new_participant'], $idEvent['id_event']);
    
        //Si l'id du participant est un id qui existe déja ne fait pas l'insertion de donnée car lorsque l'on rafraichit la page on réinsert les mêmes données une nouvelle fois!!;
        $IdsParticipants = $doodleManager->getIdsParticipantsChoices($idEvent['id_event']);
        $alreadyInserted = false;
        foreach ($IdsParticipants as $id) 
        {
            if($id[0] == $newParticipantId['id_participant']) 
            {
                $alreadyInserted = true;
            }
        }
        
        if(!$alreadyInserted)
        {
            if(isset($_POST['id_date_pos_choosen']) && !empty($_POST['id_date_pos_choosen']))
            foreach($_POST['id_date_pos_choosen'] as $id_date_pos_choosen){
                $doodleManager->addChoices($newParticipantId['id_participant'], $idEvent['id_event'], $id_date_pos_choosen);
            }
        }
    }
    
}


