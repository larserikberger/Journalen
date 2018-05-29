<?php

include('partials/session_start.php');
require('partials/config.php');
require('partials/db.php');
include('partials/header.php'); 


if (isset($_SESSION["loggedIn"])):
include('partials/navbar.php');

endif; 

if (isset($_GET["message"])) {
    echo $_GET["message"];
}

if (!isset($_SESSION["loggedIn"])): ?>

<div class="container">
    <h1>Sign up</h1>
<form action="partials/register.php" method="POST">
<div class="form-group">
   <label>Username</label>
  <input type="text" name="username" class="form-control">
   <label>Password</label>
  <input type="text" name="password" class="form-control">
  <input type="submit" value="Register" class="btn btn-primary">
</div>
</form>
    
    <h1>Sign in</h1>
<form action="partials/signin.php" method="POST">
    <div class="form-group">
        <label>Username</label>
  <input type="text" name="username" class="form-control">
        <label>Password</label>
  <input type="text" name="password" class="form-control">
  <input type="submit" value="Login" class="btn btn-primary">
    </div>
</form>
</div>


<?php endif; ?>

<?php

include('partials/timesession.php');

if (isset($_SESSION["loggedIn"])): 

$stmt = $pdo->prepare('SELECT * FROM entries ORDER BY createdAt DESC');
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <br>
    <form class="pull-right">
    <a href="partials/logout.php" class="btn btn-danger">Sign out</a>
    </form>
    <br>
</div>
    <div class="container">
        <h1>Posts</h1>
        <?php foreach($data as $entry) : ?>
        <div class="well">
            <h3>
            <?php echo $entry['title']; ?> </h3>
            <small>Created on <?php echo $entry['createdAt']; ?> by 
            <?php echo $entry['userID']; ?></small>
            <p>
            <?php echo $entry['content']; ?>
            </p>
            <a class="btn btn-default" href="partials/post.php?entryID=<?php echo $entry['entryID']; ?>">Read More</a>   
        </div>
        <br>
        <?php endforeach; ?>
    </div>

    <?php include('partials/footer.php'); ?>

<?php endif; ?>
