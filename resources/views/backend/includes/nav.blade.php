<nav class="navbar navbar-light bg-light navbar-expand-md navigation-clean-button">
    <div class="container"><a class="navbar-brand" href="{{route('home')}}">শরাফপুর <br>ইউনিয়ন পরিষদ</a><button data-toggle="collapse"
            class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{route('home')}}">হোম</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#">কমিটি</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#">সিটিজেন</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#">নোটিস</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#">ফান্ড</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"
                        href="#">রিপোর্ট</a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" role="presentation" href="#">First Item</a>
                        <a class="dropdown-item" role="presentation" href="#">Second Item</a>
                        <a class="dropdown-item" role="presentation" href="#">Third Item</a>
                    </div>
                </li>
            </ul>
            <span class="navbar-text actions">
                <a class="btn btn-success" href="{{route('login')}}">Log In</a>
            </span>
        </div>
    </div>
</nav>
