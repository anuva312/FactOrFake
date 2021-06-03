<?php
  error_reporting(E_ALL ^ E_NOTICE);
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factorfake</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sigmar+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ url_for('static', filename='css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="review.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<header>
	    <nav id="header-nav" class="navbar navbar-default">
	      <div class="container">
	        <div class="navbar-header">
	 
	            <a class="navbar-brand brand-heading" href="{{ url_for('home', filename='index.html') }}" id="brand-title">FactOrFake</a>
	          
	          <button type="button" class="navbar-toggle collapsed visible-xs" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>

	        <div id="collapsable-nav" class="collapse navbar-collapse">
	           <ul id="nav-list" class="nav navbar-nav navbar-right text-center">
	            <li class = "visible-xs">
	              <a href="{{ url_for('home', filename='index.html') }}"> 
					  <!-- add link to home page -->
	                <span>Home</span></a>
	            </li>
	            <li class = "visible-xs">
	              <a href="">
					  <!-- add link to review page -->
	                <span>Review</span></a>
	            </li>
	            <li class = "visible-xs">
	              <a href="">
					  <!-- aadd link to about page -->
	                <span>About Us</span></a>
	            </li>
				<li class="hidden-xs menu_buttons">
					<a href="{{ url_for('home', filename='index.html') }}">Home</a>
				</li class="hidden-xs menu_buttons">
				<li class="hidden-xs menu_buttons">
					<a href="{{ url_for('home', filename='about.html') }}">About</a>
				</li class="hidden-xs menu_buttons">
				<li class="hidden-xs menu_buttons">
					<a href="">Review</a>
				</li>
	          </ul><!-- #nav-list -->
	        </div><!-- .collapse .navbar-collapse -->
	      </div><!-- .container -->
	    </nav><!-- #header-nav -->
	</header>
	

<div class="row">
	<section class="col-lg-4 col-md-6 col-sm-12 col-xs-12" id="input-form">
            <form action="" method="post">
            <div class="container">

                <div class="star-widget"><center>
                  <input type="radio" name="rate" value="5" id="rate-5">
                  <label for="rate-5" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="4" id="rate-4">
                  <label for="rate-4" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="3" id="rate-3">
                  <label for="rate-3" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="2" id="rate-2">
                  <label for="rate-2" class="fas fa-star"></label>
                  <input type="radio" name="rate" value="1" id="rate-1">
                  <label for="rate-1" class="fas fa-star"></label><br><br></center>
              <textarea rows="2" cols="50" name="name" placeholder="Name" required style="border-radius:10px;"></textarea><br><br>
              <textarea rows="4" cols="50" name="comments" placeholder="Describe your experience here" required style="border-radius:10px;"></textarea>
        		  
        		  <center><input type="submit" name="submit" id="predict" value="Submit"></center>
        		</form>

				</div>
			</div>
     

	
	
			<?php
          				if(isset($_POST['submit']))
          				{
          				mysqli_query($db,"INSERT INTO `comments`(`id`,`rating`,`name`,`comments`) VALUES(' ','$_POST[rate]','$_POST[name]','$_POST[comments]');");
          				}
          			?></section>	
	<section class="col-lg-4 col-md-6 col-sm-12 col-xs-12" id="intro">
		
			
                <div class="column"><center><h1 style="font-family:'Satisfy',cursive;color:black;font-size:40px;"> What our latest users are saying..</h1></center>
              <div class="box"><center>
                <?php
                $count=0;
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC LIMIT 3";

                $res=mysqli_query($db,$q);
          
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
  </body>
</html>

</div>

</body>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</html>