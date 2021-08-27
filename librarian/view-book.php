<?php include_once '../librarian/header.php' ?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" style="border-bottom: solid 1px gray">
                            <div class="header-title">
                                <h4 class="card-title">book Lists</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <a href="add-books.php" class="btn btn-primary">Add New book</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row" style="border-bottom: solid 1px gray">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Entries per page
                                                    <select name="DataTables_Table_0_length"
                                                            aria-controls="DataTables_Table_0"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> </label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Sort By
                                                    <select name="DataTables_Table_0_length"
                                                            aria-controls="DataTables_Table_0"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">Date added</option>
                                                        <option value="25">Department</option>
                                                        <option value="50">Book type</option>

                                                    </select> </label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="DataTables_Table_0"></label>
                                            </div>
<!--                                            <form class="form-inline mr-auto">-->
<!--                                                <div class="search-element">-->
<!--                                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200" style="width: 200px;">-->
<!--                                                    <button class="btn" type="submit">-->
<!--                                                        <i class="fas fa-search"></i>-->
<!--                                                    </button>-->
<!--                                                </div>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 table-responsive">
                                            <table class="table table-hover mb-0 table-sortable"
                                                   style="width: 100%;" id="DataTables_Table_0" role="grid"
                                                   aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th style="width: 21px;" data-sort-type="numeric" >No
                                                    </th>
                                                    <th style="width: 45px;" >Book Image </th>
                                                    <th style="width: 62px;" >Book Name </th>
                                                    <th style="width: 63px;" > Edition </th>
                                                    <th style="width: 49px;">Book Author </th>
                                                    <th style="width: 37px;" >Department </th>
                                                    <th style="width: 83px;" > Book Description </th>
                                                    <th style="width: 38px;" >total Stock </th>
                                                    <th style="width: 37px;" >Book Type </th>
                                                    <th style="width: 37px;" >Book pdf </th>
                                                    <th style="width: 47px;">Action </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                $rows = (new dbhelper)->__getBooks();
                                                if ($rows != 0) {
                                                    $i = 1;
                                                    foreach ($rows as $row) {
                                                        $bookId = $row['book_id'];
                                                        $edition = $row['edition'];
                                                        $author = $row['author'];
                                                        $title = $row['title'];
                                                        $department = $row['book_department'];
                                                        $description = $row['description'];
                                                        $stock = $row['total_stock'];
                                                        $bookType = $row['book_type'];
                                                        $coverImg=$row['cover_photo'];
                                               echo ' <tr role="row" class="odd">
                                                    <td class="sorting_1">'.$i.'</td>
                                                    <td><img class="img-fluid rounded" src="../books/'.$coverImg.'"
                                                             alt=""></td>
                                                    <td>'.$title.'</td>
                                                    <td>'.$edition.'</td>
                                                    <td>'.$author.'</td>
                                                    <td>'.$department.'</td>
                                                    <td>
                                                        <p class="mb-0">'.$description.'</p>
                                                    </td>
                                                    <td>'.$stock.'</td>
                                                    <td>
                                                      '.$bookType.'
                                                    </td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a  data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="pdf" href="#"><i class="fa fa-file-pdf"  style="font-size: 1.5em;"></i></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a  data-toggle="tooltip"
                                                               data-placement="top" title="" data-original-title="Edit"
                                                               href="add-books.php" ><i class="fa fa-edit" style="font-size: 1.5em;"></i></a>
                                                            <a  data-toggle="tooltip"
                                                               data-placement="top" title=""
                                                               data-original-title="Delete" href="#"><i class="fas fa-trash-alt"  style="font-size: 1.5em;"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>';
                                               $i++;
                                                        }
                                                }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                 aria-live="polite">Showing 1 to 10 of 10 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                 id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="DataTables_Table_0_previous"><a href="#"
                                                                                            aria-controls="DataTables_Table_0"
                                                                                            data-dt-idx="0" tabindex="0"
                                                                                            class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                                                                    aria-controls="DataTables_Table_0"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0"
                                                                                                    class="page-link">1</a>
                                                    </li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="DataTables_Table_0_next"><a href="#"
                                                                                        aria-controls="DataTables_Table_0"
                                                                                        data-dt-idx="2" tabindex="0"
                                                                                        class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once '../librarian/footer.php' ?>