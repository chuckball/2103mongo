<!DOCTYPE html>
<html>
<?php include "head.php" ?>

<body>
  <?php include "nav.php" ?>
  <section id="content">
    <?php include "usernameHeader.php" ?>
    <div class="content">
      <div class="content-header">
        <h1>Schools</h1>
        <p>Singapore's schools come under the purview of the Ministry of Education. Singapore has many primary schools and secondary schools, as well as junior colleges, centralised institutes, polytechnics and universities providing tertiary education.
          Under the Compulsory Education Act which came into effect on 1 January 2003, all children have to start attending primary school at the age of 7.</p>
        <br>
        <a href="addSchool.php" class="button">Add</a>
        <form class="search" action="doSearchSchool.php" method='post'>
          <input type="text" placeholder="Enter school name..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>

      </div>
      <div class="content-body">
        <?php
                    $query = "SELECT * FROM school";
                    $result = $mysqli->query($query);
                    ?>


          <table id="myTable">
            <tr>
              <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
              <th onclick="sortTable(0)">School Name</th>
              <th onclick="sortTable(1)">Address</th>
              <th onclick="sortTable(2)">Postal Code</th>
              <th onclick="sortTable(3)">Zone</th>
              <th onclick="sortTable(7)">Telephone</th>
              <th>Edit/Delete</th>


            </tr>

            <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
              <tr>
                <td>
                  <?php echo $row['school_name']; ?>
                </td>
                <td>
                  <?php echo $row['address']; ?>
                </td>
                <td>
                  <?php echo $row['postal_code']; ?>
                </td>
                <td>
                  <?php echo $row['zone']; ?>
                </td>
                <td>
                  <?php echo $row['telephone_no']; ?>
                </td>
                <td><a class="button" href='updateSchool.php?schoolID=<?php echo $row[' school_name ']; ?>'>Edit</a><a class="button" href='doDeleteSchool.php?schoolID="<?php echo $row[' school_name ']; ?>"'>Delete</a></td>


              </tr>

              <?php
                            }
                        } else {
                            echo "No results.";
                        }
                        ?>
          </table>
      </div>
    </div>
  </section>
</body>

</html>