<!-- Search form -->
<div class="row tm-row">
    <div class="col-12">
        <form action="{{url('/')}}" method="GET" class="form-inline tm-mb-80 tm-search-form"
              enctype="multipart/form-data">
            <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..."
                   aria-label="Search" value="{{request()->search}}">
            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <div style="float: right">
        <x-flash/>
    </div>

    <div class="col-12">
        @auth
            <span class="font-weight-bold">{{auth()->user()->name}}!</span>

            <img src="{{Auth::user()->image}} " width="50" height="50"/>
            <form method='post' action="/logout">
                @csrf
                <button type="submit" class="tm-btn tm-btn-primary tm-btn-small">Logout</button>
            </form>
        @else
            <div class="d-flex justify-content-end m-md-2">
                <a href='/register' class="tm-btn tm-btn-primary tm-btn-small mr-3"><h3><u>Register</u></h3></a>
                <a href='/login' class="tm-btn tm-btn-primary tm-btn-small"><h3><u>Login</u></h3></a>
            </div>
        @endauth
    </div>


</div>
