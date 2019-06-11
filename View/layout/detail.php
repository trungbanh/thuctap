<?php 
use \Blog\Controller\BlogController;

include_once(ROOT_PATH . '/Templates/Header.phtml');
    foreach ($list as $blog) { ?>
    <script >
        $(document).ready(function(){
            $("#myform").on("submit",function(event){
                event.preventDefault();
                $.ajax({
                    type       : 'DELETE',
                    url        : 'http://localhost:5000/blog',
                    data       : $("#myform").serialize(),
                    success: function() {
                        alert("worked");
                    }
                });
                return false;
            });
        });
    </script>
    <div class='row'>
        <div class='slide'>
            <form id='myform' enctype='multipart/form-data'>
                <input name="id" type=hidden value=<?php echo $blog->idBlog; ?> />
                <input type="submit" name='delblog' value='xóa bài này '/>
            </form> 
            <a class="btn" href= <?php echo "/blog/update/". $blog->idBlog; ?>>cập nhập nội dung</a>
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