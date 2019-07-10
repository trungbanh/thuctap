@extends('layouts.base')


@section('body')

@php 
    $user = Auth::user();
    \App\Http\Controllers\Unit::getNicknameById(1);
@endphp

<div class="container" >
    <div class='row'>
        <div class='col-lg-3 col-sm-12'>
            @if ($user['id'] ===$blog['author'])
                <script >
                    $(document).ready(function(){
                        $("#btn-blog-delete").on("click",function(event){
                            event.preventDefault();
                            $.ajax({
                                type       : 'DELETE',
                                url        : '/blog/',
                                data       : {
                                    id: "{{ $blog['id'] }}",
                                    idAuthor: "{{ $blog['author'] }}"
                                },
                                success: function(result) {
                                    if (typeof result === 'object' && result.data) {
                                        window.location = "{{ route('blog-index') }}";
                                    }
                                }
                            });

                            return false;
                        });
                    });
                </script>
                
                <button class="btn btn-outline-danger" id="btn-blog-delete" >Xóa bài này</button>

                <a class="btn btn-primary" href="{{ route('blog-update', ['id' => $blog->id])}}">Cập nhập nội dung</a>
            @else
                <div>
                    <img src="/images/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                    <p> phần này thuộc tác giả {{ $blog->author}} </p>
                </div>
                
            @endif
        </div>

        <article class='col-9'>
            <p id="header"> {{ $blog->title }} </p>
            <p id="contend"> 
                    {{ $blog->content}}
            </p>
            <p id="author_blog"> 
                {{"write by " . \App\Http\Controllers\Unit::getNicknameById($blog->author)['nickname'] }}
            </p>
        </article>

    </div>
</div>

@endsection