<?php 
use \Blog\Controller\BlogController;
use \Blog\App\Session;

include_once(ROOT_PATH . '/Templates/Header.phtml'); 

?>
    <div class='row'>
        <div class='slide'>
            <?php 
                $mysess = new Session();
                if ( $mysess->isSession() ){
                    // die(var_dump($mysess->getUser()));
            ?>
            <script >
                $(document).ready(function(){
                    $("#myform").on("submit",function(event){
                        event.preventDefault();
                        $.ajax({
                            type       : 'PUT',
                            url        : '/blog',
                            data       : $("#myform").serialize(),
                            success: function() {
                                window.location="/blogs";
                            }
                        });
                        return false;
                    });
                });
            </script>

            <div class='form'>
                <form id="myform" enctype='multipart/form-data'> 
                    <label for="title">tên bài viết :</label>
                    <textarea type="text" name="title" id="title" rows="2" cols="35" > </textarea> <br> <br>
                    <label for="content">nội dung bài viết :</label>
                    <textarea type="text" name="content" id="content" rows="20" cols="35"> </textarea> <br> <br>
                    <input type="submit" id='target' value="tạo bài viết mới"/>
                </form> 
            </div>
            <?php        
                } else {
            ?>
            <div class='form'>
                <img src="./static/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
                <p> quảng cáo  </p>
            </div>
                <?php } ?>
        </div>
        <div class='body'>
            <?php foreach ($list as $blog) {?>
            <a href = <?php echo "/blog/".$blog->getId() ?> > 
                <div class='card'>
                    <span><?php echo $blog->title; ?> </span>
                    <span class="author_blog"> 
                        <?php
                            echo "write by ".$blog->author;
                        ?>
                    </span>
                </div>  
            </a>
            <?php }?>
        </div>

        </div>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>