<?php

include_once 'StudentDetail.php';

$action=$_POST['action'];

switch($action){
    case 'studentData':
        $stId=$_POST['st_id'];
        $studentData=new StudentDetail();
        $res=$studentData->studentData($stId);
        echo json_encode($res);
        break;

    case 'subjectData':
        $stId=$_POST['st_id'];
        $subjectData=new StudentDetail();
        $res=$subjectData->subjectData($stId);
        echo json_encode($res);
        break;

    case 'addStudent':
        $name=$_POST['stName'];
        $standard=$_POST['stClass'];
        $addStudent=new StudentDetail();
        $res=$addStudent->addStudent($name,$standard);
        echo json_encode($res);
        break;

    case 'showStudent':
        $showStudent=new StudentDetail();
        $res=$showStudent->showStudent();
        echo json_encode($res);
        break;

    case 'remove':
        $stId=$_POST['st_id'];
        $remove=new StudentDetail();
        $res=$remove->remove($stId);
        echo $res;
        break;

    case 'subHide':
        $stId=$_POST['st_id'];
        $arr=$_POST;
        $subStore=new StudentDetail();
        $res=$subStore->subStore($stId,$arr);
        echo $res;
        break;

    case 'updateSub':
        $upVal=$_POST['up'];
        $subId=$_POST['subId'];
        $updateSub=new StudentDetail();
        $res=$updateSub->updateSub($subId,$upVal);
        echo $res;
        break;

    case 'removeSub':
        $subId=$_POST['subId'];
        $removeSub=new StudentDetail();
        $res=$removeSub->removeSub($subId);
        echo $res;
        break;

}