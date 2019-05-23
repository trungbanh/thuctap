<?php 
define('ROOT_PATH', __DIR__);

include_once(ROOT_PATH . '/Templates/Header.phtml');
require_once(ROOT_PATH . '/Controler/BlogControler.php');

if(isset($_GET["id"])) {
    $repo = new BlogControler();
    // die ('------------------'.$idblog.'------------------');
    $viewAllblog = $repo->getDetail($_GET["id"]);
    foreach ($viewAllblog as $blog) { ?>
    <div class='row'>
        <div class='slide'>
            <form action="detail.php" method="POST">
                <input name="idblog" type=hidden value=<?php echo $_GET["id"]; ?> />
                <input type="submit" name='delblog' value='xóa bài này '/>
            </form> 
            <a class="btn" href= <?php echo "http://trungtrung.com/update.php?id=".$_GET["id"]; ?>>cập nhập nội dung</a>
        </div>
        
        <div class='view_blog'>
            <h1><?php echo $blog->getTitle(); ?> </h1>
            <h4> 
                <?php
                    echo $blog->getContent();
                ?>
            </h4>
            <h5 class="author_blog"> 
                <?php
                    echo "write by ".$blog->getAuthor();
                ?>
            </h5>
        </div>
        </div>
    <?php } ?>
<?php } else {
    function delete() {
        $repo = new BlogControler();
        $repo->delete($_POST['idblog']);
    }

    if(isset($_POST['delblog'])){
        delete();
        header("Location: http://trungtrung.com/");
    }
?>
    <h5>khong tim thay bai viet </h5>
<?php } ?>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>