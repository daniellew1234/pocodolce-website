<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, intial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>feedback List</title>

<style type = "text/css">
body {
	font-family: tahoma, helvetica, arial, sans-serif;
	}
table, tr, td, th {
	text-align: center;
	font-size: .9em;
	border: 3px groove;
	padding: 5px;
	}
h1 {
	text-align: center;
      color: pink;
	  font-family: "Georgia",serif;
	  font-weight: Bold;
    }
	
	h2,h4{
	  font-weight: Bold;
	  padding-left:10px;
	}
    p{
	  padding: 10px;
	  font-size: 18px;
	} 
</style>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!--beginning of container-fluid (navigating bar) div-->
  <h1> PocoDolce Confections </h1>
  <br/>
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">PocoDolce</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
              <li><a href="home.html">Home</a></li>
              <li><a href="chocolates.html">Chocolates</a></li>
              <li><a href="bio.html">About Us</a></li>
              <li><a href="Feedbackpage.html">Feedback</a></li>
              <li><a href="ContactUs.html">Contact Us</a></li>
			  <li><a href="references.html">References</a></li>
        </ul>
	</div>
  </div><!--the end of containter-fluid (navigating bar) div-->
  <br/>
  <br/>
  <br/>
  </nav>
  <h2>Feed back result</h2>
  <h4>As our customer, your feedback is very valuable to us. It helps us to improve ourselves and serves our customers better.
      We are very thankful for your time and feedback. 
  </h4>
  <hr>
   <?php
    $over = $_POST['over'];	
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $score = intval($_POST['score']);
    $product = $_POST['product'];
    if(empty($name)){
		print("<p>A field has been left empty or fillout incorrectly. Please go back by clicking Back button to go back to refill and resubmit the feedback</p>");
	 }else{
	 if($over=="Yes"){
		print("<p>Thank you for your feedback</p>");
		//connect to the database
        $connectionstring = mysql_connect('localhost', 'chocofactory', 'meangirls' ) 
        or die('Could not connect: ' . mysql_error());

        //select the database
        mysql_select_db('my_chocofactory')
        or die('Could not select database: ' . mysql_error());

        //SQL query
        $Query = 'SELECT * FROM customerFeedback WHERE 1';

        //execute query
        $queryexe = mysql_query($Query)
        or die('Could not query database: ' . mysql_error());


		//create insert SQL string
        $Insert = "INSERT INTO customerFeedback (Name, Product, Score, Feedback) VALUES ('$name','$product', '$score','$feedback' )";

        //insert into database
        $results = mysql_query($Insert)
        or die('could not insert into database: ' . mysql_error());
		  
	   }else{
	    print("<p>Thank you for your input but you are not over 18. Thus, we cannot consider your feedback</p>");
	   }
     }		
	
   ?>
  <div align="center">
  <p style = "font-size: 2em;">Here are some other comments from other customers</p>
<table>
<thead>
<tr>
<th style = "width: 200px;">Name</th>
<th style = "width: 200px;">Feedback</th>
<th style = "width: 50px;">Score</th>
<th style = "width: 100px;">Product</th>
</tr>
</thead>

<tbody>


<?php
$name = $_POST['name'];
$feedback = $_POST['feedback'];
$score = intval($_POST['score']);
$product = $_POST['product'];

//connect to the database
$connectionstring = mysql_connect('localhost', 'chocofactory', 'meangirls' ) 
or die('Could not connect: ' . mysql_error());

//select the database
mysql_select_db('my_chocofactory')
or die('Could not select database: ' . mysql_error());

   //SQL query
   $Query = 'SELECT * FROM customerFeedback WHERE 1';

   //execute query
   $queryexe = mysql_query($Query)
   or die('Could not query database: ' . mysql_error());

   //query database
   while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   {
     echo "<tr>\n";
     foreach ($dataArray as $col_value) {
     echo "\t<td>$col_value</td>\n";
     }
     echo "</tr>\n";
    }

    // Free resultset
    mysql_free_result($queryexe)
    or die('Could not free result: ' . mysql_error());

    //disconnect from database
    mysql_close($connectionstring)
    or die('Could not close database: ' . mysql_error());
?>
</div>
</tbody>
</table>
</body>

</html>