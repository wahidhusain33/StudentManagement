<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
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
    $("[type='submit']").on('click', e => {
        e.preventDefault();
        let stName = $("#stud").val();
        let stClass = $("#studClass").val();
        // alert(stName + stClass);
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'action': 'addStudent',
                'stName': stName,
                'stClass': stClass
            },
            success: function(res) {
                let res1 = JSON.parse(res);
                console.log(res1);
                let row = $('<tr></tr>');
                let th1 = $('<th></th>').text('Name');
                let th2 = $('<th></th>').text('Class');
                let th3 = $('<th></th>').text('Add Subjects');
                let th4 = $('<th></th>').text('Action');
                row.append(th1, th2, th3, th4);
                $('.detail').append(row);
                for (let i = 0; i < res1.length; i++) {
                    let row = $('<tr></tr>');
                    let td1 = $('<td></td>').text(res1[i]['name']);
                    let td2 = $('<td></td>').text(res1[i]['class']);
                    console.log(res1[i]['id']);
                    let td3 = $('<td></td>').append(
                        "<button><a href='SubjectAdd.php?student_id=" + res1[i]['id'] +
                        "' target='_blank'>View Detail</a></button>");
                    let e1 = $("<input type='button' value='Update'>");
                    let e2 = $("<input type='button' value='Remove'>");
                    let e3 = $("<input type='button' value='View'>");
                    let td4 = $('<td></td>').append(e1, e2, e3);
                    e2.on('click', function() {
                        removeIt(res1[i]['id']);
                    })
                    row.append(td1, td2, td3, td4);
                    $('.detail').append(row);
                }
            }
        });
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'action': 'showStudent'
            },
            success: function(res) {
                let res1 = JSON.parse(res);
                console.log(res1);
                let row = $('<tr></tr>');
                let th1 = $('<th></th>').text('Name');
                let th2 = $('<th></th>').text('Class');
                let th3 = $('<th></th>').text('Add Subjects');
                let th4 = $('<th></th>').text('Action');
                row.append(th1, th2, th3, th4);
                $('.detail').append(row);
                for (let i = 0; i < res1.length; i++) {
                    let row = $('<tr></tr>');
                    let td1 = $('<td></td>').text(res1[i]['name']);
                    let td2 = $('<td></td>').text(res1[i]['class']);
                    console.log(res1[i]['id']);
                    let td3 = $('<td></td>').append(
                        "<button><a href='SubjectAdd.php?student_id=" + res1[i]['id'] +
                        "' target='_blank'>View Detail</a></button>");
                    let e1 = $("<input type='button' value='Update'>");
                    let e2 = $("<input type='button' value='Remove'>");
                    let e3 = $("<input type='button' value='View'>");
                    let td4 = $('<td></td>').append(e1, e2, e3);
                    e2.on('click', function() {
                        removeIt(res1[i]['id']);
                    })
                    row.append(td1, td2, td3, td4);
                    $('.detail').append(row);
                }
            }
        });
    });

    function removeIt(st_id) {
        console.log(st_id);
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'st_id': st_id,
                'action': 'remove'
            },
            success: function(res) {
                console.log(res);
            }
        });
    }
});
</script>

<body>
    <div class="container">
        <form action="" method="POST" class="addStud">
            <div class="row">
                <div class="col-25">
                    <label for="stud">Name : </label>
                </div>
                <div class="col-75">
                    <input type="text" name="stName" id="stud">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="studClass">Class</label>
                </div>
                <div class="col-75">
                    <input type="text" id="studClass" name="stClass">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
        <table class="detail">
            <tbody>

            </tbody>
        </table>
    </div>
</body>

</html>