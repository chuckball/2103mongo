<!DOCTYPE html>
<html>
<?php include "head.php" ?>

<body>
  <?php include "nav.php" ?>
  <section id="content">
    <?php include "usernameHeader.php" ?>
    <div class="content">
      <div class="content-header">
        <h1>Dashboard</h1>
        <p>An overview of all the data sets</p>

      </div>
      
      <div class="content-body">
        <p>
          <?php 
      
            $query = "SELECT DISTINCT COUNT(*) FROM school";
            $result = $mysqli->query($query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
      
          ?>
          Number of schools: <?php echo $row['COUNT(*)']; ?> </br>
      <?php }
            }?>
      <?php 
      
            $query = "SELECT COUNT( DISTINCT cca_name) AS numCCA FROM cca";
            $result = $mysqli->query($query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
      
          ?>
          Number of CCAs: <?php echo $row['numCCA']; ?> </br>
      <?php }
            }?>
        </p>
      </div>


    </div>
  </section>
</body>

</html>