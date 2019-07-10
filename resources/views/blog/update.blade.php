@extends('layouts.base')

@section('body')


@php 
    $user = Auth::user();
@endphp

<div class="container">
    <div class='row'>
        @if ($user['id'] == $blog['author'])
        <div class="col-6 offset-3">
            <form id="myform" enctype='multipart/form-data'> 
                <input name="id" value="{{ $blog->id }}"  hidden/>
                <input name="idAuthor" value="{{ $blog->author }}"  hidden/>
                <div class="form-group">
                    <label for="title">Tên bài viết  </label>
                    <textarea class="form-control" type="text" name="title" id="title" rows="2" cols="35" >{{ $blog->title }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết  </label>
                    <textarea class="form-control" type="text" name="content" id="content" rows="20" cols="35" >{{ $blog->content }}</textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" id='target' value="Cập nhập bài viết"/>
                    <a href="#" onclick="window.history.back();" class="btn btn-default">Trở lại</a>
                </div>
            </form> 
        </div>

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
                            required:"Bài viết cần có tựa đề "
                        },
                        content: {
                            required: "Bài viết chưa có nội dung",
                        }
                    }
                });
            });

            $.validator.setDefaults({
                submitHandler: function() {
                    $.ajax({
                        type       : 'POST',
                        url        : "{{ route('blog-update-ajax') }}",
                        data       : $("#myform").serialize(),
                        success: function(result) {
                            if (result.data) {
                                console.log(result);
                                window.location = "{{ route('blog-index') }}";
                            } else {
                                console.log(result);
                            }
                            
                        }
                    });
                }
            });
        </script>
        @else
        <div class='ads'>
            <img src="/images/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
            <p> quảng cáo  </p>
        </div>
        @endif
    </div>

</div>
@endsection