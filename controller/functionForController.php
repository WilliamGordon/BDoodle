<?php 

function getMonthFirstLetters($numMonth)
{
    switch ($numMonth) {
        case '1':
            return "janv.";
            break;
        case '2':
            return "févr.";
            break;
        case '3':
            return "mars";
            break;
        case '4':
            return "avril" ;
            break;
        case '5':
            return "mai";
            break;
        case '6':
            return "juin";
            break;
        case '7':
            return "juil.";
            break;
        case '8':
            return "août";
            break;
        case '9':
            return "sept.";
            break;
        case '10':
            return "octo.";
            break;
        case '11':
            return "nove.";
            break;
        case '12':
            return "déce.";
            break;
    }
}

function getFrenchDay($engDay)
{
    switch ($engDay) {
        case 'Monday':
            return "LUN."; 
            break;
        case 'Tuesday':
            return "MAR."; 
            break;
        case 'Wednesday':
            return "MER."; 
            break;
        case 'Thursday':
            return "JEU."; 
            break;
        case 'Friday':
            return "VEN."; 
            break;
        case 'Saturday':
            return "SAM."; 
            break;
        case 'Sunday':
            return "DIM."; 
            break;
    }
}

function getHours($hour)
{
    return substr($hour, 0, -3);
}