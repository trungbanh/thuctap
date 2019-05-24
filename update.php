<?php 

    define('ROOT_PATH', __DIR__);
    require_once(ROOT_PATH . '/Controler/BlogControler.php'); 
    require_once(ROOT_PATH. '/model/BlogModel.php');
    require_once(ROOT_PATH. '/Templates/Header.phtml');
    if(isset($_GET["id"])){
;
    $repo = new BlogControler();
    $viewAllblog = $repo->getDetail($_GET["id"]);
    if ($viewAllblog) {
        foreach ($viewAllblog as $blog) { 
   
        ?>

<div class='updatebox'>
    <div class='form'>
        <form action="update.php" method="POST">
            <label for="id">id bài viết hiện tại:  <?php echo $_GET["id"] ?>  </label>
            <input name="id" value= <?php echo $_GET["id"] ?> type=hidden  /> <br/>
            <label for="title">tên bài viết :</label>
            <textarea type="text" name="title" id="title" rows="2" cols="35" > <?php echo $blog->getTitle(); ?> </textarea> <br> <br>
            <textarea type=text name="noidung" id="nodung"  rows="30" cols="35"> <?php echo $blog->getContent(); ?> </textarea><br><br>
            <input type="submit" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>
<?php } } else {
    echo '<h1>id khong ton tai </h1>';
}

} else {
    if(isset($_POST['updateblog'])){
        $repo = new BlogControler();
        $data = array ('id'=>$_POST['id'],"title"=>$_POST['title'],'content'=>$_POST['noidung']);
        $result = $repo->update($data);
        
        if ($result){
            header("Location: http://trungtrung.com/");
        }
    } 
}
?>


<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>
