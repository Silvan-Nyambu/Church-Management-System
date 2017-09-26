<div class="content_divs" id="div_to_print">
    <h3 align="center"><b>MY PROFILE</b></h3><br>

    <!--Retreving records from database-->

    <?php
    //Retreiving records from the database and display in results web page
    require_once ('../includes/db_connect.php'); //call connect code

    $get_details = "select * from admins where email = '$user_check'";

    $run_details = mysqli_query($connection, $get_details);

    $row = mysqli_fetch_array($run_details);

    $names = $row['names'];
    $email = $row['email'];

    echo "

        <table align='center'>
            <tr><td><h3>Names: </h3> </td><td><h3> $names </h3> </td></tr>
            <tr><td><h3>Email: </h3> </td><td><h3> $email </h3> </td></tr>
        </table>
        <br>

    ";

    ?>

    <!--/Retreving records from database-->
</div>
<br>

<div class="col-sm-12 text-center" id="print_button">
    <div class="col-sm-6" style="margin-bottom: 10px;">
        <button type="button" title="Print Details" class="btn btn-info btn-xs" onclick="printPage()"><span class="glyphicon glyphicon-print"></span>  Print Your Details</button>
    </div>
    <div class="col-sm-6" style="margin-bottom: 10px;">
        <a href="index.php?option=Edit_Account" title="Edit Account">
            <button type="button" class="btn btn-info btn-xs" name="Edit_Account"><span class="glyphicon glyphicon-edit"></span>  Edit Account</button>  
        </a>
    </div>
</div>


<!--Printing Script-->

<script>
function printPage() {
    var win = window.open ('','','left=0,top=0,width=552,height=470');

    var content = "<html>";
    content += "<body onload=\"window.print();window.close();\">"
    content += "<style>@media print{.dontprint{display:none;}}</style>";
    content += "<style>@media print{#table_center{margin-left:auto;margin-right:auto;border-spacing:20px;}}</style>";
    content += document.getElementById("div_to_print").innerHTML;
    content += "</body>";
    content +="</html>";
    win.document.write(content);
    win.document.close();
}
</script>