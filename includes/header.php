<?php 

	include("config.php");
	include("db.php");

	$query = "SELECT * FROM header_footer";

	$footer = $db->query($query);



 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>

    
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
          	<!-- This is here to change the navigator at the top to show which subpage the user is on -->
          	<?php 
          		if(isset($_GET['footer'])) {
          	?>
            <a class="nav-link" href="index.php">Home</a>
            <?php } else { ?>
            <a class="nav-link active" href="index.php">Home</a>
            <?php } ?>
            <?php 
            	if($footer->num_rows > 0) 
            	{
            		while($row = $footer->fetch_assoc())
            		{ 
            			if(isset($_GET['footer']) && $row['id'] == $_GET['footer'])
						{
                            
                            if($row['id'] == 1)
                            {
                                header("Location: http://163.238.35.165/~walker/login.php");
                                exit();
                            }
            		?>
            	<a class="nav-link active" href="index.php?footer=<?php echo $row['id']; ?>"><?php echo $row['text']; ?></a>

            <?php	
            			}else echo "<a class='nav-link' href='index.php?footer=$row[id]'>$row[text]</a>";		
            		}
            	}

              
            ?>
            
         
          </nav>
        </div>
      </div>

     
      </div>
    

    <main role="main" class="container">

  <div class="row">

<div class="col-sm-8 blog-main">