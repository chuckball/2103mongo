<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Add MOE Program</h1>
                    <p>Add MOE Program in this page</p>
                    <br>

                </div>
                <div class="content-body">
                    <div class="form-style-2">
                        <div class="form-style-2-heading">Fill up the new MOE Program information</div>
                        <form action="doAddMOEProgram.php" method="post">
                            <label for="program_name"><span>Program Name</span><select name="program_name" class="select-field">
                                    <?php
                                    $query = "SELECT DISTINCT program_name FROM moe_programme ORDER BY program_name ASC";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["program_name"] ?>"><?php echo $row["program_name"] ?></option>

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
