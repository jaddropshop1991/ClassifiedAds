


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts vues -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a795a8ca92.js" crossorigin="anonymous"></script>
    <!-- tinyMCE text editor we imported -->
    <script src="https://cdn.tiny.cloud/1/6pfch51uu152tv4hgtq22tbxkjwg2tmopmvdyglpmvpxbrzt/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/6pfch51uu152tv4hgtq22tbxkjwg2tmopmvdyglpmvpxbrzt/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
    </script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @if(Auth::check()&&Auth::user()->isadmin==1)
                                       
                                        <a class="dropdown-item" href="{{ url('auth/category') }}" >{{ __('Dashboard') }}</a>
                                       @else 
                                       <a class="dropdown-item" href="{{ url('ads') }}" >{{ __('ads') }}</a>

                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


      {{-- ---------------second nav bar------------- --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  
navbar-hover" id="showhideprevnext1"
>
   
    <a class="navbar-brand" href="#">

    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
        aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class=" collapse navbar-collapse" id="navbarHover">

        <ul class="container-fluid navbar-nav" id="slider-i" >
@foreach ($menus as $menuItem)
    

                <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-dark" href="{{ route('category.show', $menuItem->slug) }}"
                        data-toggle="dropdown_remove_dropdown_class_for_clickable_link" arial-haspopup="true"
                        arial-expanded="false" >
                        {{ $menuItem->name }}
                       
                    </a>
                    <ul class="dropdown-menu">
               @foreach ($menuItem->subcategories as $subMenuItem)
                   
 
                        <li>
                        <a class="dropdown-item dropdown-toggle"
                         href="{{ route('subcategory.show', [
                             $menuItem->slug,$subMenuItem->slug
                         ]) }}">
                       {{ $subMenuItem->name }}
                        </a>
                             
                           
                            <ul class="dropdown-menu">
                              @foreach ($subMenuItem->childcategories as $childMenu)
                                  
                         
                                <li>
                                    <a class="dropdown-item" 
                                href="{{ route('childcategory.show',[
                                    $menuItem->slug,
                                    $subMenuItem->slug,
                                    $childMenu->slug
                                ]) }}">
                               {{ $childMenu->name }}
                                    </a>
                                   
                                </li>
                            
                                @endforeach
                            </ul>
                        
                        </li>
                 
                        @endforeach
                    </ul>
                   
                </li>
     
                @endforeach  
            </ul>
    </div>
</nav>

{{-- ----------------end second nav bar------------------- --}}



        <main class="py-4">
      @yield('content')
</main>
    </div>


    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        @media only screen and(max-width:9991px) {
            .navbar-hover .show>.dropdown-toggle::after {
                transform: rotate(-90deg)
            }
        }

        @media only screen and (min-width:492px) {
            .navbar-hover .collapse ul li {
                position: relative;
            }

            .navbar-hover .collapse ul li:hover>ul {
                display: block
            }

            .navbar-hover .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 100px;
                display: none
            }

            .navbar-hover .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 200px;
                display: none
            }
        }


        .vertical-menu a {
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: red;
            color: #fff;
        }
        .vertical-menu a.active {
            background-color: red;
            color: #fff;
        }



   /* chat box styles */
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 40px;
    padding-bottom: 5px;
    margin-top: 10px;
    width: 80%;
    height: 10px;
}


.chat li .chat-body p
{
    margin: 0;
}


.chat-msg
{
    overflow-y: scroll;
    height: 350px;
}
.chat-msg .chat-img
{
    width: 50px;
    height: 50px;
}
.chat-msg .img-circle
{
    border-radius: 50%;
}
.chat-msg .chat-img
{
    display: inline-block;
}
.chat-msg .chat-body
{
    display: inline-block;
    max-width: 80%;
    background-color: #FFC195;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-msg .chat-body2
{
    display: inline-block;
    max-width: 80%;
    background-color:#ccc;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-msg .chat-body strong
{
  color: #0169DA;
}

.chat-msg .buyer
{
    text-align: right ;
    float: right;
}
.chat-msg .buyer p
{
    text-align: left ;
}
.chat-msg .sender
{
    text-align: left ;
    float: left;
}
.chat-msg .left
{
    float: left;
}
.chat-msg .right
{
    float: right;
}

.clearfix {
  clear: both;
  margin-bottom: 15% !important;
}


    </style>

</body>
</html>

{{-- 
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}


  {{-- seond nav bar --}}
{{-- 
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-hover">
       
                <a class="navbar-brand" href="#">
                  
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" 
                aria-label="Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHover">
                  
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" href="" data-toggle="dropdown_remove_dropdown_class_for_clickable_link" arial-haspopup="true"
                            arial-expanded="false">
                            Category(Electronics)
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="" class="dropdown-item dropdown-toggle" href="">
                                        Subcategory(Laptop)
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                ChildCategory(Dell Laptop)
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav> --}}
{{-- end second navbar --}}