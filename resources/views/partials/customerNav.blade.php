<div class="header navbar-fixed-top ">
    <div class="grid">
        <div class="header-with-search">
            <div class="header__logo" >
                <a href="{{route('clientView.index')}}" class="" >
                    <svg viewBox="0 0 192 65" class="header__logo-img">
                        <g fill-rule="evenodd">
                            <path>
                                <a href="">
                                    <img src="/image/ZooLogo.png" alt="Logo" class="img_zoo-logo" style="border-radius: 64px">
                                </a>
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="header__navbar-item header__navbar-item--strong"><a href="{{route('clientView.index')}}" class="btn btn-info">Home</a></div>
            <div class="header__navbar-item header__navbar-item--strong"><a href="{{route('clientView.viewCategory')}}" class="btn btn-info">Category</a></div>
            <div class="header__navbar-item header__navbar-item--strong"><a href="{{route('clientView.model')}}" class="btn btn-info">Book Ticket now!</a></div>

            <form class="form-inline" action="{{route('clientView.search')}}" method="get" style=" margin-right: 10%">
                <div class="header__search">
                    <div class="header__search-input-wrap" style="border-radius: 10px">
                        <input type="text" class="header__search-input query" id="query" name="query" placeholder="Search...">

                        </div>
                    </div>
{{--                    <button class="header__search-btn" type="submit">--}}
{{--                        <i class="header__search-btn-icon fas fa-search"></i>--}}
{{--                    </button>--}}
            </form>

            <div class="header__navbar-item header__navbar-item--strong"><a href="{{route('clientView.createC')}}" class="btn btn-info" style="margin-left: 150px;background-color: yellow; color: black">Sign up now!</a></div>
            <div class="header__navbar-item header__navbar-item--strong"><a href="{{route('auth.signin')}}" class="btn btn-info">Sign in for Admin</a></div>
        </div>
</div>
</div>
