<?php 
    use \Blog\Controller\BlogController;

    require_once(ROOT_PATH. '/Templates/Header.phtml');
    if(isset($_GET["id"])){
;
    $repo = new BlogController();
    $viewAllblog = $repo->getDetail($_GET["id"]);
    if ($viewAllblog) {
        foreach ($viewAllblog as $blog) { 
   
        ?>

<div class='updatebox row'>
    <div class='form'>
        <form action="update.php" method="POST">
            <label for="id">id bài viết hiện tại:  <?php echo $_GET["id"] ?>  </label>
            <input name="id" value= <?php echo $_GET["id"] ?> type=hidden  /> <br/>
            <label for="title">tên bài viết :</label>
            <textarea type="text" name="title" id="title" rows="2" cols="35" > <?php echo $blog->title; ?> </textarea> <br> <br>
            <input type="submit" value='cập nhập tên ' name='updateblog'/>
        </form> 
    </div>

    <div class='form'>
        <form action="update.php" method="POST">
            <label for="id">id bài viết hiện tại:  <?php echo $_GET["id"] ?>  </label>
            <input name="id" value= <?php echo $_GET["id"] ?> type=hidden  /> <br/>
            <textarea type=text name="noidung" id="nodung"  rows="30" cols="35"> <?php echo $blog->content; ?> </textarea><br><br>
            <input type="submit" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>
<?php } } else {
    echo '<h1>id khong ton tai </h1>';
}

} else {
    if(isset($_POST['updateblog'])){
        $repo = new BlogController();
        $fields = array('title', 'content');
        $data = array();
        foreach ($fields as $key) {
            switch ($key) {
                case 'title':
                    if (isset($_POST['title'])){
                        $data = array ('id'=>$_POST['id'],"title"=>$_POST['title']);
                    }
                    break;
                case 'content':
                    if (isset($_POST['noidung'])){
                        $data = array ('id'=>$_POST['id'],'content'=>$_POST['noidung']);
                    }
                    break;
            }
        }

        // die(var_dump($data));
        $result = $repo->update($data);
        
        if ($result){
            header("Location: http://trungtrung.com/");
        }
    } 
}
?>


<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>
