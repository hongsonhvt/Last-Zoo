<nav class="navbar-ad navbar-expand-xl">
    <div class="container-ad h-100">
        <a class="navbar-brand-ad" href="{{route('admin.index')}}" style="text-decoration: none;">
            <h1 class="tm-site-title mb-0" >CentralZoo Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse-ad navbar-collapse-ad" id="navbarSupportedContent">
            <ul class="navbar-nav-ad mx-auto h-100">

                <li class="nav-item-ad">
                    <a class="nav-link-ad" href="{{route('admin.index')}}"  style="text-decoration: none;">
                        <i class="fa-solid fa-wrench"></i>
                        Admin
                    </a>
                </li>
                <li class="nav-item-ad">
                    <a class="nav-link-ad " href="{{route('animal.index')}}"  style="text-decoration: none;">
                        <i class="fa-solid fa-paw"></i>
                        Animal

                    </a>
                </li>
                <li class="nav-item-ad ">

                    <a class="nav-link-ad " href="{{route('category.index')}}" style="text-decoration: none;">
                        <i class="fa-solid fa-align-justify"></i>
                        Categories
                    </a>
                </li>


                <li class="nav-item-ad">
                    <a class="nav-link-ad" href="{{route('customer.index')}}"  style="text-decoration: none;">
                        <i class="fa-solid fa-users"></i>
                        Customer
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item mr-3">
                    <!-- try without mr-3 -->
                    <a class="nav-link" href="#">
                        <i class="bi bi-person"></i>
                        {{\Illuminate\Support\Facades\Session::has('a_username')?
                            \Illuminate\Support\Facades\Session::get('a_username') : ""}}
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{route('auth.signout')}}">--}}
                        <a class="nav-link" href="{{route('clientView.index')}}">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                </li>
            </ul>


        </div>
    </div>

</nav>
