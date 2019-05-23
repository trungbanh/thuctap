<?php 

    define('ROOT_PATH', __DIR__);
    require_once(ROOT_PATH . '/Controler/BlogControler.php'); 
    if(isset($_GET["id"])){

    $repo = new BlogControler();
    $viewAllblog = $repo->getDetail($_GET["id"]);
    foreach ($viewAllblog as $blog) { ?>


<div class='form'>
    <form action="update.php" method="post">
        <label for="id">id bai viet:</label>
        <input name="id" value= <?php echo $_GET["id"] ?> /> <br/>
        <label for="title">ten bai viet:</label>
        <input type="text" name="title" id="title" value=<?php echo $blog->getTitle(); ?> /> <br> <br>
        <label for="noidung"> noi dung:</label>
        <textarea type=text name="noidung" id="nodung" rows="2" cols="25"> <?php echo $blog->getContent(); ?> </textarea><br><br>
        <input type="submit" value='update' name='updateblog'/>
        
    </form> 
</div>
<?php }

}  else {

    // die('-----------'.var_dump($_POST));

    if(isset($_POST['updateblog'])){
        // $repo = new BlogControler();
        die(var_dump($_POST));
        // $repo->update($blog);
    } 
}
?>