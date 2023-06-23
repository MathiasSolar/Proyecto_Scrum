<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio</title>
    <link rel="stylesheet" type="text/css" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar" style="background-color: #074469;">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: #ffffff; "><img src="{{ asset('img/logousm.png') }}" class="img-fluid" alt="usm" width="90" height="90"> Universidad Técnica Federico Santa María</a>
    <form class="d-flex" role="search">
      <div>
      <a href="{{ route('horarios.index') }}" class="btn btn-outline-light btn-lg">Reservar</a>
      </div>
    
    </form>
  </div>
</nav>

<style>
  body {
      background-image: url("{{ asset('img/USM.jpg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 100vh;
  }
</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

