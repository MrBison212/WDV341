<?php

include "../dbConnect.php";

try {

	$sql ="SELECT * FROM wdv341_events";
    $stmt = $conn->prepare($sql);                               //prepare the statement
    $stmt->execute();                                           //the result Object is still in database format

    foreach ( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<p>";
        echo $row["events_id"];
        echo "<br>";
        echo $row["events_name"];
        echo "<br>";
        echo $row["events_date"];
    }

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
        .table {
          display: grid;
          grid-template-columns: 1fr 1fr 60%;
          max-width: 600px;
          padding: 10px;
          background-color: #720404;
        }

        .table div {
          margin: 2px;
          background: #b04949;
          padding: 5px;
        }
      </style>
    </head>

    <body>
      <h1>All Events for the Events Table</h1>

      <div class="table">
        <div>Intro PHP - WDV341</div>
        <div>1</div>
        <div>An introduction into to the server-side language known as PHP.</div>
      </div>

      <div class="table">
        <div>WDV321 - Adv. JavaScript</div>
        <div>2</div>
        <div>Adv. JavaScript discussion - inClass.</div>
      </div>

      <div class="table">
        <div>Advance JavaScript</div>
        <div>4</div>
        <div>Homework</div>
      </div>

      <div class="table">
        <div>final test</div>
        <div>6</div>
        <div>final test</div>
      </div>

      <div class="table">
        <div>final test</div>
        <div>7</div>
        <div>final test</div>
      </div>

      <div class="table">
        <div>make sure this works</div>
        <div>8</div>
        <div>working</div>
      </div>

      <div class="table">
        <div>test</div>
        <div>9</div>
        <div>test</div>
      </div>

      <div class="table">
        <div>inclass test</div>
        <div>10</div>
        <div>inclass test</div>
      </div>
    </body>
  </html>
