<?php include_once '../librarian/header.php' ?>
<div class="main-content">
    <div class="card" style="width: 70%">
        <div class="card-header">
            <h4>Add new Book</h4>
        </div>
        <div class="card-body">



                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-form-label col-sm-3 pt-0">Book Type</div>
                        <div class="col-sm-9">
                            <div class="form-check" style="display: flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3">Physical book</label>
                                </div>
                                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">E material</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            <form action="../dbHelper/save-book.php" method="post" id="libraryBookFrom" style="display: none" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Edition:</label>
                    <input type="text" id="edition" name="edition" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Author:</label>
                    <input type="text " id="author" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Department:</label>
                    <select class="form-control" id="department" name="department">
                        <option selected="" disabled="">--Select Department--</option>
                        <option>Computer Science</option>
                        <option>Business</option>
                        <option>physiotherapy</option>
                        <option>Animation</option>
                        <option>Hotel Management</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Book Image:</label>
                    <div class="custom-file">
                        <input onchange="javascript: setLableName();" type="file" id="coverPhoto" name="coverPhoto" class="custom-file-input" accept="image/png, image/jpeg">
                        <label class="custom-file-label" id="coverPhotoLable">Choose file</label>
                    </div>
                </div>

<!--                <div class="form-group">-->
<!--                    <label>Book Description:</label>-->
<!--                    <input type="file" class="form-control-file" id="img" name="img" >-->
<!--                </div>-->
                <div class="form-group">
                    <label>Book Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>


                <div class="form-group">
                    <label>Total Book Stock:</label>
                    <div class="input-group mb-3">
                        <input type="text" id="booksStock" name="booksStock" class="form-control" placeholder="" aria-label="">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="btnEnterAccession" type="button">Enter Accession Numbers</button>
                        </div>
                    </div>
                </div>

                <div id="accessionEntry">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>



            <form action="" method="post" id="eMaterialForm" style="display: none;">
                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Edition:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Author:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Book Department:</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected="" disabled="">--Select Department--</option>
                        <option>Computer Science</option>
                        <option>Business</option>
                        <option>physiotherapy</option>
                        <option>Animation</option>
                        <option>Hotel Management</option>
                    </select>
                </div>
<!--                <div class="form-group">-->
<!--                    <label>Book Image:</label>-->
<!--                    <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input" accept="image/png, image/jpeg">-->
<!--                        <label class="custom-file-label">Choose file</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label>Book pdf:</label>-->
<!--                    <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input"-->
<!--                               accept="application/pdf, application/vnd.ms-excel">-->
<!--                        <label class="custom-file-label">Choose file</label>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label>Book Description:</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>



        </div>
    </div>


</div>

<script>
    $('#customRadio3').click(function(){
        if($("#customRadio3")[0].checked){
           $('#libraryBookFrom').css("display", "block");
            $('#eMaterialForm').css("display", "none");
        }
    });

    $('#customRadio2').click(function(){
        if($("#customRadio2")[0].checked){
            $('#libraryBookFrom').css("display", "none");
            $('#eMaterialForm').css("display", "block");
        }
    });

    $('#btnEnterAccession').click(function () {
        var count = $('#booksStock').val();
        for (var i =1; i<=count; i++){
            $('#accessionEntry').append(' <div class="form-group"> <div class="input-group"><div class="input-group-prepend"> <span id="" class="input-group-text">book '+i+' </span> </div> <input id="accessionId'+i+'"  type="text" class="form-control" placeholder="enter Accession number" required> </div>   </div> ');

        }
    });


    function setLableName(){
       var filename = $('#coverPhoto').val().split('\\').pop();;
       $('#coverPhotoLable').html(filename);
    }

    $('#libraryBookFrom').submit(function (event) {
       event.preventDefault();
        var accessionArray = $('#accessionEntry input').map(function () {
            return this.value;
        });

        var title = $("#title").val();
        var edition = $("#edition").val();
        var author = $("#author").val();
        var department = $("#department").children(':selected').text();
        var description = $("#description").val();
        var stock = $("#booksStock").val();
        var coverPhoto = $("#coverPhoto").prop('files')[0];


        var data = new FormData();
        data.append('title', title);
        data.append('edition', edition);
        data.append('author', author);
        data.append('department', department);
        data.append('description', description);
        data.append('stock', stock);
        data.append('accession', JSON.stringify(accessionArray));
        data.append('cover', coverPhoto);




        $.ajax({
            url: '../dbHelper/save-book.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type:'POST',
            success: function (response) {
                alert(response);

            }
        });



    });
</script>

<?php include_once '../librarian/footer.php' ?>
