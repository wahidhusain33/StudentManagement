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
    <title>Add Subject</title>
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
$(document).ready(function(){
    let i=2;
        $("[name='addMoreSub']").on('click',()=>{
            let inp=$("<input>");
            inp.attr({
                "name":'sub'+i,
                "type":'text'
            });
            i++;
            $("[name='addMoreSub']").before(inp);
        });
        $("[name='save']").on('click',e=>{
            // console.log($("form").serialize());
            e.preventDefault();
            // console.log(formdata);
                $.ajax({
                type:"POST",
                url:"helper.php",
                data:$("form").serialize(),
                success:function(res){
                    console.log(res);
                    if(res!=0){
                        window.location.href="StudentData.php?student_id=" + res;
                    }
                }
            });
        });
        

})
</script>

<body>
    <div class="container">
        <form action="" id="subForm">
            <span>Enter Subject :</span><br>
            <input type="text" name="sub1">
            <input type="button" name="addMoreSub" value="Add More+">
            <input type="hidden" name="action" value="subHide">
            <input type="hidden" name="st_id" value="<?php echo $student_id ?>">
            <input type="submit" name="save" value="Save">
        </form>

    </div>
</body>

</html>