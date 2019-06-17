<?php 
use \Blog\App\Session;
include_once(ROOT_PATH . '/Templates/Header.phtml'); 


    $sess = new Session();

    if ($sess->isSession()) {
        $user = $sess->getUser();
        // die(var_dump($user));
        
?>

    <div id="mgs">
    </div>
    <script >
        $(document).ready(function(){
            $("#updatedetail").on("click",function(event){
                $.ajax({
                    type : 'POST',
                    url : '/author/update/detail',
                    data : $("#detai").serialize(),
                    success: function(data) {
                        console.log(data);
                        $("#mgs").html(data);
                        //window.location="/blogs";
                        // alert(data);
                    }
                });
                return false;
            });

            $("#updatepass").on("click",function(event){
                event.preventDefault();
                let re = $('input[name=passre]').val(); 
                let newp = $('input[name=passnew]').val(); 
                if (re != newp) {
                    alert("password khong giong nhau");
                }
            });
        });
    </script>
    <div class='updatebox row'>
        <form id='detai' enctype='multipart/form-data'>
            <input name="idAuthor" type="hidden" value= <?php echo $user->id_author?> > <br/>
            Tên: <input name="nickname" type="text" value= <?php echo $user->nickname?>> <br/>
            Email: <input name="mail" type="text" value= <?php echo $user->mail?>> <br/>
            Mật khẩu cũ : <input name="passold" type="password" > <br/>
            Mật khẩu mới : <input name="passnew" type="password" > <br/>
            Mật khẩu mới nhập lại : <input name="passre" type="password" > <br/>
            
            <button id='updatedetail' name="update" >Cập nhập</button>
        </form>
    </div>

<?php } ?>

<?php
include_once(ROOT_PATH . '/Templates/Footer.phtml'); 
?>