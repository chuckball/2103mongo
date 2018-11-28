<!DOCTYPE html>
<html>
<?php include "head.php" ?>

<body>
  <?php include "nav.php" ?>
  <section id="content">
    <?php include "usernameHeader.php" ?>
    <div class="content">
      <div class="content-header">
        <h1>Add Special Needs</h1>
        <p>Add new Special Needs data in this page</p>
        <br>

      </div>
      <div class="content-body">
        <div class="form-style-2">
          <div class="form-style-2-heading">Fill up the new Special Needs information</div>
          <form action="doAddSpecialNeeds.php" method="post">
            <label for="school_name"><span>School Name</span><select name="school_name" class="select-field">
                                    <?php
                                    $query = "SELECT school_name FROM school ORDER BY school_name ASC";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["school_name"] ?>"><?php echo $row["school_name"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </label>

            <label for="option_code"><span>Option Code <span class="required">*</span></span><input type="text" class="input-field" name="option_code" value="" /></label>
            
            <label for="hearing_loss"><span>Hearing Loss</span>
              <select name="hearing_loss" class="select-field">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
                                </select>
                            </label>
            <label for="mild_special_needs"><span>Mild Special Needs</span>
              <select name="mild_special_needs" class="select-field">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
                                </select>
                            </label>
            <label for="visually_impaired"><span>Visually Impaired</span>
              <select name="visually_impaired" class="select-field">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
                                </select>
                            </label>
            <label for="physical_disabilities"><span>Physical Disabilites</span>
              <select name="physical_disabilities" class="select-field">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
                                </select>
                            </label>
            <label><span> </span><input type="submit" value="Submit" /></label>
          </form>
        </div>


      </div>
    </div>
  </section>
</body>

</html>