<?php include_once __DIR__. '\header.php';
include_once '..\dbHelper\dbhelper.php';




?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<div class="main-content" >
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Pending Professor Approval</h4>
            </div>
            <div class="alert alert-success alert-has-icon" id="messegeBlock" style="display: none">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    <label id="messege">Student Details Updated Sucessfully.</label>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Professor Name</th>
                            <th>Registration date</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>course</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $rows =(new dbhelper)->__getPendingAprovalProfessor();
                        if($rows != 0 )
                        {
                            $i=1;
                            foreach ($rows as $row){
                                $uid=$row['user_id'];
                                $date=$row['registration_date'];
                                $fname= $row['first_name'] ;
                                $laname =$row['last_name'];
                                $phone=$row['phone'];
                                $email=$row['email'];
                                $course=$row['course'];


                                echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$fname.'&nbsp;'.$laname.' </td>
                        <td>'.$date.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phone.'</td>
                        <td>'.$course.'</td>
                        <td><input href="#" data-toggle="modal" data-target="#aprove" onclick="assignValues(id);" type="button" id="'.$uid.'" class="btn btn btn-primary" value="Aprove"> &nbsp;&nbsp;&nbsp;<input type="button" id="'.$uid.'" class="btn btn-warning" value="Reject"></td>
                    </tr>';
                                $i++;
                            }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="aprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="card">
                <div class="card-header">
                    <h4>Card distribution for students</h4>
                </div>
                <div class="card-body">
                    <form id="aprovalForm" action="">
                        <div class="section-title mt-0">User Details</div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">First and last name</span>
                                </div>
                                <label id="name" class="form-control">name</label>
                            </div>
                        </div>
                        <label style="display: none" id="userid"></label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">course</span>
                                </div>
                                <label id="course"  class="form-control">MCA</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <button id="saveinfoBtn" class="form-control btn btn-success" type="submit" ><i class="fa fa-check-square"></i> Approve </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function assignValues(id){
        $.ajax({
            url: '../dbHelper/studentInfo.php',
            type: 'POST',
            data: {"id": id},
            success: function (response) {
                var obj = JSON.parse(response);

                $.each(obj, function(i, $val)
                {
                    $("#name").html($val.firstname+ ' '+$val.lastname);
                    $("#course").html($val.course);
                    $("#userid").html($val.userid);

                });


            }
        });
    }
    $('#aprovalForm').submit(function (event) {
        event.preventDefault();


        var userid = $('#userid').html();

        // for(i=0; i < arr.length; i++)
        //     alert(arr[i]);


        $.ajax({
            url: '../dbHelper/saveProfessor.php',
            type: 'POST',
            data: {"uid": userid},
            success: function (response) {
                $('#aprove').modal('hide');
                if (response === "1") {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: "Professor approved successfully",
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 100);
                } else {
                    setTimeout(function() {
                        swal({
                            title: "Failed",
                            text: "Failed approve",
                            type: "warning"
                        }, function() {
                            location.reload();
                        });
                    }, 100);
                }
            }
        });

    });




</script>


<?php include_once __DIR__. '\footer.php' ?>

