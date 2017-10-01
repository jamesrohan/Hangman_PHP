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
	<?php include ''; ?>
  </style>

 </head>
 <body style="text-align: center; content-align: center;">
 
 
	<p>
		<h1> Hangman </h1>	 
	</p>
	
	<p>
		<?php
		
		
		?>
		
	</p>
	
	
	<p>
		<form action="" method="post">
			<!-- <p> <?php //echo $words[$clue_index]; ?> </p> -->
			  
		
			<p>Guess the Letter</p>
			
			<!-- Letter Input Box -->
			<p><input name="letter" type="text" size="20" /></p>
			
			<!-- Enter Button -->
			<p>
				<input type="submit" value="Enter" name="submit"></input>
				<input type="submit" value="Enter" name="submit"></input>
			</p>
			
			
			<!-- Image Container -->
			<p>
				<?php
				
					//Array of Images
					$images = array('./img/1.jpg', './img/2.jpg', './img/3.jpg');
					
					//Array of "words and clues" their index's correspond 1 to 1
					//Dictionary of Words to pick from
					$words = array("Carrot", "Banana");
					$clues = array('Vegetable','Fruit');
					
					
					//Picking a random word from the above defined Word dictionary
					if(!isset($_SESSION["CLUE_IDX"])){ // We dont want this variable to be reset everytime the page is refreshed, so we set it only 
														// when it is not set. i.e the first time
						$_SESSION["CLUE_IDX"] = mt_rand(0,1); // The Zero to One correspond to the size of the $words array(size = 2)
						$_SESSION["IMG_IDX"] = 0 ;
					}
					
					//Making $_SESSION["CLUE_IDX"] more redable
					
					
					
					
					
					
					
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
					///////////// IGNORE////////////////////////
					
					
					
					
					//Giving the user the clue and the word size
					echo "<h3>"."The word has ".strlen($words[$_SESSION["CLUE_IDX"]])." letters and is a " .$clues[$_SESSION["CLUE_IDX"]] ."</h3>";
					
				
					//Image Index to go through the Array of Images
					//Depricated
					$img_idx = 0;
				
					//Seeing if the User hit the Submit button. On the screen the button will show as "Enter". And making sure the User Input is not empty
					if (isset($_POST['submit']) && trim($_POST['letter']) != ''){
						//Reading the user input upon submit
						$user_input = $_POST['letter'];
						
						
						
							//Checking to see if the User Input Ltter is inside of the word. Update Image if user input is not found in the word
							//https://secure.php.net/manual/en/function.stripos.php
							if( stripos($words[$_SESSION["CLUE_IDX"]], $user_input) === false ){
								
								//Index out of Bounds protection. 3 is the size of the image array
								if($_SESSION["IMG_IDX"]++ < 3){
									echo "<img src=\" ". $images[$_SESSION["IMG_IDX"]] .  " \" >"."</img>";
									}
								// Update Image Index	
								$_SESSION["IMG_IDX"]++;
								
									if($_SESSION["IMG_IDX"]++ > 3){// 3 Corresponds to Size of Image Array
										echo "<p>"."Game Over"."</p>";
										// remove all session variables
										session_unset(); 

										// destroy the session 
										session_destroy(); 
									}
								
							}
						
					}
					
				?>
			</p>
			
		</form>
	</p>
	
	
	
 
 </body>
</html>