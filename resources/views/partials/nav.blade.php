<ul class="nav">
    <li><a href="/" >Home</a></li>
    <li><a href="/winners">Winners</a></li>
    <li><a href="/info">Info</a></li>

    <li><a href="/periods">All periods</a></li>
    <li><a href="/periods/active">Active period</a></li>
    <li><a href="/periods/future">Future periods</a></li>

    @if(Auth::check())

        @if(Auth::user()->isAnAdmin())
            <li><a href="/admin/users">users</a></li>
        @endif
    
        <li><a href="/profile">Welkom {{Auth::user()->firstname}} {{Auth::user()->lastname}}</a></li>
        <li><a href="/logout">Logout</a></li>

    @else

        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>

    @endif
</ul>