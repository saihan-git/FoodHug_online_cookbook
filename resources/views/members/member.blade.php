<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Restaurants</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/member.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
      <img src="{{ asset('images/main-logo.png') }}" width="150" height="100" alt="Logo Image">
      <form class="search-bar">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
    </nav>
  </div>

  <!-- Slider -->
  <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://via.placeholder.com/1920x500" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/1920x500" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="https://via.placeholder.com/1920x500" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Recipe Cards -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4 recipe-card">
        <div class="card">
          <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Recipe Image">
          <div class="card-body">
            <h5 class="card-title">Recipe Title 1</h5>
            <p class="card-text">Short description of the recipe.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 recipe-card">
        <div class="card">
          <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Recipe Image">
          <div class="card-body">
            <h5 class="card-title">Recipe Title 2</h5>
            <p class="card-text">Short description of the recipe.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 recipe-card">
        <div class="card">
          <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Recipe Image">
          <div class="card-body">
            <h5 class="card-title">Recipe Title 3</h5>
            <p class="card-text">Short description of the recipe.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 recipe-card">
      <div class="card">
        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Recipe Image">
        <div class="card-body">
          <h5 class="card-title">Recipe Title 3</h5>
          <p class="card-text">Short description of the recipe.</p>
        </div>
      </div>
    </div>
  </div>
    <!-- Repeat the row for more recipe cards -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
