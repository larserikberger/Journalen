<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
require 'db.php';
include 'header.php';

if(isset($_POST['submit'])){
    
    $update_entryID = $_POST['update_entryID'];
    $title = $_POST['title'];
    $entryID = $_POST['entryID'];
    $content = $_POST['content'];
    
    $sql = 'UPDATE entries SET title = :title, content = :content WHERE entryID = :entryID';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            ':title' => $title,
            ':entryID' => $update_entryID,
            ':content' => $content
        ]);
    
    if(sql){
        header('Location: '.ROOT_URL.'');    
    } else {
        echo 'ERROR';
    }       
}
 

$fetchOne = $pdo->prepare('SELECT * FROM entries WHERE entryID = :entryID');
$fetchOne->execute([
    ':entryID' => $_GET['entryID']
]);
$entry = $fetchOne->fetch();


?>
<div class="container">
    <h1>Edit Post</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $entry['title']; ?>">
            </div>
            <div class="form-group">
                <label>userID</label>
                <input type="text" name="userID" class="form-control" value="<?php echo $entry['userID']; ?>">
            </div>
            <div class="form-group">
                <label>content</label>
                <textarea name="content" class="form-control"><?php echo $entry['content']; ?></textarea>
            </div>
            <input type="hidden" name="update_entryID" value="<?php echo $entry['entryID']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
</div>
   
<?php include('footer.php'); ?>