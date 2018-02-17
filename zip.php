<?php

 require_once 'classes/Zipper.php';
 include'header.php';
 

  if (isset($_POST['zip'])) {
   
	 $zipper = new Zipper;

  
   $zipper->add(array('files/text/1.txt' ,'files/text/2.txt', 'files/text/3.txt'));
 
   
  
   //this will name the file a randon number between 10 and 100 
   $rand = rand(10, 100);

   $zipper->store('files/zips/'.$rand.'.zip');

   
    
   echo "<a href='index.php?success'><img src='images/back.png' width='100px' height='100px'></a><br><br>";

   
    

    echo "<div class='container'>
    <div class='col-md-12'>
    <h2> Zip File Created Successfuly</h2>
    <h3> Files you Zipped</h3>";
    $zipper->show();
    echo "</div></div>";
   
   


  }
?>