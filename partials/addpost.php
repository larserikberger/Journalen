<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
require 'db.php';
include 'header.php';

if(isset($_POST['submit'])){
    
    $title = $_POST['title'];
    $userID = $_POST['userID'];
    $content = $_POST['content'];
    
    $sql = 'INSERT INTO entries(title, userID, content) VALUES(:title, :userID, :content)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['title' => $title, 'userID' => $userID, 'content' => $content ]);

    
    if(sql){
        header('Location: '.ROOT_URL.'');    
    } else {
        echo 'ERROR';
    }
       
}


?>
<div class="container">
    <h1>Add Post</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>userID</label>
                <input type="text" name="userID" class="form-control">
            </div>
            <div class="form-group">
                <label>content</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
</div>
   
<?php include('footer.php'); ?>