    @extends('layouts.app')

    @section('content')
    <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide pt-5" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/images/carousel1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/images/carousel2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/images/carousel3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

    <div class="footer">

      <!-- Footer -->
    <footer class="page-footer font-small blue" style="margin-top: 10rem">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> ChatTech Inc.</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    </div>


    @endsection
