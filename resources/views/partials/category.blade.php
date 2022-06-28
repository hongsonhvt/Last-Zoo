<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
        <li class="nav-item dropdown">
            <a role="button" class="nav-link dropdown-toggle"
               {{--                       href="{{route('client.brand')}}"--}}
               id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                Brands
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach($brands as $b)
                    <a class="dropdown-item"
                       href="{{route('client.show', ['id' => $b->id])}}"
                    >{{$b->name}}</a>
                @endforeach
            </div>
        </li>
    </ul>
</div>
