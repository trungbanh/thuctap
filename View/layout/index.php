<?php 
use \Blog\Controller\BlogController;

// die(var_dump($_SERVER));

include_once(ROOT_PATH . '/Templates/Header.phtml'); 

?>
    <script >
        $(document).ready(function(){
            $("#myform").on("submit",function(event){
                event.preventDefault();
                $.ajax({
                    type       : 'PUT',
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
            <div class='form'>
                <form id="myform" enctype='multipart/form-data'> 
                    <label for="title">tên bài viết :</label>
                    <textarea type="text" name="title" id="title" rows="2" cols="35" > </textarea> <br> <br>
                    <label for="content">nội dung bài viết :</label>
                    <textarea type="text" name="content" id="content" rows="20" cols="35"> </textarea> <br> <br>
                    <input type="submit" id='target' value="tạo bài viết mới"/>
                </form> 
            </div>
        </div>
        <div class='body'>
            <?php foreach ($list as $blog) {?>
            <a href = <?php echo "/blog/".$blog->idBlog ?> > 
                <div class='card'>
                    <h1><?php echo $blog->title; ?> </h1>
                    <h5 class="author_blog"> 
                        <?php
                            echo "write by ".$blog->idAuthor;
                        ?>
                    </h5>
                </div>  
            </a>
            <?php }?>
        </div>

        </div>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>