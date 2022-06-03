<?php include_once "admin_layout/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
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
                                                $query="SELECT * FROM posts";
                                                $result=mysqli_query($connect,$query);
                                                $post_count=mysqli_num_rows($result);
                                                echo "<div class='huge'>{$post_count}</div>";
                                            ?>
                                    <!-- <div class='huge'>12</div> -->
                                    <?php 
                                        $public_query="SELECT * FROM posts WHERE post_status='public'";
                                        $public_result=mysqli_query($connect,$public_query);
                                        $public_count=mysqli_num_rows($public_result);

                                        $hide_query="SELECT * FROM posts WHERE post_status='hide'";
                                        $hide_result=mysqli_query($connect,$hide_query);
                                        $hide_count=mysqli_num_rows($hide_result);
                                    ?>
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="post.php">
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
                                            $query="SELECT * FROM comment";
                                            $result=mysqli_query($connect,$query);
                                            $comment_count=mysqli_num_rows($result);
                                            echo "<div class='huge'>{$comment_count}</div>";
                                        ?>
                                    <!-- <div class='huge'>23</div> -->
                                    <?php 
                                        $approve_query="SELECT * FROM comment WHERE comment_status=1";
                                        $approve_result=mysqli_query($connect,$approve_query);
                                        $approve_count=mysqli_num_rows($approve_result);

                                        $unapprove_query="SELECT * FROM comment WHERE comment_status=0";
                                        $unapprove_result=mysqli_query($connect,$unapprove_query);
                                        $unapprove_count=mysqli_num_rows($unapprove_result);

                                    ?>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comment.php">
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
                                            $query="SELECT * FROM user";
                                            $result=mysqli_query($connect,$query);
                                            $user_count=mysqli_num_rows($result);
                                            echo "<div class='huge'>{$user_count}</div>";
                                        ?>
                                    <!-- <div class='huge'>23</div> -->
                                    <?php 
                                        $admin_query="SELECT * FROM user WHERE userrole='admin'";
                                        $admin_result=mysqli_query($connect,$admin_query);
                                        $admin_count=mysqli_num_rows($admin_result);

                                        $subscriber_query="SELECT * FROM user WHERE userrole='subscriber'";
                                        $subscriber_result=mysqli_query($connect,$admin_query);
                                        $subscriber_count=mysqli_num_rows($subscriber_result);
                                    ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user.php">
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
                                            $query="SELECT * FROM category";
                                            $result=mysqli_query($connect,$query);
                                            $category_count=mysqli_num_rows($result);
                                            echo "<div class='huge'>{$category_count}</div>";
                                        ?>
                                        <!-- <div class='huge'>13</div> -->
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="category.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="columnchart_values" style="width: 900px;"></div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div id="columnchart_values" style="min-width:500px"></div>
                    </div> -->
                    
                </div> 
                
                    
                
                <!-- /.row -->
            </div>
        </div>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Public Posts", <?php echo $public_count; ?>,'blue'],
          ["Hide Posts", <?php echo $hide_count; ?>,'blue'],
          ["Approve Count", <?php echo $approve_count; ?>,'blue'],
          ["Unapprove Count", <?php echo $unapprove_count; ?>,'blue'],
          ["Admin Count", <?php echo $admin_count; ?>,'blue'],
          ["Subscriber Count", <?php echo $subscriber_count; ?>,'blue'],
          ["Categories Count", <?php echo $category_count; ?>,'blue'],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

   <?php include_once "admin_layout/footer.php" ?>