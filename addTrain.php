<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Add MRT</h1>
                    <p>Add new MRT stations in this page</p>
                    <br>

                </div>
                <div class="content-body">
                    <div class="form-style-2">
                        <div class="form-style-2-heading">Fill up the new MRT station information</div>
                        <form action="doAddTrain.php" method="post">
                            <label for="station_id"><span>Station ID <span class="required">*</span></span><input type="text" class="input-field" name="station_id" value="" /></label>
                            <label for="station_name"><span>Station Name <span class="required">*</span></span><input type="text" class="input-field" name="station_name" value="" /></label>
                            <label for="station_line"><span>Station Line</span><select name="station_line" class="select-field">
                                    <?php
                                    $query = "SELECT DISTINCT station_line FROM mrt_station ORDER BY station_line ASC";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["station_line"] ?>"><?php echo $row["station_line"] ?></option>

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
