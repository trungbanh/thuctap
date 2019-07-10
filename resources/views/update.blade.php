@extends('layouts.base')

@section('body')


@php 
    $user = Auth::user();
@endphp

<div class="container">
    <div class='row'>
        @if ($user['id'] == $blog['author'])
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
                            type       : 'POST',
                            url        : '/blog',
                            data       : $("#myform").serialize(),
                            success: function(result) {
                                if (result.data) {
                                    console.log(result);
                                    window.location="/blogs";
                                } else {
                                    console.log(result);
                                }
                                
                            }
                        });
                        return false;
                    });
                }
            });

        </script>
        <div class='col-9'>
            <form id="myform" enctype='multipart/form-data'> 
                <input name="id" value="{{ $blog->id }}"  hidden/>
                <input name="idAuthor" value="{{ $blog->author }}"  hidden/>
                <p> tên bài viết  </p>
                <textarea type="text" name="title" id="title" rows="2" cols="35" >{{ $blog->title }}</textarea> <br> <br>
                <p> nội dung bài viết  </p>
                <textarea type="text" name="content" id="content" rows="20" cols="35" >{{ $blog->content }}</textarea> <br> <br>
                <input class="btn btn-primary" type="submit" id='target' value="cập nhập bài viết"/>
            </form> 
        </div>
        @else
        <div class='ads'>
            <img src="/images/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
            <p> quảng cáo  </p>
        </div>
        @endif
    </div>

</div>
@endsection