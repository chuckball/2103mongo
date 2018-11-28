<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Add Co-Curriculum Activities</h1>
                    <p>Add CCA in this page</p>
                    <br>

                </div>
                <div class="content-body">
                    <div class="form-style-2">
                        <div class="form-style-2-heading">Fill up the new CCA information</div>
                        <form action="doAddCCA.php" method="post">
                            <label for="cca_name"><span>CCA Name <span class="required">*</span></span><input type="text" class="input-field" name="cca_name" value="" /></label>
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
                                    <?php
                                    $query = "SELECT school_name FROM school";
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

                            <label><span> </span><input type="submit" value="Submit" /></label>
                        </form>
                    </div>


                </div> 
            </div>
        </section>
    </body>
</html>
