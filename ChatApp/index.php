
<?php
#calling the database connection string 
include 'db.php';
?>

<!DOCTTYPE html>

<html>
    <head>
        <title>Group Chat App</title>
        <link rel="stylesheet" href="style.css" media="all"/> 

        <!-- write an ajax script for the page to auto-refresh using javascript -->
        <script>
        function ajax (){

            //send an ajax request 
            var req = new XMLHttpRequest();

            req.onreadystatechange = function(){

                //if all states have been reached and status completed...    
                if(req.readyState == 4 && req.status == 200){

                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }

            req.open('GET','chat.php',true); 
            req.send(); 
        }

        // set the auto-load feature for multiple browsers running the chat app
        setInterval(function(){ajax()},1000);
        
        </script>
    </head>

<!-- call the ajax function within the body tag -->
<body onload="ajax();">

<div id="container">
    <div id="chat_box"> 
        <div id="chat"></div>
    </div> 

    <form method="post" action="index.php">
    <input type="text" name="name" required placeholder="your name"/>
    <textarea name="message" required placeholder="your message"></textarea>
    <input type="submit" name="submit" value="SEND"/> 

    </form>

    <?php
    # set action if submit button is clicked 
    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $message = $_POST['message'];

        $query = "INSERT INTO chat (name,message) Values ('$name','$message')";

        $run = $con->query($query); 

        if($run) {
            echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true'/>";
        }
    }

    ?>


</div>


</body>

</html>


    