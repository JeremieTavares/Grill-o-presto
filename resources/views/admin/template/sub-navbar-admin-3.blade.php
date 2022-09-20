<nav class="nav_container mt-5 px-2">
    <ul class="d-flex justify-content-center align-items-center">
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.tickets.index', Auth::user()->id) }}">Admin</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.tickets.index', Auth::user()->id) }}">User</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.tickets.index', Auth::user()->id) }}">Menu</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.tickets.index', Auth::user()->id) }}">Repas</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.orders.index', Auth::user()->id) }}">Order</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.orders.index', Auth::user()->id) }}">Ticket</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('user.orders.index', Auth::user()->id) }}">Faq</a></li>
    </ul>
</nav>