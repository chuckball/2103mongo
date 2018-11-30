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
          <h1>Schools search by name</h1>
          <form class="search" method='GET'>
            <input type="text" id="search" placeholder="Enter school name..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>

        </div>
        <div class="content-body">
          <?php
										$inputQ = "";
										if (isset($_GET["search"])){
																$inputQ = $_GET['search'];
															}
										
										$collection = $db->school;

										$cursor = $collection->find([
												'school_name' => new MongoDB\BSON\Regex($inputQ, 'i'),
										]);
																			//$cursor = $collection->find();

                    ?>

            <h1>
              Search results for
              <?php echo $inputQ; ?>
            </h1>
            <table id="myTable">
              <tr>
                <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->
                <th onclick="sortTable(0)">School Name</th>
                <th onclick="sortTable(1)">Address</th>
                <th onclick="sortTable(2)">Postal Code</th>
                <th onclick="sortTable(3)">Zone</th>
								<th onclick="sortTable(4)">Email</th>

                <th onclick="sortTable(7)">Telephone</th>
								<th onclick="sortTable(8)">Area</th>



              </tr>
							<?php
												foreach ($cursor as $document) {
													?>
                                <tr>
                                    <td><?php echo $document['school_name']; ?></td>
																		<td><?php echo $document['address']; ?></td>
																		<td>
                    <?php echo $document['postal_code']; ?>
                  </td>
                  <td>
                    <?php echo $document['zone']; ?>
                  </td>
									<td>
                    <?php echo $document['url']; ?>
                  </td>
                  <td>
                    <?php echo $document['telephone_no']; ?>
                  </td>
									<td>
                    <?php echo $document['dgp_code']; ?>
                  </td>
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