<?php 
    use \Blog\Controller\BlogController;

    require_once(ROOT_PATH. '/Templates/Header.phtml');
    
foreach ($list as $blog) { ?>
    <div class='updatebox row'>
        <div class='form'>
            <form action='http://localhost:5000/blog' method="POST">
                <label for="id">id bài viết hiện tại:  <?php echo $blog->idBlog  ?>  </label>
                <input name="id" value= <?php echo $blog->idBlog  ?> type=hidden  /> <br/>
                <label for="title">tên bài viết :</label>
                <textarea type="text" name="title" id="title" rows="2" cols="35" > <?php echo $blog->title; ?> </textarea> <br> <br>
                <input type="submit" value='cập nhập tên ' name='updateblog'/>
            </form> 
        </div>

        <div class='form'>
            <form action='http://localhost:5000/blog' method="POST">
                <label for="id">id bài viết hiện tại:  <?php echo $blog->idBlog  ?>  </label>
                <input name="id" value= <?php echo $blog->idBlog  ?> type=hidden  /> <br/>
                <textarea type=text name="content" id="nodung"  rows="30" cols="35"> <?php echo $blog->content; ?> </textarea><br><br>
                <input type="submit" value='cập nhập nội dung' name='updateblog'/>
            </form> 
        </div>
    </div>
<?php } ?>

<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>