
<script src = "assets/js/jquery-3.5.1.js"></script>
		<section class="awe-section">
					<div class="container">
						
						<div class="page-title pb-40">
							<h2 class="page-title__title">Results</h2>
							<!--<p class="page-title__text">Curabitur elementum urna augue, eu porta</p>-->
							<div class="page-title__divider"></div>
						</div><!-- End / page-title -->
						
					</div>
				</section>
<div class="wil-content">
				
				<section class="awe-section bg-gray"> 
					<div class="container">
						
					  <div class="row">
						<div class = 'col-md-12 col-sm-12'>
							
							<?php
								//include("functions.php");
								$dblink = db_connect("contact_data");
								if(isset($_GET['sid']) && $_GET['sid']!=''){//check if session id is set and NOT NULL/blank
									$sid = $_GET['sid'];
									$sql = "Select `auto_id` from `accounts` where `session_id`='$sid'";
									$result = $dblink->query($sql) or
										die("<h2>Something went wrong with $sql".$dblink->error.'</h2>');
									if($result->num_rows<=0)
										redirect("index.php?page=login&errMsg=invalidSID");
									echo '<table class = "table table-striped">';
									echo '<thead>';
									echo '<tr>';
									echo '<th> ID </th>';
									echo '<th> First Name </th>';
									echo '<th> Last Name </th>';
									echo '<th> Email</th>';
									echo '<th> Username</th>';
									echo '<th> Phone</th>';
									echo '<th> Password</th>';
									echo '<th> Comments</th>';
									echo '</tr>';
									echo '</thead>';
									echo '<tbody id="results">';
									echo '</tbody>';
									echo '</table>';
								}
								else{
									redirect("index.php?page=login&errMsg=NULLSID");
								}

									
							?>
							
						  </div>
						</div>
					</div>
			</section>
</div>
<script>
	function refresh_data(){
		$.ajax({
			type: 'post', 
			url: 'https://ec2-18-208-144-8.compute-1.amazonaws.com/hw19/query_contacts.php',
			success: function(data){
				$('#results').html(data); //jquery equavalent of : document.getElementById('results').innerHTML=data
			}
		});
	}
	setInterval(function(){refresh_data();}, 500);
	
</script>