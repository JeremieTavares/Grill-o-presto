<nav class="nav_container m-auto mt-5">
    <ul class="d-flex justify-content-center align-items-center">
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white" href="{{ route('user.edit.info', Auth::user()->id) }}">Mes
                infos</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.tickets.index', Auth::user()->id) }}">Tickets</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="">History</a></li>
    </ul>
</nav>