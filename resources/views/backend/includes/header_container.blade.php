<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="#">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div><img src="{{asset('assets/images/bed.png')}}" alt=""></div>
                    <div><label style="color: tomato; font-size: 45px; font-weight: bold">Take-</label><label style="font-size: 45px; font-weight: bold">In</label></div>
                </div>
            </a>
        </div>
        <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="{{route('Base.index_home')}}"}}>Home</a></li>
                <li><a href="{{route('auth.login')}}"}}>Login</a></li>
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="#" id="header_search_form">
                    <input type="text" class="search_input" placeholder="Search Item" required="required">
                    <button class="header_search_button"><img src="{{asset('assets/images/search.png')}}" alt=""></button>
                </form>
            </div>
            <!-- User -->
            <div class="user"><a href="#"><div><img src="{{asset('assets/images/user.svg')}}" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div><div><img src="{{asset('assets/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
                <div>+1 912-252-7350</div>
            </div>
        </div>
    </div>
</header>