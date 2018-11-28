<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css/main.css">
    <?php include "connectDB.php" ?>
	 <link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <body>
			<?php include "navFront.php" ?>
        <section id="content">
            <div class="content">
                <div class="content-header">
                    <h1>Search schools</h1>
                    <br>
										<h2>By Zone</h2>
                    <form  method="GET">
                        <select type="text" id="query_zone" name="query_zone">
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
                        <input type="submit" value="Search" />
                    </form>
										<h2>By nearest MRT</h2>
                    <form  method="GET">
                        <select type="text" id="query_MRT" name="query_MRT">
                          <?php
                                    $query = "SELECT station_name FROM mrt_station";
                                    $result = $mysqli->query($query);
																		

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["station_name"] ?>"><?php echo $row["station_name"]; $data = $row["station_name"];?> MRT (  
																							<?php
																							$query2 = "SELECT M.station_id FROM mrt_station M where M.station_name = '$data'";
                                    					$result2 = $mysqli->query($query2);
																							echo mysqli_fetch_array($result2)["station_id"];
																							?> )
													
																						</option>

                                            <?php
                                        }
                                    }
                                    ?>
                      </select>
                        <input type="submit" value="Search" />
             
                    
                </div>
                <div class="content-body">

                    <?php 
										if (isset($_GET["query_zone"])){
											$inputQ = $_GET['query_zone'];
                    	$query = "SELECT DISTINCT school_name FROM school WHERE zone = '$inputQ'"; 
										} else if (isset($_GET["query_MRT"])){
											$inputQ = $_GET['query_MRT'];
                    	$query = "SELECT DISTINCT school_name FROM school WHERE mrt_desc LIKE '%$inputQ%'"; 
										}       
                    $result = $mysqli->query($query);
                    
                    ?>


                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <h2 onclick="sortTable(0)">Schools <?php 
															if (isset($_GET["query_zone"])){
																echo "in the $inputQ zone";
															} else if (isset($_GET["query_MRT"])){
																echo "near $inputQ MRT"; 
															}  ?></h2>      
                        </tr>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['school_name']; ?></td>

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