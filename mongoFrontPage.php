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
										<h2>By 1 CCA</h2>
                    <form  method="GET">
											 
                        <select type="text" id="query_cca" name="query_cca">
                          <?php
                                    $collection = $db->cca;
																			// find everything in the collection
                                      $distinct_cca_name = $db->command(array("distinct" => "cca", "key" => "cca_name"))->toArray();
																      
																			// iterate through the results
																			foreach ($distinct_cca_name['0']['values'] as $rows) {
								              
																					?>
                                            <option value="<?php echo $rows ?>"><?php echo $rows ?></option>

                                           <?php
																			}
                                    ?>
                      </select>                    
                        <input type="submit" value="Search" />
                  	</form>
										<h2>By MOE Programmes</h2>
                    <form  method="GET">
                        <select type="text" id="query_moe" name="query_moe">
                          <?php
                                    $collection = $db->moe_programme;
																			// find everything in the collection
																	  $distinct_moe = $db->command(array("distinct" => "moe_programme", "key" => "program_name"))->toArray();

																			// iterate through the results
																			foreach ($distinct_moe['0']['values'] as $rows) {
								
																					?>
                                            <option value="<?php echo $rows ?>"><?php echo $rows ?></option>

                                           <?php
																			}
																		$cursor = $collection->find();
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
											$collection = $db->cca;
                    	$cursor = $collection->find(array("cca_name" => $inputQ));
										} else if (isset($_GET["query_moe"])){
											$inputQ = $_GET['query_moe'];
											$collection = $db->moe_programme;
                    	$cursor = $collection->find(array("program_name" => $inputQ));
										} else if (isset($_GET["query_SNF"])){
											$inputQ = $_GET['query_SNF'];
											$collection = $db->special_needs_facilities;
                    	$cursor = $collection->find(array($inputQ => "Yes"));
										}           
                    
                    ?>


                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <h2 onclick="sortTable(0)">Schools <?php 
															if (isset($_GET["query_cca"])){
																echo "with $inputQ CCA";
															} else if (isset($_GET["query_moe"])){
																echo "with $inputQ"; 
															}	else if (isset($_GET["query_SNF"])){
																echo "with $inputQ facilities";
															}?></h2>      
                        </tr>

                        <?php
												foreach ($cursor as $document) {
													?>
                                <tr>
                                    <td><?php echo $document['school_school_name']; ?> </td>

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