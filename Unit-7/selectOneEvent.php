<?php

include "../dbConnect.php";

try {

	$sql = "SELECT * FROM wdv341_events WHERE events_id=2";
  $stmt = $conn->prepare($sql);                         //prepare the statement
  $stmt->execute();                                     //the result Object is still in database format

  $rowData = $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>



<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8" />
      <meta name="description" content="example of meta" />
      <meta name="viewpoint" content="width=device=width, initial-scale=1.0" />
      <title>WDV321 Intro Javascript</title>

      <style>
        body {
          background: #c8ccff;
        }
        table {
          display: grid;
          grid-template-columns: auto;
          max-width: 600px;
          padding: 10px;
          background-color: #720404;
        }

        table tr {
          margin: 5px;
          background: #b04949;
          padding: 5px;
        }
      </style>
    </head>

    <body>
      <h1>All Events for the Events Table</h1>

      <table>
          <tr>
              <th>Events Id</th>
              <th>Event Name</th>
              <th>Description</th>
          </tr>
              
          <?php

          foreach ($rowData as $oneEvent) {

              echo "<tr>";

              echo "<td>".$oneEvent["events_id"]."</td>";
              echo "<td>".$oneEvent["events_name"]."</td>";
              echo "<td>".$oneEvent["events_description"]."</td>";

              echo "</tr>";

          }


          ?>

        </table>

    </body>

  </html>