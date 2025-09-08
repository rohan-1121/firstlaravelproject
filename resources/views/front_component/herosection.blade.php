<!-- slider section -->
 @php
    $hero=App\Models\dynamic::get();
@endphp
    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              @foreach ($hero as $list )
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box"> 
                      <h1>
                        {{$list->heading}}
                      </h1>
                      <p style="text-align: justify">
                        {{$list->paragraph}}
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width:100%; max-width:400px; height:400px; object-fit:cover;" src="{{asset('heroimage/'.$list->image)}}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            
          </div>
          
        </div>
      </div>
    </section>

    <!-- end slider section -->