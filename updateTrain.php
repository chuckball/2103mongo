<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Update MRT</h1>
                    <p>Update MRT stations in this page</p>
                    <br>

                </div>
                <?php
                //Get trainID
                $trainID = $_GET['trainID'];
                $query = "SELECT * FROM mrt_station WHERE station_id = '$trainID'";
                $result = $mysqli->query($query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="content-body">
                        <div class="form-style-2">
                            <div class="form-style-2-heading">Update MRT station information</div>
                            <form action="doUpdateTrain.php" method="post">
                                <label for="station_id"><span>Station ID <span class="required">*</span></span><input type="text" class="input-field" name="station_id" value="<?php echo $trainID ?>" readonly/></label>
                                <label for="station_name"><span>Station Name <span class="required">*</span></span><input type="text" class="input-field" name="station_name" value="<?php echo $row['station_name'] ?>" /></label>
                                <label for="station_line"><span>Station Line</span><select name="station_line" class="select-field" value="">
                                        <option selected value="<?php echo $row['station_line'] ?>"><?php echo $row['station_line'] ?></option>

                                        <?php
                                        $query = "SELECT DISTINCT station_line FROM mrt_station WHERE NOT station_line='" . $row['station_line'] . "' ORDER BY station_line ASC";
                                        $result = $mysqli->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row2 = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row2["station_line"] ?>"><?php echo $row2["station_line"] ?></option>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </label>

                                <label><span> </span><input type="submit" value="Update" /></label>
                            </form>
                        <?php } ?>
                    </div>


                </div> 
            </div>
        </section>
    </body>
</html>
