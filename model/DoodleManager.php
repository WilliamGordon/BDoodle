<?php
namespace Wil\BDoodle\Model;
require_once("model/Manager.php");

class DoodleManager extends Manager
{
    public function addDoodle($title, $author_name, $place, $note)
    {
        $sql = "INSERT INTO events (title, author_name, place, note) 
                VALUES (:title, :author_name, :place, :note)";

        $data = [
                'title'         => $title,
                'author_name'   => $author_name,
                'place'         => $place,
                'note'          => $note
                ];

        $pdo = $this->dbConnect();
        $newDoodleInsert= $pdo->prepare($sql);
        $newDoodleInsert->execute($data);

        return $newDoodleInsert;
    }

    public function getHash($id_event)
    {
        $sql = "SELECT hash 
                FROM events 
                WHERE   id_event = :id_event"; 

        $data = [
                'id_event'         => $id_event,
                ];

        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch();
    }

    public function getIdFromHash($hash) 
    {
        $sql = "SELECT id_event 
                FROM events 
                WHERE   hash = :hash"; 

        $data = [
                'hash'         => $hash,
                ];

        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch();
    }

    public function updateHash($id_event) 
    {
        $sql = "UPDATE events SET hash = :hash WHERE id_event = :id_event";
        
        $data = [
            'hash'         => hash("md5", $id_event),
            'id_event'     => $id_event,
            ];
            
        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getIdEvent($title, $author_name, $place, $note) 
    {
        $sql = "SELECT id_event 
                FROM events 
                WHERE   title = :title 
                    AND author_name = :author_name 
                    AND place = :place 
                    AND note = :note";

        $data = [
            'title'         => $title,
            'author_name'   => $author_name,
            'place'         => $place,
            'note'          => $note
            ];

        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetch();
    }

    public function addDate($date, $hour, $id_event)
    {
        $data = [
            'date'      => $date,
            //'hour'      => $k,
            'id_event'  => $id_event
            ]; 

        $sql = "INSERT INTO possible_dates (date, hour, id_event) VALUES (:date, '".$hour."', :id_event)";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt;
    }

    public function getInfoEvent($hash)
    {
         $data = [
            'hash'  => $hash
            ]; 

        $sql = "SELECT title, author_name, place, note FROM events WHERE hash = :hash";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetchall();
    }

    public function getDatesEvent($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ]; 

        $sql = "SELECT MONTH(date), DAY(date), DAYNAME(date),  id_pos_date, hour  FROM possible_dates WHERE id_event = :id_event ORDER BY DATE ASC";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetchall();
    }

    public function getParticipantsNameAndId($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ];

        $sql = "SELECT DISTINCT participants.firstname, participants.id_participant FROM participants INNER JOIN choice_dates ON choice_dates.id_participant = participants.id_participant WHERE choice_dates.id_event = '".$idEvent."'";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        return $participants = $stmt->fetchAll();
    }

    public function getParticipants($idEvent)
    {
         $data = [
            'id_event'  => $idEvent
            ];

        $sql = "SELECT firstname, id_participant FROM participants WHERE id_event = '".$idEvent."'";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        return $participants = $stmt->fetchAll();
    }


    public function NameParticipants($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ];

        $sql = "SELECT id_participant FROM participants WHERE id_event = :id_event";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        return $participants = $stmt->fetchAll();
    }


    public function getIdsParticipants($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ];

        $sql = "SELECT id_participant FROM participants WHERE id_event = :id_event";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        return $participants = $stmt->fetchAll();
    }

     public function getIdPosDates($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ]; 

        $sql = "SELECT id_pos_date FROM possible_dates WHERE id_event = :id_event ORDER BY DATE ASC";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetchall();
    }


    public function getChoiceForOneParticipant($idParticipant, $id_event) 
    {
         $data = [
            'id_event'       => $id_event,
            'id_participant' => $idParticipant
            ]; 

        $sql = "SELECT id_pos_date FROM choice_dates WHERE id_event = :id_event AND id_participant = :id_participant";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetchall();
    }


    public function addNewParticipant($firstName, $id_event)
    {

        $data = [
            'id_event'      => $id_event,
            'firstname'     => $firstName
            ]; 



        $sql = "INSERT INTO participants (firstname, id_event) VALUES (:firstname, :id_event)";
        
        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

    }

    public function getNewParticipantID($firstName, $id_event)
    {
        $data = [
            'id_event'      => $id_event,
            'firstname'     => $firstName
            ]; 

        $sql = "SELECT id_participant FROM participants WHERE firstname = :firstname AND id_event = :id_event";
        
        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch();
    }

    public function addChoices($participantId, $id_event, $idPosDate)
    {
        $data = [
            'id_participant'    => $participantId,
            'id_pos_date'       => $idPosDate,
            'id_event'          => $id_event
            ]; 

        $sql = "INSERT INTO choice_dates (id_participant, id_pos_date, id_event) VALUES (:id_participant, :id_pos_date, :id_event)";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getIdsParticipantsChoices($idEvent)
    {
        $data = [
            'id_event'  => $idEvent
            ];

        $sql = "SELECT id_participant FROM choice_dates WHERE id_event = :id_event";

        $pdo = $this->dbConnect();
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        return $participants = $stmt->fetchAll();
    }

}