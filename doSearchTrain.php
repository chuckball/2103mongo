<!DOCTYPE html>
<html>
<?php include "head.php" ?>
<?php
$search = $_POST['search'];
?>

  <body>
    <?php include "nav.php" ?>
    <section id="content">
      <?php include "usernameHeader.php" ?>
      <div class="content">
        <div class="content-header">
          <h1>Trains</h1>
          <p>SMRT Corporation is a multi modal transport operator in Singapore. A subsidiary of the Government of Singapore's Temasek Holdings, it was established in 1987 and listed on the Singapore Exchange from July 2000 until October 2016.</p>
          <br>
          <a href="addTrain.php" class="button">Add</a>
          <form class="search" action="doSearchTrain.php" method='post'>
            <input type="text" placeholder="Enter train name..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>


        </div>
        <div class="content-body">
          <?php
                    $query = "SELECT * FROM mrt_station WHERE station_name LIKE '%$search%'";
                    $result = $mysqli->query($query);
                    ?>

            <h1>
              Search results for
              <?php echo $search; ?>
            </h1>
            <table id="myTable">
              <tr>
                <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
                <th onclick="sortTable(0)">Station ID</th>
                <th onclick="sortTable(1)">Station Name</th>
                <th onclick="sortTable(2)">Station Line</th>
                <th>Edit/Delete</th>

              </tr>

              <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                <tr>
                  <td>
                    <?php echo $row['station_id']; ?>
                  </td>
                  <td>
                    <?php echo $row['station_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['station_line']; ?>
                  </td>
                  <td><a class="button" href='updateTrain.php?trainID=<?php echo $row[' station_id ']; ?>'>Edit</a><a class="button" href='doDeleteTrain.php?trainID=<?php echo $row[' station_id ']; ?>'>Delete</a></td>
                </tr>

                <?php
                            }
                        } else {
                            echo "No results.";
                            echo $query;
                        }
                        ?>
            </table>
        </div>
      </div>
    </section>
  </body>

</html>