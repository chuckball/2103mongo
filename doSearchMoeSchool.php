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
          <h1>MOE Programs</h1>
          <p>An educational program is a program written by the institution or ministry of education which determines the learning progress of each subject in all the stages of formal education.</p>
          <br>
          <a href="addMOEProgram.php" class="button">Add</a>
          <form class="search" action="doSearchMoeSchool.php" method='post'>
            <input type="text" placeholder="Search by school name..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div class="content-body">
          <?php
                    $query = "SELECT * FROM moe_programme WHERE school_school_name LIKE '%$search%'";
                    $result = $mysqli->query($query);
                    ?>
            <h1>
              Search results for
              <?php echo $search; ?>
            </h1>

            <table id="myTable">
              <tr>
                <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
                <th onclick="sortTable(0)">Program Name</th>
                <th onclick="sortTable(1)">School Name</th>
                <th>Delete</th>
              </tr>

              <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                <tr>
                  <td>
                    <?php echo $row['program_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['school_school_name']; ?>
                  </td>
                  <td><a class="button" href='doDeleteMOEProgram.php?programName=<?php echo $row[' program_name ']; ?>&schoolName=<?php echo $row['school_school_name '] ?>'>Delete</a></td>

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