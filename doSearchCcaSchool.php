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
          <h1>Co-Curriculum Activities</h1>
          <p>In Singapore, a co-curricular activity (CCA), previously known as an extracurricular activity (ECA), is a non-academic activity that all students, regardless of nationality, must participate in. This policy was introduced by the Ministry of
            Education (MOE).
          </p>
          <br>
          <a href="addCCA.php" class="button">Add</a>
          <form class="search" action="doSearchCcaSchool.php" method='post'>
            <input type="text" placeholder="Search by school name..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div class="content-body">
          <?php
                    $query = "SELECT * FROM cca WHERE school_school_name LIKE '%$search%'";
                    $result = $mysqli->query($query);
                    ?>
            <h1>
              Search results for
              <?php echo $search; ?>
            </h1>

            <table id="myTable">
              <tr>
                <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
                <th onclick="sortTable(0)">CCA Name</th>
                <th onclick="sortTable(1)">CCA Group</th>
                <th onclick="sortTable(2)">School Section</th>
                <th onclick="sortTable(3)">School Name</th>
                <th>Edit/Delete</th>
              </tr>

              <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                <tr>
                  <td>
                    <?php echo $row['cca_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['cca_group']; ?>
                  </td>
                  <td>
                    <?php echo $row['school_section']; ?>
                  </td>
                  <td>
                    <?php echo $row['school_school_name']; ?>
                  </td>
                  <td><a class="button" href='updateCCA.php?ccaName=<?php echo $row['cca_name']; ?>&schoolName=<?php echo $row['school_school_name'] ?>'>Edit</a><a class="button" href='doDeleteCCA.php?ccaName=<?php echo $row[' cca_name
                      ']; ?>&schoolName=<?php echo $row['school_school_name '] ?>'>Delete</a></td>

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