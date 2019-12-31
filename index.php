<?php 

$author= $_POST['poll'];


$connection= mysqli_connect('localhost','rashid','rashid@123','poll_opinion');

$sql= "INSERT INTO poll(author,vote) VALUES ('$author','1')";

$run= mysqli_query($connection,$sql);

if($run==TRUE){
    echo 'Thanks for voting your favorite author';
}
else{
    echo 'Sorry something went wrong';
}

?>


  
    <div class="seeresult">
        <a href="pollindex.php">SEE RESULTS</a>
    </div>


