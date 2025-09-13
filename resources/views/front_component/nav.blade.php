@php
use App\Models\addtoCart;
use Illuminate\Support\Facades\Auth;
if(Auth::check() && Auth::user()->user_type=='user')
{
  $tp=addtoCart::where('user_id',Auth::id())->count();
}
@endphp

<div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('dashboard')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('usershop')}}">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.html">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.html">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
              <i class="fa fa-user" aria-hidden="true"></i>
                {{ __('Log Out') }}
            </button>
        </form>
            &nbsp;
            &nbsp;
            <a href="{{ route('cartlist')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              {{$tp}}
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>