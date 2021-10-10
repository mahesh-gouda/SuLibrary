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
                <h4>Professor's Records</h4>
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
                            <th>Email</th>
                            <th>phone</th>
                            <th>course</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $rows =(new dbhelper)->__getProfessorDetails();
                        if($rows != 0 )
                        {
                            $i=1;
                            foreach ($rows as $row){
                                $uid=$row['user_id'];
                                $fname= $row['first_name'] ;
                                $laname =$row['last_name'];
                                $phone=$row['phone'];
                                $email=$row['email'];
                                $course=$row['course'];


                                echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$fname.'&nbsp;'.$laname.' </td>
                        <td>'.$email.'</td>
                        <td>'.$phone.'</td>
                        <td>'.$course.'</td>
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




<?php include_once __DIR__. '\footer.php' ?>

