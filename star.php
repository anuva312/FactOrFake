<?php
  error_reporting(E_ALL ^ E_NOTICE);
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FakeOrFact</title>
    <link rel="stylesheet" href="star.css">
	  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
    * {
      box-sizing: border-box;
    }

    	* {
      box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px; /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }</style>
  </head>
  <body style="background-color:#26BEEE">
    <section class="header">
  		<nav>
          <div class="nav-links" id="navLinks">
    			<i class="fa fa-times" onclick="hideMenu()"></i>
  				 <ul>
  					<li><a href="index.html">HOME</a></li>
  					<li><a href="about.html">About Us</a></li>
            <li><a href="star.php">Review</a></li>
           </ul>
  			</div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
     </nav>
   <div class="row">
        			<div class="sec"><div class="sec">
        			</br>
        			</div>
        <div class="ima">
        	<br><div class="column"><center>
            <form action="" method="post">
            <div class="container">

                <div class="star-widget">
                  <input type="radio" name="rate" value="5" id="rate-5">
                  <label for="rate-5" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="4" id="rate-4">
                  <label for="rate-4" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="3" id="rate-3">
                  <label for="rate-3" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="2" id="rate-2">
                  <label for="rate-2" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="1" id="rate-1">
                  <label for="rate-1" class="fas fa-star"></label><br><br>

              <textarea rows="2" cols="50" name="name" placeholder="Name" required></textarea><br><br>
              <textarea rows="4" cols="50" name="comments" placeholder="Describe your experience here" required></textarea>
        		  <br><br></h2></center><br>
        		  <center><input type="submit" name="submit" value="Submit" style="color:black;width:70px;height:30px"></center>
        		</form>

        </div>
      </div>

          			<?php
          				if(isset($_POST['submit']))
          				{
          				mysqli_query($db,"INSERT INTO `comments`(`id`,`rating`,`name`,`comments`) VALUES(' ','$_POST[rate]','$_POST[name]','$_POST[comments]');");
          				}
          			?>
                <div class="column">
              <div class="box"><center>
                <?php
                $count=0;
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC LIMIT 3";

                $res=mysqli_query($db,$q);
                echo "<p><strong><i><font color=black font face='courier' size='5pt'> What our latest users are saying..</font></t></strong></p>";
                while($row=mysqli_fetch_assoc($res))
                {

                   echo "<br>";
                   echo "<td>"; echo $row['name']; echo "&nbsp&nbsp"; echo "<i>Says</i>"; echo "&nbsp&nbsp"; echo "&nbsp&nbsp";  echo "</td>";
                   echo "<td>"; echo $row['comments']; echo "</td>";
                   echo "</tr>"; echo "&nbsp&nbsp";
                   if($row['rating']=='1'){
                     print "⭐";
                   }
                   if ($row['rating']=='2') {
                     print "⭐⭐";
                   }
                   elseif ($row['rating']=='3') {
                     print "⭐⭐⭐";
                   }
                   elseif ($row['rating']=='4') {
                     print "⭐⭐⭐⭐";
                   }
                   else{
                     print "⭐⭐⭐⭐⭐";
                   }
                 echo "<br>";
               }
              ?></center></div></section>
<script>
      var navLinks = document.getElementById("navLinks");
      function showMenu(){
        navLinks.style.right="200px";
      }
      function hideMenu(){
        navLinks.style.right="200px";
      }
      const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
</script>

  </body>
</html>
