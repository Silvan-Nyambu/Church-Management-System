<?php

include "../includes/db_connect.php";

$get_members = "select * from members";
$run_members = mysqli_query($connection, $get_members);
$count_members = mysqli_num_rows($run_members);

$get_grps = "select * from groups";
$run_grps = mysqli_query($connection, $get_grps);
$count_grps = mysqli_num_rows($run_grps);

$get_family = "select * from families";
$run_family = mysqli_query($connection, $get_family);
$count_family = mysqli_num_rows($run_family);

$get_sunday_sch = "select * from sunday_sch";
$run_sunday_sch = mysqli_query($connection, $get_sunday_sch);
$count_sunday_sch = mysqli_num_rows($run_sunday_sch);


//Functions
function getGroups(){

    global $connection;

    $get_grps = "select * from groups";

    $run_grps = mysqli_query($connection, $get_grps);

    while ($row=mysqli_fetch_array($run_grps)) {

    echo "<option>".$row['group_name']."</option>";

    }
}

function getFamilies(){

    global $connection;

    $get_fam = "select * from families";

    $run_fam = mysqli_query($connection, $get_fam);

    while ($row=mysqli_fetch_array($run_fam)) {

    echo "<option>".$row['family_name']."</option>";

    }
}

function getStations(){

    global $connection;

    $get_station = "select * from stations";

    $run_station = mysqli_query($connection, $get_station);

    while ($row=mysqli_fetch_array($run_station)) {

    echo "<option>".$row['station_name']."</option>";

    }
}

function getTypes(){

    global $connection;

    $get_type = "select * from contribution_types";

    $run_type = mysqli_query($connection, $get_type);

    while ($row=mysqli_fetch_array($run_type)) {

    echo "<option>".$row['contribution_name']."</option>";

    }
}

?>