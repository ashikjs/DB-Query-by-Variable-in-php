<?php
class Functions {
    function DbConnection(){
        $host = 'localhost';
        $database = 'hotel_management';
        $user = 'root';
        $password = '';

        $conn = new mysqli($host, $user, $password, $database);

        if($conn->connect_errno){
            return false;
        }
        else{
            return $conn;
        }
    }
    function getResults($str){
        $con = $this->DbConnection();
        if($con){
            $data = array();
            $sql =  $str;

            $qry = $con->query($sql);

            if($qry->num_rows>0){
                while ($row= $qry->fetch_object()){
                    $data[] = $row;
                }
            }
            else{
                $data = null;
            }
            return $data;
        }
        else{
            return null;
        }
    }

    function insertData($str){
        $con = $this->DbConnection();
        if ($con->query($str) === TRUE) {
            return "Saved successfully";
        } else {
            return "Error: " . $str . "<br>" . $con->error;
        }
    }


    function updateData($str){
        $con = $this->DbConnection();
        if ($con->query($str) === TRUE) {
            return "Updated successfully";
        } else {
            return "Error: " . $str . "<br>" . $con->error;
        }
    }

    function updateResults($db_table, $filter, $values){
        $con = $this->DbConnection();
        if($con){
            $sql =  "UPDATE ".$db_table." SET ".$values." WHERE ".$filter;
            if ($con->query($sql) === TRUE) {
                $message =  "Record updated successfully";
            } else {
                $message =  "Error updating record: " . $con->error;
            }
            return $message;
        }
        else{
            return null;
        }
    }
    function getUserInfo(){

    }
}
