<?php
					
					
					//Array of Images
					$images = array('./img/1.jpg', './img/2.jpg', './img/3.jpg');
					
					//Array of "words and clues" their index's correspond 1 to 1
					//Dictionary of Words to pick from
					$words = array("Carrot", "Banana");
					//$GLOBALS[w] = $words;
					$clues = array('Vegetable','Fruit');
					
					//Picking a random word from the above defined Word dictionary
					if(!isset($_SESSION["CLUE_IDX"])){ // We dont want this variable to be reset everytime the page is refreshed, so we set it only 
														// when it is not set. i.e the first time
														
						$_SESSION["CLUE_IDX"] = mt_rand(0,1); // The Zero to One correspond to the size of the $words array(size = 2)
						$_SESSION["IMG_IDX"] = 0 ;
					}
					
				

?>