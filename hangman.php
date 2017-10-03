<?php
// Start the session
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Hangman</title>
  <link rel="stylesheet" type="text/css" href=""> </link>	
  <style>
	<?php include './css/hangman.css'; ?>
  </style>

 </head>
 <body style="text-align: center; content-align: center;">
 
 
	<p>
		<h1> Hangman </h1>	 
	</p>
	
	<p>
		<form action="" method="post">
			<!-- <p> <?php //echo $words[$clue_index]; ?> </p> -->
			  
		
			<p>Guess the Letter</p>
			
			
			<!-- Image Container -->
			<p>
				<?php
				
					include 'constants.php';
					include 'functions.php';
			
					//$_SESSION = array();
					//$_POST = array();
					
					///////////// IGNORE////////////////////////
					/////clue_index is set during the first page load. It is not changed everytime the page is refreshed due to 
					///// the Submit Button. Meaning $clue_index is immutable after the first page load.
					/*$lock = 0;
					if($lock == 0){
						$clue_index = mt_rand(0,1);
						$lock++;
					}*/
					
					//Another Immutable value?
					//define('CLUE_IDX', mt_rand(0,1));
					
					
					//Image Index to go through the Array of Images
					//Depricated
					//$img_idx = 0;
					
					
					
					
						
						
					///////////// IGNORE////////////////////////
					
					
					
					
					//Giving the user the clue and the word size
					echo "<h3>"."The word has ".strlen($words[$_SESSION["CLUE_IDX"]])." letters and is a " .$clues[$_SESSION["CLUE_IDX"]] ."</h3>";
					

					
				
					//Seeing if the User hit the Submit button. On the screen the button will show as "Enter". And making sure the User Input is not empty
					if (isset($_POST['submit']) && isset($_POST['letter'])){
						
						
			
						
							//Checking to see if the User Input Ltter is inside of the word. Update Image if user input is not found in the word
							//https://secure.php.net/manual/en/function.stripos.php
							if( stripos($words[$_SESSION["CLUE_IDX"]], $_POST['letter']) == false){
								
									//Index out of Bounds protection. 3 is the size of the image array
									if($_SESSION["IMG_IDX"] < 7){
										echo "<img src=\" ". $images[$_SESSION["IMG_IDX"]] .  " \" >"."</img>";
										// Update Image Index	
										//updateImgIndex();
										$_SESSION["IMG_IDX"]++;
										echo "<p>"."Image Index: ". $_SESSION["IMG_IDX"]."</p>";
										
										if( $_SESSION["IMG_IDX"] > 3){// 3 Corresponds to Size of Image Array, if user has run out of tries

										updateImgIndex();
									}
								
								
								
									if($_SESSION["IMG_IDX"] == 7){// 3 Corresponds to Size of Image Array, if user has run out of tries

										echo "<p>"."Game Over"."</p>";
										
										}

									}
								
								
									
									
								
							}

							
							
							

						//discardOldValues();
						
					}
					
				?>
			</p>
			
			<!-- Letter Input Box -->
			<p><input name="letter" type="text" size="20" /></p>
			
			<!-- Enter Button -->
			<p>
				<input type="submit" value="Enter" name="submit"></input>
				<!-- <input type="submit" value="Enter" name="submit"></input> -->
			</p>
			
		</form>
	</p>
	
	
	
 
 </body>
</html>