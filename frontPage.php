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
										<h2>By 1 CCA</h2>
                    <form  method="GET">
                        <select type="text" id="query_cca" name="query_cca">
                          <?php
                                    $query = "SELECT DISTINCT cca_name FROM cca";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["cca_name"] ?>"><?php echo $row["cca_name"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                      </select>                    
                        <input type="submit" value="Search" />
                    </form>
										<h2>By 2 CCAs</h2>
                    <form  method="GET">
                        <select type="text" id="query_cca2" name="query_cca2">
                          <?php
                                    $query = "SELECT DISTINCT cca_name FROM cca";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["cca_name"] ?>"><?php echo $row["cca_name"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                      </select>   
											<select type="text" id="query_cca22" name="query_cca22">
                          <?php
                                    $query = "SELECT DISTINCT cca_name FROM cca";
                                    $result = $mysqli->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["cca_name"] ?>"><?php echo $row["cca_name"] ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                      </select>                
                        <input type="submit" value="Search" />
                    </form>
										<h2>By MOE Programmes</h2>
                    <form  method="GET">
                        <select type="text" id="query_moe" name="query_moe">
                          <?php
                                    $query = "SELECT DISTINCT program_name FROM moe_programme";
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
                        <input type="submit" value="Search" />
                    </form>
										<h2>By Special Needs Facilities</h2>
                    <form  method="GET">
                        <select type="text" id="query_SNF" name="query_SNF">

                          <option value="hearing_loss">HEARING LOSS</option>
													<option value="mild_special_needs">MILD SPECIAL NEEDS</option>
													<option value="visually_impaired">VISUALLY IMPAIRED</option>
													<option value="physical_disabilities">PHYSICAL DISABILITIES</option>


                      </select>                    
                        <input type="submit" value="Search" />
                    </form>
                  
                    
                    
                </div>
                <div class="content-body">

                    <?php 
										if (isset($_GET["query_cca"])){
											$inputQ = $_GET['query_cca'];
                    	$query = "SELECT DISTINCT school_school_name FROM cca WHERE cca_name = '$inputQ'"; 
										} else if (isset($_GET["query_cca2"])){
											$inputQ = $_GET['query_cca2'];
											$inputQ2 = $_GET['query_cca22'];
                    	$query = "SELECT DISTINCT C.school_school_name, C.cca_name FROM CCA C WHERE C.cca_name = '$inputQ' 
											AND C.school_school_name IN ( SELECT C2.school_school_name FROM CCA C2 WHERE C2.cca_name = '$inputQ2') "; 
										}else if (isset($_GET["query_moe"])){
											$inputQ = $_GET['query_moe'];
                    	$query = "SELECT DISTINCT school_school_name FROM moe_programme WHERE program_name = '$inputQ'"; 
										} else if (isset($_GET["query_SNF"])){
											$inputQ = $_GET['query_SNF'];
                    	$query = "SELECT school_school_name FROM special_needs_facilities WHERE $inputQ = 'Yes'";
											
										}           
                    $result = $mysqli->query($query);
                    
                    ?>


                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <h2 onclick="sortTable(0)">Schools with <?php 
															if (isset($_GET["query_cca"])){
																echo "$inputQ CCA";
															} else if (isset($_GET["query_cca2"])){
																echo "both $inputQ and $inputQ2 CCA"; 
															}else if (isset($_GET["query_moe"])){
																echo "$inputQ"; 
															}	else if (isset($_GET["query_SNF"])){
																echo "$inputQ facilities";
															}?></h2>      
                        </tr>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['school_school_name']; ?></td>

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