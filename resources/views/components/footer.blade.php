  <footer class="text-center text-lg-start text-dark bg_main p-0" >
    <section class="d-flex justify-content-between p-4 text-white bg_accent">
      <div class="">
        <span>{{__('ui.Get in contact with us')}}:</span>
      </div>
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>

    </section>

    <section class="">
      <div class="container text-center text-md-start mt-5">

        <div class="row mt-3">

          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

            <h6 class="text-uppercase fw-bold">Presto.it</h6>
            {{-- <hr class="mb-4 mt-0 d-inline-block mx-auto"/> --}}
            <p class="m-0">
             {{__('ui.footer text')}}
            </p>
            <p class="m-0">{{__('ui.thank you all')}}</p> 
            <div class="d-flex justify-content-center">
                <x-_locale lang='it' nation='it'/>   
                <x-_locale lang='en' nation='en'/>
                <x-_locale lang='fr' nation='fr'/>
                <x-_locale lang='zh' nation='zh'/>
            </div>
          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">SERVICES</h6>
            {{-- <hr class="mb-4 mt-0 d-inline-block mx-auto"/> --}}
            <p>
              <a href="#!" class="text-dark text-decoration-none hover_accent">{{__('ui.Buy')}}</a>
            </p>
            <p>
              <a href="#!" class="text-dark text-decoration-none hover_accent">{{__('ui.Sell')}}</a>
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            {{-- <hr class="mb-4 mt-0 d-inline-block mx-auto"/> --}}
                        <p>
              <a href="{{route('become.revisor')}}" class="text-dark text-decoration-none hover_accent">{{__('ui.Work With Us')}}</a>
            </p>
            <p>
              <a href="#!" class="text-dark text-decoration-none hover_accent">{{__('ui.About Us')}}</a>
            </p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <h6 class="text-uppercase fw-bold">Contacts</h6>
            {{-- <hr class="mb-4 mt-0 d-inline-block mx-auto"/> --}}
            <a href="#" class="d-block text_dark text-decoration-none hover_accent my-2"><i class="bi bi-facebook mx-1"></i> Facebook</a>

            <a href="#" class="d-block text_dark text-decoration-none hover_accent my-2"><i class="bi bi-instagram mx-1"></i> Instagram</a>

            <a href="#" class="d-block text_dark text-decoration-none hover_accent my-2"><i class="bi bi-whatsapp mx-1"></i> + 01 234 567 88</a>

            <a href="#" class="d-block text_dark text-decoration-none hover_accent my-2"><i class="bi bi-linkedin mx-1"></i> /presto.it/BugBusters</a>

          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-3 bg_dark text_main">
        © 2023 Copyright:
      <a class="text-decoration-none text_main" href="#">Bug Busters</a>
    </div>

  </footer>

