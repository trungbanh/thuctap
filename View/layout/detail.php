<?php 
use \Blog\Controller\BlogController;

include_once(ROOT_PATH . '/Templates/Header.phtml');
    foreach ($list as $blog) { ?>
    <div class='row'>
        <div class='slide'>
            <form action="/blog" method="POST">
                <input name="idblog" type=hidden value=<?php echo $_GET["id"]; ?> />
                <input type="submit" name='delblog' value='xóa bài này '/>
            </form> 
            <a class="btn" href= <?php echo "http://trungtrung.com/update.php?id=".$_GET["id"]; ?>>cập nhập nội dung</a>
        </div>
        
        <div class='view_blog'>
            <h1><?php echo $blog->title; ?> </h1>
            <h4> 
                <?php
                    echo $blog->content;
                ?>
            </h4>
            <h5 class="author_blog"> 
                <?php
                    echo "write by ".$blog->idAuthor;
                ?>
            </h5>
        </div>
        </div>
    <?php }
     ?>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>