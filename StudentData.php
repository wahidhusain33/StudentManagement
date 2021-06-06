<?php
    $student_id = isset($_GET['student_id'])?$_GET['student_id']:null; 
    // echo $student_id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
    <!--font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<script>
$(document).ready(function() {

    let stId = $("#stId").val();

    $.ajax({
        type: 'POST',
        url: 'helper.php',
        data: {
            'action': 'studentData',
            'st_id': stId,
        },
        success: function(res) {
            let res1 = JSON.parse(res);
            console.log(res1);
            for (let i = 0; i < res1.length; i++) {
                let row = $('<tr></tr>');
                let td1 = $('<td></td>').text(res1[i]['name']);
                let td2 = $('<td></td>').text(res1[i]['class']);
                row.append(td1, td2);
                $('.detail').append(row);
            }
        }
    });

    $.ajax({
        type: 'POST',
        url: 'helper.php',
        data: {
            'action': 'subjectData',
            'st_id': stId,
        },
        success: function(res) {
            let res1 = JSON.parse(res);
            console.log(res1);
            for (let i = 0; i < res1.length; i++) {
                let row = $('<tr></tr>');
                let td1 = $('<td></td>').text(res1[i]['sub_name']);
                let e1 = $("<input type='button' value='Update'>");
                e1.on('click', function() {
                    updateSub(res1[i]['sub_id']);
                });
                let e2 = $("<input type='button' value='Remove'>");
                e2.on('click', function() {
                    removeSub(res1[i]['sub_id']);
                });
                let td2 = $('<td></td>').append(e1, e2);
                row.append(td1, td2);
                $('.sub').append(row);
            }
        }
    });

    function updateSub(subId){
        let up=prompt("update your Subject");
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'subId': subId,
                'up':up,
                'action': 'updateSub'
            },
            success: function(res) {
                if(res!=0){
                    location.reload();
                }
            }
        });
    }

    function removeSub(subId){
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'subId': subId,
                'action': 'removeSub'
            },
            success: function(res) {
                if(res!=0){
                    location.reload();
                }
            }
        });
    }



});
</script>

<body>
    <div class="container">
        <h1>Student Details</h1>
        <table class="detail">
            <tr>
                <th>Name</th>
                <th>Class</th>
            </tr>
        </table>
        <h1>Student Subject</h1>
        <table class="sub">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </table>
        <input type="hidden" name="st_id" id="stId" value="<?php echo $student_id ?>">
    </div>
</body>

</html>