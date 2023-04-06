<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true) { 
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
</body>
<div class="container bootstrap snippets bootdeys">
<div class="row">    
    <div class="col-lg-12">
        <div class="box">
            <!--mail inbox start-->
            <div class="mail-box">
                <aside class="sm-side">
                    <div class="user-head">
                        <a href="javascript:;" class="inbox-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-fluid">
                        </a>
                        <div class="user-name">
                            <h5><a href="#"><?php echo ucwords($_SESSION['name']);?></a></h5>
                            <span><a href="#"><?php echo $_SESSION['email'];?></a></span>
                        </div>
                        <a href="#" class="">
                            <div class="dropdown">
                              <a class="btn mail-dropdown pull-right" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-chevron-down"></i>
                              </a>

                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-inbox"></i>&nbsp Manage your Google Account</a></li>
                                <li><a class="dropdown-item" href="login.php" target="_blank"><i class="fa fa-pencil"></i>&nbsp Add another account</a></li>
                                <li><hr class="dropdown-divider"></hr></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-bookmark-o"></i>&nbsp Sign out</a></li>
                              </ul>
                            </div>
                        </a>
                    </div>
                    
                    <?php require "compose.php"?>

                    <ul class="inbox-nav inbox-divider">
                        <li>
                           <a href="index.php"><i class="fa fa-inbox"></i> Inbox 
                            <span class="badge text-bg-dark">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="sentemail.php"><i class="fa fa-envelope-o"></i> Sent Mail</a>
                        </li>
                        <li>
                           <a href="draftemail.php"><i class=" fa fa-external-link"></i> Drafts 
                            <span class="badge text-bg-warning">10</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="trash.php"><i class=" fa fa-trash-o"></i> Trash</a>
                        </li>
                         <li>
                            <a href="logout.php"><i class="fa fa-bookmark-o"></i>Logout</a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
                        <li> <h4>Labels</h4> </li>
                        <li> <a href="#">&nbsp&nbspWork </a> </li>
                        <li> <a href="#">&nbsp&nbspDesign </a> </li>
                        <li> <a href="#">&nbsp&nbspFamily </a> </li>
                        <li> <a href="#">&nbsp&nbspFriends </a> </li>
                        <li> <a href="#">&nbsp&nbspOffice </a> </li>
                    </ul>
                    <div class="inbox-body text-center">
                        <div class="btn-group">
                            <a href="javascript:;" class="btn mini btn-primary" data-original-title="" title="">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="javascript:;" class="btn mini btn-success" data-original-title="" title="">
                                <i class="fa fa-phone"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="javascript:;" class="btn mini btn-info" data-original-title="" title="">
                                <i class="fa fa-cog"></i>
                            </a>
                        </div>
                    </div>
                </aside>
                <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Trash Mail</h3>
                    <form class="pull-right position" action="#">
                        <div class="input-append">
                            <input type="text" placeholder="Search Mail" class="sr-input">
                            <button type="button" class="btn sr-btn" data-original-title="" title=""><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="inbox-body">
                <div class="mail-option">
                    <div class="chk-all">
                        <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                        <div class="btn-group dropdown">
                            <a class="btn mini all" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                All
                                <i class="fa fa-angle-down "></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"> None</a></li>
                                <li><a class="dropdown-item" href="#"> Read</a></li>
                                <li><a class="dropdown-item" href="#"> Unread</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                            <i class=" fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="btn-group dropdown">
                         <a class="btn mini" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Spam</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>
                    <ul class="unstyled inbox-pagination">
                        <li><span>1-50</span></li>
                        <li>
                            <a href="#" class="np-btn"><i class="fa fa-angle-left  pagination-left"></i></a>
                        </li>
                        <li>
                            <a href="#" class="np-btn"><i class="fa fa-angle-right pagination-right"></i></a>
                        </li>
                    </ul>
                </div>
                <table class="table table-inbox table-hover">
                <tbody>

                <?php
                
                require "partials/connect.php";

                $email = $_SESSION['email'];

                $sql = "SELECT * FROM composetable WHERE status=0 ORDER BY `date` DESC";

                $result = mysqli_query($conn, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                    $semail = $row['sender'];
                    $sql1 = "SELECT name FROM registeruser WHERE email='$semail'";
                    $result1 = mysqli_query($conn , $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
     
                    if ($row['receiver'] == $_SESSION['email']) {
                
                    echo '<tr class="">
                    <td class="inbox-small-cells">
                        <input type="checkbox" class="mail-checkbox">
                    </td>
                    <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                    <td class="view-message  dont-show"><a href="viewemail.php?sno='.$row['sno'].'">'.ucwords($row1['name']).'</a></td>
                    <td class="view-message"><a href="viewemail.php">'.$row['subject'].'</a></td>
                    <td class="view-message "><a href="viewemail.php">'.substr($row['message'],0, 20).'</a></td>
                    <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                    <td class="view-message  text-right"><a href="viewemail.php">'.$row['date'].'</a></td>
                    <td class="view-message  text-right"><a href="indexdelete.php?sno='.$row['sno'].'"><i class="fa fa-trash-o"></a></td>
                </tr>';
            }
            
                    }
                }


                ?>    
                <?php
                
                require "partials/connect.php";

                $email = $_SESSION['email'];

                $sql = "SELECT * FROM composetable1 WHERE status=0 ORDER BY `date` DESC";

                $result = mysqli_query($conn, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                    $semail = $row['sender'];
                    $sql1 = "SELECT name FROM registeruser WHERE email='$semail'";
                    $result1 = mysqli_query($conn , $sql1);
                    $row1 = mysqli_fetch_assoc($result1);

                    if ($row['sender'] == $_SESSION['email']) {

                    echo '<tr class="">
                    <td class="inbox-small-cells">
                        <input type="checkbox" class="mail-checkbox">
                    </td>
                    <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                    <td class="view-message  dont-show"><a href="viewemail.php?sno='.$row['sno'].'">'.ucwords($row1['name']).'</a></td>
                    <td class="view-message"><a href="viewemail.php">'.$row['subject'].'</a></td>
                    <td class="view-message "><a href="viewemail.php">'.substr($row['message'],0, 20).'</a></td>
                    <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                    <td class="view-message  text-right"><a href="viewemail.php">'.$row['date'].'</a></td>
                    <td class="view-message  text-right"><a href="sentdelete.php?sno='.$row['sno'].'"><i class="fa fa-trash-o"></a></td>
                </tr>';
            }
            
                    }
        }

                ?> 
                 
                </tbody>
                </table>
                </div>
                </aside>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
</body>
</html>