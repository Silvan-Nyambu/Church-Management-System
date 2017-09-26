<?php

include "../includes/db_connect.php";
$message=''; // Variable to store message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $member_name=$_POST['member_name'];
    $member_no=$_POST['member_no'];
    $telephone=$_POST['telephone'];
    $station=$_POST['station'];
    $contribution_type=$_POST['contribution_type'];
    $amount=$_POST['amount'];
    $p_date=$_POST['p_date'];

    // insert details into the table
    $insert_data = "insert into contributions (member_name, member_no, telephone, station, type, amount, p_date)
    values('$member_name','$member_no','$telephone','$station','$contribution_type','$amount','$p_date')";

    $run_insert_data = mysqli_query($connection, $insert_data);

    if($run_insert_data) //confirm the details were inserted into table
    {
    $message = "<p style='color: green;'>Success, Details added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
}

?>

<?php

include "../includes/db_connect.php";

//receive the values from the form 

    $member_no=$_POST['member_no'];

    //check if member exists
    $check_user = "select member_no from members where member_no ='$member_no'";
    $run_check_user = mysqli_query($connection, $check_user);
    $row_user = mysqli_num_rows($run_check_user);

    // if member does not exist generate error message
    if($row_user != 1)
    {
    echo "
        <div class='form-group'>
            <div class='col-sm-12 content_divs'>
                <span style='color:red; padding-top: 20px;' class='col-sm-offset-4 col-sm-5'>Sorry, Member No: <b style='color: black;'>$member_no </b> does not exist. Please use a different member number!</span>
                <p class='col-sm-offset-4 col-sm-5'>
                    <a href='index.php?option=Member_No' class='btn btn-primary btn-xs' title='Back'> Back</a>
                </p>
            </div>
        </div>
    ";

    }
    else
    {
        $member_no=$_POST['member_no'];

        $get_details = "select * from members where member_no='$member_no'";

        $run_details = mysqli_query($connection, $get_details);

        $row = mysqli_fetch_array($run_details);

        $names=$row['names'];
        $member_no=$row['member_no'];
        $telephone=$row['telephone'];
        $station=$row['station'];

        include 'add_contribution.php';
    }

    ?>