<ul class="nav navbar-nav">
    <li><a href="/" >Home</a></li>
    <li><a href="/winners">Winners</a></li>
    <li><a href="/info">Info</a></li>



    <li><a href="/periods">All periods</a></li>
    <li><a href="/periods/active">Active period</a></li>
    <li><a href="/periods/future">Future periods</a></li>
</ul>
<ul>
    @if(Auth::check())

        <li>nav user-id:  {{Auth::user()->id}}</li>
        <li><a href="/logout">Logout</a></li>
        <li><a href="/profile">Welkom {{Auth::user()->firstname}} {{Auth::user()->lastname}}</a></li>

        @if(Auth::user()->isAnAdmin())
            <li><a href="/admin/users">users</a></li>
        @endif

    @else

        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>

    @endif
</ul>