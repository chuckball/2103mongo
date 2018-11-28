<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Add School</h1>
                    <p>Add new schools in this page</p>
                    <br>

                </div>
                <div class="content-body">
                    <div class="form-style-2">
                        <div class="form-style-2-heading">Fill up the new school information</div>
                        <form action="doAddSchool.php" method="post">
                            <label for="school_name"><span>School Name <span class="required">*</span></span><input type="text" class="input-field" name="school_name" value="" /></label>
                            <label for="address"><span>Address <span class="required">*</span></span><input type="text" class="input-field" name="address" value="" /></label>
                            <label for="postal_code"><span>Postal Code <span class="required">*</span></span><input type="text" class="input-field" name="postal_code" value="" /></label>
                            <label for="zone"><span>Zone</span><select name="zone" class="select-field">
                                    <?php
                                    $query = "SELECT DISTINCT zone FROM school";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["zone"] ?>"><?php echo $row["zone"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                            <label for="url"><span>URL <span class="required">*</span></span><input type="text" class="input-field" name="url" value="" /></label>
                            <label for="mrt"><span>Nearest MRT</span><select name="mrt" class="select-field">
                                    <?php
                                    $query = "SELECT station_id, station_name FROM mrt_station";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["station_id"] ?>"><?php echo $row["station_id"] . ' ' . $row['station_name'] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </label>
                            <label for="bus"><span>Buses <span class="required">*</span></span><input type="text" class="input-field" name="bus" value="" /></label>
                            <label for="telephone"><span>Telephone <span class="required">*</span></span><input type="text" class="input-field" name="telephone" value="" /></label>
                            <label for="dgp_code"><span>Planning Area</span><select name="dgp_code" class="select-field">
                                    <?php
                                    $query = "SELECT DISTINCT dgp_code FROM school ORDER BY dgp_code ASC";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["dgp_code"] ?>"><?php echo $row["dgp_code"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                            <label for="cluster_code"><span>Cluster Code</span><select name="cluster_code" class="select-field">
                                    <?php
                                    $query = "SELECT DISTINCT cluster_code FROM school ORDER BY cluster_code ASC";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["cluster_code"] ?>"><?php echo $row["cluster_code"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                            <label for="vision"><span>Vision <span class="required">*</span></span><textarea name="vision" class="textarea-field"></textarea></label>
                            <label for="mission"><span>Mission <span class="required">*</span></span><textarea name="mission" class="textarea-field"></textarea></label>

                            <label><span> </span><input type="submit" value="Submit" /></label>
                        </form>
                    </div>


                </div> 
            </div>
        </section>
    </body>
</html>
