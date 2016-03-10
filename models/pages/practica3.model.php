<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 26/2/16
 * Time: 12:01
 */


class PagesPractica3Model extends Model{

    public function getData($id){

        $query = <<<QUERY
            SELECT *
            FROM instrument
            WHERE id = $id
QUERY;

        $result = $this->getAll($query);

        return $result;

    }

    public function getDataByType($type){

        $query = <<<QUERY
            SELECT *
            FROM instrument
            WHERE type = "$type"
QUERY;

        $result = $this->getAll($query);

        return $result;

    }

    public function getTotalInstruments(){

        $query = <<<QUERY
            SELECT count(*) as total
            FROM instrument
QUERY;

        $result = $this->getAll($query);

        return $result;

    }

    public function getAllData()
    {

        $query = <<<QUERY
            SELECT *
            FROM instrument
QUERY;

        $result = $this->getAll($query);

        return $result;
    }

    public function getAllDataOrderById()
    {

        $query = <<<QUERY
            SELECT *
            FROM instrument
            ORDER BY id
QUERY;

        $result = $this->getAll($query);

        return $result;
    }


    public function getNumInstrumentsByType($type)
    {
        $query = <<<QUERY
            SELECT count(*) as num
            FROM instrument
            WHERE type = "$type"
QUERY;
        $result = $this->getAll($query);


        return $result;
    }


    public function insertInstrument($name, $type, $url){
        $query = <<<QUERY
            INSERT INTO instrument (name, type, url)
            VALUES ("$name", "$type", "$url")
QUERY;

        $this->execute($query);

    }

    public function borrarInstrument($id){
        $query = <<<QUERY
            DELETE FROM instrument
            WHERE id = "$id"
QUERY;

        $this->execute($query);

    }

    public function editarInstrument($id, $name, $type, $url){
        $query = <<<QUERY
            UPDATE instrument
            SET name = "$name", type = "$type", url = "$url"
            WHERE id = "$id"
QUERY;

        $this->execute($query);

    }
}