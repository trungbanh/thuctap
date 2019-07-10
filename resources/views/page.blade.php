@extends('layouts.base')

@section('body')
<div class='row'>
    @if ($user)
    <script >
        $().ready(function(){
            $("#myform").validate({
                rules: {
                    title: {
                        required:true,
                    },
                    content: {
                        required: true,
                    },
                    },
                messages: {
                    title: {
                        required:"bài viết cần có tựa đề "
                        },
                    content: {
                        required: "bài viết chưa có nội dung",
                    }
                }
            });
        });

        $.validator.setDefaults({
            submitHandler: function() {
                $("#myform").on("submit",function(event){
                    event.preventDefault();
                    $.ajax({
                        type       : 'PUT',
                        url        : '/blog',
                        data       : $("#myform").serialize(),
                        success: function(result) {
                            if (result) {
                                console.log(result);
                                if (result.data) {
                                    window.location="/blogs";
                                }
                                // window.location="/blogs";
                            }
                            
                        }
                    });
                    return false;
                });
            }
        });

    </script>
    <div class='form col-9'>
        <form id="myform" enctype='multipart/form-data'> 
            <p> tên bài viết  </p>
            <textarea type="text" name="title" id="title" rows="2" cols="35"  ></textarea> <br> <br>
            <p> nội dung bài viết  </p>
            <textarea type="text" name="content" id="content" rows="20" cols="35" ></textarea> <br> <br>
            <input type="submit" id='target' value="tạo bài viết mới"/>
        </form> 
    </div>
    @else
    <div class='ads'>
        <img src="./static/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
        <p> quảng cáo  </p>
    </div>
    @endif
</div>
@endsection