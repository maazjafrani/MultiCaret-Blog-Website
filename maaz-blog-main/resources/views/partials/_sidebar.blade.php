<header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="tm-site-header">
            <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
            <h1 class="text-center">Maaz Blog</h1>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="tm-nav-item  {{request()->route()->uri == '/'?'active':''}}">

                    <a href="/" class="tm-nav-link">  <!-- I added '/' link here! -->
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a>
                </li>


                <li class="tm-nav-item  {{request()->route()->uri == 'publish'?'active':''}}">
                    <a href="/publish" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Publish Post
                    </a></li>
                <li class="tm-nav-item {{request()->route()->uri == 'about'?'active':''}}"><a href="/about"
                                                                                              class="tm-nav-link">
                        <!-- I added '/about' link here! -->
                        <i class="fas fa-users"></i>
                        About Maaz's Blog
                    </a></li>
                <li class="tm-nav-item  {{request()->route()->uri == 'contact'?'active':''}}"><a href="/contact"
                                                                                                 class="tm-nav-link">
                        <!-- I added '/contact' link here! -->
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>

            </ul>

        </nav>


    </div>
</header>
