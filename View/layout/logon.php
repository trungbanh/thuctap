<?php 
    use \Blog\Controller\AuthorController;
    
    require_once(ROOT_PATH. '/Templates/Header.phtml');
?>


<script >
    $(document).ready(function(){
        $("#login").on("click",function(event){
            // event.preventDefault();
            $.ajax({
                type : 'PATCH',
                url : '/author',
                data : $("#myform").serialize(),
                success: function() {
                    window.location="/blogs";
                }
            });
            return false;
        });

        $("#signin").on("click",function(event){
            // event.preventDefault();
            $.ajax({
                type : 'PUT',
                url : '/author',
                data : $("#myform").serialize(),
                success: function() {
                    window.location="/blogs";
                }
            });
            return false;
        });
    });
</script>
<div class='updatebox'>
    <form id='myform' enctype='multipart/form-data'>
        Tên: <input name="nickname" type="text"> <br/>
        Email: <input name="mail" type="text"> <br/>
        Mật khẩu : <input name="pass" type="password"> <br/>
        <button id='login' name="login" >Đăng Nhập</button>
        <button id='signin' name="signin" >Đăng Ký</button> 
    </form>
</div>

<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>

