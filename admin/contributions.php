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

    <title>All Contributions - CMS</title>

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

    <script type="text/javascript">
        function delete_id(id)
        {
            if(confirm('Sure to delete entry?'))
            {
                window.location.href='contributions.php?delete_id='+id;
            }
        }
    </script>

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
                        
                        <div class='col-sm-12'>
                            <div class='col-sm-6'>
                                <label for='username' style='color:brown;'>Filter By:</label><br>
                                <form action='cont_results.php' method='post' class='navbar-form' role='form'>
                                    <div class='form-group'>
                                    <label for='username'> Contribution Type:</label> 
                                    <select name='cont_type' class='form-control' style='max-width:100px;'>
                                        <option value=''>Select</option>";?>
                                        <?php getTypes(); ?>  
                                        <?php echo"
                                    </select>
                                    </div>
                                    <div class='form-group'>
                                    <label for='username'> Station:</label> 
                                    <select name='station' class='form-control' style='max-width:100px;'>
                                        <option value=''>Select</option>";?>
                                        <?php getStations(); ?>  
                                        <?php echo"
                                    </select>
                                    </div>
                                    <button type='submit' name='post_data' id='search-btn' class='btn btn-primary btn-sm' title='Filter'>
                                        <i class='fa fa-filter'></i>
                                    </button>
                                </form>
                            </div>
                            <div class='col-sm-6'>
                                <label for='username' style='color:brown;'>Filter By:</label><br>
                                <form action='member_cont.php' method='post' class='navbar-form ws-validate' role='form'>
                                    <div class='form-group'>
                                    <label for='username'> Member No:</label> 
                                    <input type='number' name='member_no' placeholder='Member No' required='' class='form-control' maxlength='10' style='max-width:100px;'>
                                    </div>
                                    <div class='form-group'>
                                    <label for='username'> Contribution Type:</label> 
                                    <select name='cont_type' class='form-control' style='max-width:100px;'>
                                        <option value=''>Select</option>";?>
                                        <?php getTypes(); ?>  
                                        <?php echo"
                                    </select>
                                    </div>
                                    <button type='submit' name='search_btn' id='search-btn' class='btn btn-primary btn-sm' title='Filter'>
                                        <i class='fa fa-filter'></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /.search form -->
                    ";
                }

                ?>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12 table-responsive content_divs" id="div_to_print">

                        <h3 align="center"><b>Member Contributions</b></h3><br>

                        <!--Retreving records from database-->

                        <?php
                        //Retreiving records from the database and display in results web page
                        require_once ('../includes/db_connect.php'); //call connect code

                        $get_data = "select * from contributions";

                        $run_data = mysqli_query($connection, $get_data);

                        //Getting Amount SUM
                        $total = "Select SUM(amount) AS total_sum FROM contributions";
                        $run_total = mysqli_query($connection, $total);
                        $get_total = mysqli_fetch_assoc($run_total);
                        $sum = $get_total['total_sum'];

                        $count_data = mysqli_num_rows($run_data);

                        if($count_data==0){
                            echo "<h4 align='center' style='padding-bottom:10px;'><i> No records were found in the database! </i></h4>";
                        }
                        else{

                        echo "<table class='table table-hover text-center table-bordered' id='table_center'>"; 
                        echo "<thead>";
                        echo "<tr>"; 
                        echo "<td><b>No</b></td>
                              <td><b>NAMES</b></td>
                              <td><b>MEMBER NO</b></td>
                              <td><b>TELEPHONE</b></td>
                              <td><b>STATION</b></td>
                              <td><b>CONTRIBUTION TYPE</b></td>
                              <td><b>AMOUNT</b></td>
                              <td><b>PAYMENT DATE</b></td>
                              <td class='dontprint' colspan='2'><b>ACTION</b></td>";
                        echo "</tr>"; 
                        echo "</thead>"; 
                        echo "<tbody>";

                        //fetch and loop records

                        $i = 0;

                        while ($row = mysqli_fetch_array($run_data)) //fetch the rows
                        {

                        $i++;
                            
                        $id=$row['id']; //id to select the record to delete

                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['member_name']."</td>
                              <td>".$row['member_no']."</td>
                              <td>".$row['telephone']."</td>
                              <td>".$row['station']."</td>
                              <td>".$row['type']."</td>
                              <td>".$row['amount']."</td>
                              <td>".$row['p_date']."</td>
                              <td class='dontprint'><a href='edit_cont.php?edit=$id' title='Edit'><button type='button' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-edit'></span> Edit</button></a></td> 
                              <td class='dontprint'><a href='javascript:delete_id($id)' title='Delete'><button type='button' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>"; 

                        echo "</tr>";

                        }

                        echo "</tbody>"; 
                        echo "</table><br>";

                        echo "<h4 align='center'>Total Amount: Kshs $sum</h4>";
                        }

                        ?>

                        <!--/Retreving records from database-->

                    </div>

                    <?php
                    if ($count_data==0) {
                        echo "";
                    }
                    else{
                        include 'print_button.php';
                    }
                    ?>
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
    <script src="../js-webshim/minified/polyfiller.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/jqBootstrapValidation.js"></script>

    <script> 
        // load and implement all unsupported features 
        webshims.polyfill('forms');
            
        // or only load a specific feature
        //webshims.polyfill('forms es5');
    </script>

</body>

</html>

    <!--Delete code-->

    <?php
    require_once ('../includes/db_connect.php');

    if(isset($_REQUEST['delete_id'])){

    $id=$_REQUEST['delete_id']; //fetch the id of selected record

    $del_data = "DELETE FROM contributions WHERE id='$id'";  // execute the delete statement

    $run_del_data = mysqli_query($connection, $del_data); 

    if ($run_del_data) // check if delete is successful
    {
    echo "<script>window.location='contributions.php';</script>";
    }
    else
    {
    echo "<script>alert('Entry not deleted.')</script>";

    echo "<script>window.location='contributions.php'</script>";
    }
    }

    ?>