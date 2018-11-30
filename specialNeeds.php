<!DOCTYPE html>
<html>
<?php include "head.php" ?>

<body>
  <?php include "nav.php" ?>
  <section id="content">
    <?php include "usernameHeader.php" ?>
    <div class="content">
      <div class="content-header">
        <h1>Special Need Facilities</h1>
        <p>Special needs used to be something new and foreign to teachers.</p>
        <br>
        <a href="addSpecialNeeds.php" class="button">Add</a>
        <form class="search" action="doSearchSpecialNeedSchool.php" method='post'>
          <input type="text" placeholder="Enter school name..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>


      </div>
      <div class="content-body">
        <?php
                    $query = "SELECT * FROM special_needs_facilities ORDER BY school_school_name ASC";
                    $result = $mysqli->query($query);
                    ?>


          <table id="myTable">
            <tr>
              <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
              <th onclick="sortTable(0)">School Name</th>
              <th onclick="sortTable(1)">Option Code</th>
              <th onclick="sortTable(2)">Hearing Loss</th>
              <th onclick="sortTable(2)">Mild Special Needs</th>
              <th onclick="sortTable(2)">Visually Impaired</th>
              <th onclick="sortTable(2)">Physically Disabled</th>
              <th>Edit/Delete</th>

            </tr>

            <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
              <tr>
                <td>
                  <?php echo $row['school_school_name']; ?>
                </td>
                <td>
                  <?php echo $row['option_code']; ?>
                </td>
                <td>
                  <?php echo $row['hearing_loss']; ?>
                </td>
                <td>
                  <?php echo $row['mild_special_needs']; ?>
                </td>
                <td>
                  <?php echo $row['visually_impaired']; ?>
                </td>
                <td>
                  <?php echo $row['physical_disabilities']; ?>
                </td>
                <td><a class="button" href='updateSpecialNeeds.php?schoolName=<?php echo $row['school_school_name']; ?>'>Edit</a><a class="button" href='doDeleteSpecialNeeds.php?schoolName=<?php echo $row['school_school_name']; ?>'>Delete</a></td>
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