<?php  include_once '..\dbHelper\dbhelper.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SU Library - Admin Dashboard </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
<div class="loader"></div>
<div id="app"  style="margin-bottom: 7%">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                    <li>
                        <form class="form-inline mr-auto">
                            <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">



                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                             class="nav-link nav-link-lg message-toggle"><i
                                data-feather="mail"></i>
                        <span class="badge headerBadge1">
                6 </span> </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            Messages
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-message">
                            <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>

                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>



                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                             class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                       <?php
                       $rows = (new dbhelper)->__getPendingAprovalUsers();
                       $count=0;
                       if ($rows != 0) {
                           foreach ($rows as $row) {
                               $count++;
                           }

                       }
                       ?>
                        <span class="badge headerBadge2"> <?php echo $count; ?> </span>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            Notifications
                            <div class="float-right">
                                <a onclick="function f() {
                                  $('#notifications').empty();
                                }">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons" id="notifications">
                            <?php
                            if ($rows != 0)
                            {
                            $i = 1;
                            foreach ($rows as $row){
                            $uid = $row['user_id'];
                            $date = $row['registration_date'];
                            $fname = $row['first_name'];
                            $laname = $row['last_name'];
                            $course = $row['course'];
                            ?>

                            <a href="student-aproval.php" class="dropdown-item">
                                <span class="dropdown-item-icon bg-info text-white">
                                    <i class="fas fa-bell"></i>
                                </span>
                                <span class="dropdown-item-desc">
                                    New Student <?php echo $fname,'&nbsp', $laname; ?> from <?php echo $course?> has registered with library
                                    <span class="time"> <?php echo $date?></span>
                                </span>
                            </a>
                            <?php }
                            } ?>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="student-aproval.php">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>





                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                                                                                                         class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello Sarah Smith</div>
                        <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                        </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                            class="logo-name">SuLibrary</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li >
                        <a href="student-aproval.php" ><i data-feather="briefcase"></i><span>Student Aproval</span></a>

                    </li>
                    <li>
                        <a class="nav-link" href="manage-orders.php"><i data-feather="file"></i><span>Order</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i data-feather="file"></i><span>returns</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><i data-feather="file"></i><span>chat</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Orders</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="chat.html">student order</a></li>
                            <li><a class="nav-link" href="portfolio.html">Professor Order</a></li>

                        </ul>
                    </li>

                    <li class="menu-header">Libarairy</li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Books</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="add-books.php">add books</a></li>
                            <li><a class="nav-link" href="view-book.php">view books</a></li>
                            <li><a class="nav-link" href="breadcrumb.html">manage</a></li>



                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" ><i
                                data-feather="shopping-bag"></i><span>shortage alerts</span></a>
                       </li>
                    <li class="dropdown">
                        <a href="#" ><i
                                    data-feather="shopping-bag"></i><span>Student records</span></a>
                    </li>




                </ul>
            </aside>
        </div>
