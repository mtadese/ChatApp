

<?php
    include 'db.php';
    #querying the table data to be displayed in chat box using PDO

    $query = "SELECT * FROM chat ORDER BY id DESC";
    $run = $con->query($query); 

    #using an array to call up and display all datarow in the table 
    while($row = $run->fetch_array()) :
?>

    <div id="chat_data">
    <!-- display the row data below -->
        <span style="color:green;"><?php echo $row['name'];?></span> :
        <span style="color:brown;"><?php echo $row['message'];?></span> 
        <span style="float:right;"><?php echo formatDate($row['date']);?></span>
    </div>
<?php endwhile;?> 