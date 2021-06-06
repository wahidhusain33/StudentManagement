<?php

include_once 'DbCon.php';

class StudentDetail{
    public $name;
    public $standard;
    function __construct()
    {

        $db = new Dbcon();
        $this->conn = $db->conn;
    }
    public function studentData($stId){
        $res=array();
        $sql="SELECT * FROM `student_detail` WHERE `id`='$stId'";

        $result=$this->conn->query($sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        }
        else{
            return 0;
            }
    }
    public function subjectData($stId){
        $res=array();
        $sql="SELECT * FROM `subject_detail` WHERE `st_id`='$stId'";

        $result=$this->conn->query($sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        }
        else{
            return 0;
            }
    }
    function addStudent($name,$standard){
        $this->name=$name;
        $this->standard=$standard;
        $sql="INSERT INTO `student_detail` (`name`,`class`) VALUES('$this->name','$this->standard')";
        if($this->conn->query($sql)==TRUE){
            // return 1;
            $res=array();
            $squery="SELECT * FROM `student_detail`";
            $result=$this->conn->query($squery);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    $res[]=$row;
                }
                return $res;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }
    function showStudent(){
        $res=array();
        $sql="SELECT * FROM `student_detail`";

        $result=$this->conn->query($sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        }
        else{
            return 0;
            }
    }

    function remove($stId){
        $sql="DELETE FROM `student_detail` WHERE `id`='$stId'";

        if ($this->conn->query($sql) === TRUE) {
            echo 1;
          } else {
            echo 0;
          }
    }

    function subStore($stId,$arr){
        $count=count($arr);
        $st=(int)$stId;
        foreach($arr as $key=>$val){
            if($arr[$key]=='subHide'){
                continue;
            }
            else if($arr[$key]==$stId){
                continue;
            }
            else{
                $sql="INSERT INTO `subject_detail` (`sub_name`,`st_id`) VALUES('";
                $sql.=$val . "' , '";
                $sql.=$st . "')";
            }
        }
         if($this->conn->query($sql)==TRUE){
                    return $st;
                }
                else{
                    return 0;
                }
       
    }

    function removeSub($subId){
        $sql="DELETE FROM `subject_detail` WHERE `sub_id`='$subId'";

        if ($this->conn->query($sql) === TRUE) {
            echo 1;
          } else {
            echo 0;
          }
    }
    function updateSub($subId,$upVal){
        $sql="UPDATE `subject_detail` SET `sub_name`='$upVal' WHERE `sub_id`='$subId'";
        if ($this->conn->query($sql) === TRUE) {
            echo 1;
          } else {
            echo 0;
          }
    }
}