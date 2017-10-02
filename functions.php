<?php

//include 'constants.php';
include_once('constants.php') ;


/* Picks a random index that is then used to access the word and clue*/
function PickWord(){
	$_SESSION["CLUE_IDX"] = mt_rand(0,1); // 0,1 -> an array of size 2
}

//Seeing if the user hit the submit button
function ifSubmit(){
	if(isset($_POST['submit']) && isset($_POST['letter']) ){ //trim($_POST['letter']) != ''
		return true;
	}else{return false;}
		
}

//Discards Old Values 
function discardOldValues(){
	//Discard Old Values
	$_POST['letter'] = null;
	$_POST['submit'] = null;
}

//Checking to See if the User Input is right
function isUserInputCorrect(){
	$words = array("Carrot", "Banana");

	if( stripos($words[$_SESSION["CLUE_IDX"]], $_POST['letter']) === false ){
		return true;
	}else{return false;}
		
}


function updateImgIndex(){
	$_SESSION["IMG_IDX"]++;
}


?>