<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Update Co-Curriculum Activities</h1>
                    <p>Update CCA in this page</p>
                    <br>

                </div>
                <?php
                $ccaName = $_GET['ccaName'];
                $schoolName = $_GET['schoolName'];
                $query = "SELECT * FROM cca WHERE cca_name = '$ccaName' AND school_school_name = '$schoolName'";
                $result = $mysqli->query($query);
                if (mysqli_num_rows($result) > 0) {
                    $row1 = mysqli_fetch_assoc($result);
                    ?>
                    <div class="content-body">
                        <div class="form-style-2">
                            <div class="form-style-2-heading">Make changes to CCA information</div>
                            <form action="doUpdateCCA.php?oldCCAName=<?php echo $ccaName ?>&oldSchoolName=<?php echo $schoolName?>" method="post">
                                <label for="cca_name"><span>CCA Name <span class="required">*</span></span><input type="text" class="input-field" name="cca_name" value="<?php echo $row1['cca_name'] ?>" /></label>
                                <label for="cca_group"><span>CCA Group</span><select name="cca_group" class="select-field">
                                        <?php
                                        $query = "SELECT DISTINCT cca_group FROM cca";
                                        $result = $mysqli->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row["cca_group"] ?>"><?php echo $row["cca_group"] ?></option>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </label>
                                <label for="school_section"><span>School Section</span><select name="school_section" class="select-field">
                                        <?php
                                        $query = "SELECT DISTINCT school_section FROM cca";
                                        $result = $mysqli->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row["school_section"] ?>"><?php echo $row["school_section"] ?></option>

                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </label>
                                
                                
                                <label for="school_name"><span>School Name</span><select name="school_name" class="select-field">
                                  <option value="<?php echo $row1["school_school_name"] ?>"><?php echo $row1["school_school_name"] ?></option>
                                        <?php
                                        $query = "SELECT school_name FROM school WHERE NOT school_name ='". $row1['school_school_name'] ."' ";
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

                                <label><span> </span><input type="submit" value="Update" /></label>
                            </form>
                        </div>
                    <?php } ?>

                </div> 
            </div>
        </section>
    </body>
</html>
