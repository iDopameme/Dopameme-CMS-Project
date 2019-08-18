<?php 
include("includesFinal/header.php");

//Preparing the query


$query = "SELECT * FROM Blog_Post
			ORDER BY postDate DESC
			LIMIT 5";

$posts = $db->query($query);

?>

<div class="blog-header">
     <h2 class="blog-title">MicroBlog</h2>
     <p class="lead blog-description">A free public Blogging site.</p>
    </div>

    <?php 
    	//If the number is of rows is greater than zero
    	if($posts->num_rows > 0) { 
    		//Calling the fetch assoc method function returns the next row of results as an associated array
    		while($row = $posts->fetch_assoc())
    	{
     ?>

          <div class="blog-post">
          	<!-- This small php script allows me to output Title from the database by outputting what is in the varible $row. Remember the information is inputted to row by the while statement above -->
            <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['ID']?>"><?php echo $row['Title']; ?></a></h2>
            <!-- echo the posting date --> 
            <p class="blog-post-meta"><?php echo $row['postDate']; ?> by <a href="#">
            <!-- echo the name of the user that posted -->
            <?php echo $row['User']; ?></a></p>

            <!-- echo the body of the blog post (EDIT 01/31/18: This is operating correctly as inteneded) -->
            <?php $body = $row['Body'];
            	echo substr($body, 0, 200) . "......"; 
              //I used substr to only display the first 200 words of every post. Also the periods in quotations is there to make the shortened blog body to look nicer before the user presses read more.
            ?>
            <a href="single.php?post=<?php echo $row['ID'] ?>" class="btn btn-primary">Read More</a>

            <!-- Add a comment is still not fixed 01/31/18 -->
            <p><a href="single.php?post=<?php echo $row['ID'] ?>">Add a Comment</a></p>
            <p><a href="single.php?post=<?php echo $row['ID'] ?>">Read all Comments</a></p>
          </div><!-- /.blog-post -->
    <?php } } else 
    {
        echo "<p>No Matching Posts</p>";

    }?>
    <!-- This is working but not dynamically. Need to learn how to fix referring to both the next and previous buttons. 01/31/18 -->
    <p><a href="indexNext1.php">Next 5 Posts</a></p>
    <p><a href="indexPrevious1.php">Previous 5 Posts</a></p>

        </div><!-- /.blog-main -->

       	
       	<?php include("includesFinal/footer.php");?>   