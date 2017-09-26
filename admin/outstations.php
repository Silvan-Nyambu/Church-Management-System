<div class="col-sm-12 table-responsive content_divs" id="div_to_print">
      <h3 align="center"><b>All Out Stations</b></h3><br>

      <!--Retreving records from database-->

      <?php
      //Retreiving records from the database and display in results web page
      require_once ('../includes/db_connect.php'); //call connect code

      $get_data = "select * from stations";

      $run_data = mysqli_query($connection, $get_data);

      $count_data = mysqli_num_rows($run_data);

      if($count_data==0){
          echo "<h4 align='center' style='padding-bottom:10px;'><i> No records were found in the database! </i></h4>";
      }
      else{

      echo "<table class='table table-hover text-center table-bordered' id='table_center'>"; 
      echo "<thead>";
      echo "<tr>"; 
      echo "<td><b>STATION NO</b></td>
            <td><b>STATION NAME</b></td>
            <td><b>NO OF MEMBERS</b></td>
            <td><b>ACTION</b></td>";
      echo "</tr>"; 
      echo "</thead>"; 
      echo "<tbody>";

      //fetch and loop records

      $i = 0;

      while ($row = mysqli_fetch_array($run_data)) //fetch the rows
      {

      $i++;
          
      $id=$row['station_id']; //id to select the record to delete
      $station_name = $row['station_name'];

      $get_no = "select * from members where station='$station_name'";
      $run_get_no = mysqli_query($connection, $get_no);
      $count_no = mysqli_num_rows($run_get_no);

      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$row['station_name']."</td>
            <td>".$count_no."</td>
            <td class='dontprint'><a href='view_station.php?view=$station_name' title='View'><button type='button' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-open'></span> View</button></a></td>
            "; 

      echo "</tr>";

      }

      echo "</tbody>"; 
      echo "</table>";
      }

      ?>
      <!--/Retreving records from database-->
</div>