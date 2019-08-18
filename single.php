<?php 
include("includesFinal/config.php");
include("includesFinal/db.php");

if(isset($_GET['post']))
{
  $post = mysqli_real_escape_string($db, $_GET['post']);

  $p = $db->query("SELECT * FROM Blog_Post WHERE ID='$post'");

  $p1 = $p->fetch_assoc();

  $page_title = $p1['Title'];
}

include("includesFinal/header.php");

if(isset($_GET['post']))
{
  $id = mysqli_real_escape_string($db, $_GET['post']);
  $query = "SELECT * FROM Blog_Post WHERE ID='$id'"; 
}

$posts = $db->query($query);
  
if(isset($_POST['post_comment']))
{
  $name = mysqli_real_escape_string($db, $_POST['user']);
  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  $postdate = mysql_real_escape_string($db, $_POST['postdate']);

  $query = "INSERT INTO Comments (users, body, Post_ID, postdate) VALUES('$name,','$comment','$id','$postdate')";

  if($db->query($query))
  {
      echo "<script>alert('Comment Submitted!')</script>";
  } else {
   echo "<script>alert('Comment NOT Submitted!')</script>";
  }
  
}

$query = "SELECT * FROM Comments WHERE post='$id' AND status='1'";

$comments = $db->query($query);

?>

<br>
    <?php
    	if($posts->num_rows > 0) 
    	{ 
    		//Calling the fetch assoc method function returns the next row of results as an associated array
    		while($row = $posts->fetch_assoc())
    	{
     ?>

          <div class="blog-post">
          	<!-- This small php script allows me to output Title from the database by outputting what is in the varible $row. Remember the information is inputted to row by the while statement above -->
            <h2 class="blog-post-title"><?php echo $row['Title']; ?></h2>
            <!-- echo the posting date --> 
            <p class="blog-post-meta"><?php echo $row['postdate']; ?> by <a href="#">
            <!-- echo the name of the user that posted -->
            <?php echo $row['User']; ?></a></p>

            <!-- echo the body of the blog post -->
            <?php 
              echo $row['Body'];
                
            ?>
          </div><!-- /.blog-post -->
    <?php } } ?>

<blockquote><?php echo $comments->num_rows; ?></blockquote>

<div class="comment-area">
   <form method="post">
 	<form>
 	<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="user">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Comment</label>
    <textarea cols="60" rows="10" name="comment" class="form-control"></textarea>
  </div>

  <div class="form-group">
  <label for="DateTime">Date</label>
  <input type="datetime-local" name="postdate" class="form-control">
  </div>
</form>
  
  <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
</form>

<br>
<br>
<hr>

  
      </div>
      
      </div><!-- /.blog-main -->

<?php include("includesFinal/footer.php");?> 