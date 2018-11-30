<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css/main.css">
    <?php include "mongoDB.php" ?>
	 <link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <body>
			<?php include "mongoNavFront.php" ?>
        <section id="content">
            <div class="content">
                <div class="content-header">
                    <h1>Search schools</h1>
                    <br>
										<h2>By Zone</h2>
                    <form  method="GET">
                        <select type="text" id="query_zone" name="query_zone">
                          <?php			
																			
																			$collection = $db->school;
																			// find everything in the collection
																			//$cursor = $collection->find();
																			$distinct_zone = $db->command(array("distinct" => "school", "key" => "zone"))->toArray();

																			// iterate through the results
																			foreach ($distinct_zone['0']['values'] as $rows) {
								
																					?>
                                            <option value="<?php echo $rows ?>"><?php echo $rows ?></option>

                                           <?php
																			}
                                    ?>
                      </select>                    
                        <input type="submit" value="Search" />
                    </form>
										<h2>By nearest MRT</h2>
                    <form  method="GET">
                        <select type="text" id="query_MRT" name="query_MRT">
                          <?php			
																		$collection = $db->mrt_station;
																			// find everything in the collection
																			$cursor = $collection->find();
																			// iterate through the results
                                    foreach ($cursor as $document) {
								
																					?>
                                            <option value="<?php echo $document["station_name"] ?>"><?php echo $document["station_name"] ?> MRT (  
																							<?php
																			
																							echo $document["station_id"];
																							?> )</option>

                                           <?php
																			}
															$collection = $db->school;
															$cursor = $collection->find();
                                    ?>
                      </select>
                        <input type="submit" value="Search" />
             
                    
                </div>
                <div class="content-body">

                    <?php 
										if (isset($_GET["query_zone"])){
											$inputQ = $_GET['query_zone'];
											$collection = $db->school;
                    	$cursor = $collection->find(array("zone" => $inputQ));
										} else if (isset($_GET["query_MRT"])){
											$inputQ = $_GET['query_MRT'];
											$collection = $db->school;
                    	$cursor = $collection->find(array("mrt_desc" => $inputQ));
										}       
                    
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
												foreach ($cursor as $document) {
													?>
                                <tr>
                                    <td><?php echo $document['school_name']; ?></td>

                                </tr>

                            <?php
												}
										

                        ?>
                    </table>
                </div> 
            </div>
        </section>
    </body>
</html>