<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require'config.php';
require'db.php';

if(isset($_POST['delete'])){
    
    $delete_entryID = $_POST['delete_entryID'];
   
    $sql = 'DELETE FROM entries WHERE entryID = :delete_entryID';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':delete_entryID' => $delete_entryID]);
    
    
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

<?php include('header.php'); ?>

        <div class="container">
            <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
            <h1><?php echo $entry['title']; ?></h1>
            <small>Created on <?php echo $entry['createdAt']; ?> by 
            <?php echo $entry['userID']; ?></small>
            <p><?php echo $entry['content']; ?></p>
            <hr>
            <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];
            ?>">
                <input type="hidden" name="delete_entryID" value="<?php echo $entry['entryID']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            
            </form>
            <a href="<?php echo ROOT_URL; ?>partials/editpost.php?entryID=<?php echo $entry['entryID']; ?>" class="btn btn-default">Edit</a>

        </div>
        <?php include('footer.php'); ?>

