<?php include "../includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="js/script.js"></script>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/header.php";  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome admin

                           <?php

                           ?>
                            <small><?php echo $_SESSION['firstname'];  ?></small>
                        </h1>
                                     
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php

                    $query = "SELECT * FROM posts";
                    $fetch_posts = mysqli_query($connection , $query);
                    $total_posts = mysqli_num_rows($fetch_posts);


                    ?>
                  <div class='huge'><?php echo $total_posts;  ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <?php

                            $query = "SELECT * FROM comments";
                            $fetch_comments = mysqli_query($connection , $query);
                            $total_comments = mysqli_num_rows($fetch_comments);


                            ?>
                     <div class='huge'><?php echo $total_comments;   ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php

                    $query = "SELECT * FROM users";
                    $fetch_users = mysqli_query($connection , $query);
                    $total_users = mysqli_num_rows($fetch_users);


                    ?>
                    
                    <div class='huge'><?php echo $total_users;  ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php

                    $query = "SELECT * FROM categories";
                    $fetch_categories = mysqli_query($connection , $query);
                    $total_categories = mysqli_num_rows($fetch_categories);


                    ?>
                        <div class='huge'><?php echo $total_categories;   ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                    </div>
                </div>
                <!-- /.row -->

    <?php
   //section that fetches draft posts
    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
    $fetch_draft_posts = mysqli_query($connection , $query);
    $total_draft_posts= mysqli_num_rows($fetch_draft_posts);

    //section that fetchesPublished posts
    $query = "SELECT * FROM posts WHERE post_status = 'published'";
    $fetch_published_posts = mysqli_query($connection , $query);
    $total_published_posts= mysqli_num_rows($fetch_published_posts);

     //section that fetches approved comments
    $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
    $fetch_approved_comments = mysqli_query($connection , $query);
    $total_approved_comments= mysqli_num_rows($fetch_approved_comments);


    //section that fetches unapproved comments
    $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved'";
    $fetch_unapproved_comments = mysqli_query($connection , $query);
    $total_unapproved_comments= mysqli_num_rows($fetch_unapproved_comments);

    //section that fetches User roles of  users
    $query = "SELECT * FROM users WHERE user_role= 'Subscriber'";
    $fetch_subscribers = mysqli_query($connection , $query);
    $total_subscribers= mysqli_num_rows($fetch_subscribers);








    ?>


     <div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php

    $element_text   = ['Active Posts' ,'Draft Posts' ,'Published Posts','Comments' , 'Approved comments','pending','Users', 'Subscribers', 'Categories'];
    $element_count   = [$total_posts  , $total_draft_posts, $total_published_posts ,$total_comments, $total_approved_comments, $total_unapproved_comments,  $total_users, $total_subscribers ,$total_categories ];


           for($i = 0; $i < 9;  $i++){
            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

           }







          

          ?>
          // ['Posts', 1000],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    </div>

     <div id="columnchart_material" style="width:auto; height: 500px;"></div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
