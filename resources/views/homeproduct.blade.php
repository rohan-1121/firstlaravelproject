
@include('front_component.head')
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Gift Shop By Sabina
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        @include('front_component.nav')
      </nav>
    </header>
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <!-- product_detail section -->
  <!-- product_detail section -->
  <section class="product_detail_section layout_padding">
    <div class="container">
      <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
          <div style="width:70%; height:400px; overflow:hidden; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <img src="{{ asset('productimage/'.$list->image) }}" alt="Product Image" style="width:100%; height:100%; object-fit:cover;">
          </div>
        </div>

        <!-- Product Info -->
        <div class="col-md-6">
          <div style="padding:20px;">
            <h2 style="font-weight:600; font-size:28px; margin-bottom:10px; color:#222;">
              {{$list->name}}
            </h2>
            <p style="font-size:22px; color:#007bff; font-weight:bold; margin:10px 0;">
              ${{$list->price}}
            </p>

            <h4 style="margin-top:20px; font-size:18px; color:#333;">Description</h4>
            <p style="color:#555; line-height:1.6; font-size:15px;">
              {{$list->description}}
            </p>

            <!-- Quantity + Button -->
            <div style="margin-top:25px; display:flex; align-items:center; gap:15px;">
              <input type="number" value="1" min="1" 
          i        style="width:70px; padding:8px; font-size:16px; border:1px solid #ccc; border-radius:5px; text-align:center;">
              
              <a href="{{route('add_to_cart',$list->id)}}">
                <button style="background:#0d6efd; color:white; border:none; padding:12px 30px; font-size:16px; border-radius:6px; cursor:pointer; transition:0.3s;">
                Add to Cart
              </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end product detail section -->



  <!-- end product detail section -->

@include('front_component.footer')
  <!-- end info section -->


@include('front_component.jquey')