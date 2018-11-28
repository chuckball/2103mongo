<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Update School</h1>
                    <p>Update School information in this page</p>
                    <br>

                </div>
                <?php
                //Get trainID
                $schoolID = $_GET['schoolID'];
                $query = "SELECT * FROM school WHERE school_name = '$schoolID'";
                $result = $mysqli->query($query);
                if (mysqli_num_rows($result) > 0) {
                    $row1 = mysqli_fetch_assoc($result);
                    ?>
                    <div class="content-body">
                        <div class="form-style-2">
                            <div class="form-style-2-heading">Update School information</div>
                            <form action="doUpdateSchool.php" method="post">
                                <label for="school_name"><span>School Name <span class="required">*</span></span><input type="text" class="input-field" name="school_name" value="<?php echo $schoolID ?>" readonly/></label>
                                <label for="address"><span>Address <span class="required">*</span></span><input type="text" class="input-field" name="address" value="<?php echo $row1['address'] ?>" /></label>
                                <label for="postal_code"><span>Postal Code <span class="required">*</span></span><input type="text" class="input-field" name="postal_code" value="<?php echo $row1['postal_code'] ?>" /></label>
                                <label for="zone"><span>Zone</span><select name="zone" class="select-field">
                                        <option value="<?php echo $row1["zone"] ?>"><?php echo $row1["zone"] ?></option>
                                        <?php
                                        $query = "SELECT DISTINCT zone FROM school WHERE NOT zone='" . $row1['zone'] . "'";
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
                                <label for="url"><span>URL <span class="required">*</span></span><input type="text" class="input-field" name="url" value="<?php echo $row1['url'] ?>" /></label>
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
                                <label for="bus"><span>Buses <span class="required">*</span></span><input type="text" class="input-field" name="bus" value="<?php echo $row1['bus_desc'] ?>" /></label>
                                <label for="telephone"><span>Telephone <span class="required">*</span></span><input type="text" class="input-field" name="telephone" value="<?php echo $row1['telephone_no'] ?>" /></label>
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
                                <label for="vision"><span>Vision <span class="required">*</span></span><textarea name="vision" class="textarea-field"><?php echo $row1['visionstatement_desc'] ?></textarea></label>
                                <label for="mission"><span>Mission <span class="required">*</span></span><textarea name="mission" class="textarea-field"><?php echo $row1['missionstatement_desc'] ?></textarea></label>


                                <label><span> </span><input type="submit" value="Update" /></label>
                            </form>
                        <?php } ?>
                    </div>


                </div> 
            </div>
        </section>
    </body>
</html>
