<?php

include '../includes/session.php';
include '../includes/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Member Details - CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="admin_panel">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>

                        <p class="pull-right" id='clockbox'></p>

                <?php 

                @$opt=$_GET['option'];

                if($opt=="")
                {
                    echo "
                        <ol class='breadcrumb'>
                            <li class='active'>
                                <i class='fa fa-dashboard'></i> Dashboard
                            </li>
                        </ol>
                    ";
                }

                ?>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12 table-responsive" id="div_to_print">

                        <!--Retreving records from database-->

                        <?php

                        include "../includes/db_connect.php";

                        //receive the values from the form and assign them to variables
                        if(isset($_GET['view'])){

                            $id = $_GET['view'];

                            $get_details = "select * from members where member_id='$id'";

                            $run_details = mysqli_query($connection, $get_details);

                            $row = mysqli_fetch_array($run_details);

                            $names=$row['names'];
                            $member_no=$row['member_no'];
                            $email=$row['email'];
                            $telephone=$row['telephone'];
                            $station=$row['station'];
                            $group_name=$row['group_name'];
                            $baptism_date=$row['baptism_date'];
                            $confirmation_date=$row['confirmation_date'];
                            $gender=$row['gender'];
                            $marital_status=$row['marital_status'];
                            $family=$row['family'];
                        }

                        ?>

                        <!--/Retreving records from database-->

                        <div class="content_divs view_table">
                            <!--Display member details on a table-->
                            <h3 align="center"><b><?php echo "$names"; ?> Details</b></h3><br>
                            <table class="table" id="table_center">
                                <tbody>
                                    <tr>
                                        <td align="right"><b>Member No: </b></td>
                                        <td><?php echo "$member_no"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Email: </b></td>
                                        <td><?php echo "$email"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Telephone: </b></td>
                                        <td><?php echo "$telephone"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Out Station: </b></td>
                                        <td><?php echo "$station"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Group Name: </b></td>
                                        <td><?php echo "$group_name"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Baptism Date: </b></td>
                                        <td><?php echo "$baptism_date"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Confirmation Date: </b></td>
                                        <td><?php echo "$confirmation_date"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Gender: </b></td>
                                        <td><?php echo "$gender"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Marital Status: </b></td>
                                        <td><?php echo "$marital_status"; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Family: </b></td>
                                        <td><?php echo "$family"; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>

                            <h4 align="center">Family Members:</h4>

                            <?php
                            //Retreiving records from the database and display in results web page
                            require_once ('../includes/db_connect.php'); //call connect code

                            $get_members = "select * from members where family='$family' AND member_no!='$member_no'";

                            $run_members = mysqli_query($connection, $get_members);

                            $count_data = mysqli_num_rows($run_members);

                            if($count_data==0){
                                echo "<h4 align='center' style='padding-bottom:10px;'><i> None! </i></h4>";
                            }
                            else{

                            echo "<table class='table table-hover text-center table-bordered' id='table_center' style='max-width:300px; margin: auto;'>"; 
                            echo "<thead>";
                            echo "<tr>"; 
                            echo "<td><b>NO</b></td>
                                  <td><b>NAMES</b></td>
                                  <td class='dontprint'><b>ACTION</b></td>";
                            echo "</tr>"; 
                            echo "</thead>"; 
                            echo "<tbody>";

                            //fetch and loop records

                            $i = 0;

                            while ($row = mysqli_fetch_array($run_members)) //fetch the rows
                            {

                            $i++;
                                
                            $id=$row['member_id']; //id to select the record to delete

                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['names']."</td>
                                  <td class='dontprint'><a href='view_member.php?view=$id' title='View'><button type='button' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-open'></span> View</button></a></td>"; 

                            echo "</tr>";

                            }

                            echo "</tbody>"; 
                            echo "</table>";
                            }

                            ?>
                            <button type="button" id="print_button" class="btn btn-info dontprint btn-sm" onclick="printPage()"><span class="glyphicon glyphicon-print"></span>  Print Member Details</button>
                            <a href="members.php" title="Back to list" class="btn btn-success btn-sm pull-right dontprint">Back</a>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <hr>
            <footer class="main-footer">
                <?php include 'footer.php'; ?>
            </footer>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/jqBootstrapValidation.js"></script>

</body>

</html>