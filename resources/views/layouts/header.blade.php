@php 
    $user = Auth::user();
@endphp
<header class="header">
    <div class='row'>
        <a class="col-3" href="/blogs"> <span class='Title_web'>Trung blog </span> </a> 
        <div class="navmenu col-5">
            <ul>
                @if (isset($user) && $user instanceof \App\Model\Author)
                    <li><a href=/blog>viết bài</a></li>
                @endif
                <li><a href=/blogs> tác giả </a></li>
                <li><a href=/blogs>tìm kiếm</a></li>
            </ul>
        </div>
        <div class='sign col-4'>
            @if (isset($user) && $user instanceof \App\Model\Author)
                <span id="user">
                    <a id='username' href='/author/' > {{ $user->nickname }}</a>
                </span>
                <span  id="logout">
                    <a href='/author/logout' >đăng xuất </a>
                </span>
            @else
                <a id='login' href="/author/logon"> Đăng nhập </a>
            @endif
        </div>
    </div>
</header>
