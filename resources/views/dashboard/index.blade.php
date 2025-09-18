@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Examples -->
  <div class="row mb-4 g-4">
    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/elements/2.jpg') }}" alt="Card image" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="#" class="btn btn-outline-primary">Go somewhere</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h6 class="card-subtitle">Support card subtitle</h6>
        </div>
        <img class="img-fluid" src="{{ asset('img/elements/10.jpg') }}" alt="Card image" />
        <div class="card-body">
          <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h6 class="card-subtitle">Support card subtitle</h6>
          <img class="img-fluid d-flex mx-auto my-3 rounded" src="{{ asset('img/elements/4.jpg') }}" alt="Card image" />
          <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </div>
  <!--/ Examples -->

  <!-- Content types -->
  <h5 class="pb-1 mb-4">Content types</h5>
  <div class="row mb-4 g-4">
    <div class="col-md-6 col-lg-4">
      <h6 class="mt-2 text-muted">Body</h6>
      <div class="card mb-3">
        <div class="card-body">
          <p class="card-text">
            This is some text within a card body. Jelly lemon drops tiramisu chocolate cake cotton candy soufflé oat
            cake sweet roll.
          </p>
        </div>
      </div>

      <h6 class="mt-2 text-muted">Titles, text, and links</h6>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-1">Card title</h5>
          <div class="card-subtitle mb-2">Card subtitle</div>
          <p class="card-text">Some quick example text to build on the card title.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>

      <h6 class="mt-2 text-muted">List groups</h6>
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <h6 class="mt-2 text-muted">Images</h6>
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/elements/5.jpg') }}" alt="Card image" />
        <div class="card-body">
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <p class="card-text">
            Cookie topping caramels jujubes gingerbread. Lollipop apple pie cupcake candy canes cookie ice cream.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <h6 class="mt-2 text-muted">Kitchen sink</h6>
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/elements/7.jpg') }}" alt="Card image" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </div>
  <!--/ Content types -->

  <!-- Custom Example Cards -->
  <h5 class="pb-1 mb-4">Custom Example Cards</h5>
  <div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img src="{{ asset('img/elements/2.jpg') }}" class="card-img-top" alt="Image 1">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img src="{{ asset('img/elements/10.jpg') }}" class="card-img-top" alt="Image 2">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
  <!--/ Custom Example Cards -->

  <!-- Masonry Layout -->
  <h5 class="pb-1 mb-4">Masonry Layout</h5>
  <div class="row g-6" data-masonry='{"percentPosition": true }'>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <img src="{{ asset('img/elements/15.jpg') }}" class="card-img-top" alt="Image 3">
        <div class="card-body">
          <h5 class="card-title">Masonry Card</h5>
          <p class="card-text">This is a masonry card example.</p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Masonry Layout -->

</div>
@endsection

@push('scripts')
  {{-- Masonry Layout --}}
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endpush
