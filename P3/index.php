<?php
include 'header.php'
?>

<main>
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/index-carousel-5.png" alt=""><div class="container">
          <div class="carousel-caption text-start">
            <h1>Facultad de Ciencias Puras y Naturales</h1>
            <p class="opacity-75">Campus Virtual.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Clases Virtuales</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/50165278342_2cea9de908_c.jpeg" alt=""><div class="container"></div>
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Pionera en el Sistema Universitario Boliviano.</h1>
            <p>Excelencia en la Formación Profesional.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Acreditación</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/50165278372_65bdfaba47_c.jpeg" alt=""><div class="container"></div>
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Instituto de Investigación en Informática.</h1>
            <p>Desarrollo de Sofware & Tecnología.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Ingresar</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <span class="fs-4">COMUNICADOS Y NOTICIAS</span>
    </header>

    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Comunicado </h1>
        <p class="col-md-8 fs-4">en esta sección se encontrara las noticias más recientes de la carrera de informática</p>
        <button class="btn btn-primary btn-lg" type="button">ver noticia</button>
      </div>
    </div>
  </div>
</main>

<?php
include 'footer.php'
?>