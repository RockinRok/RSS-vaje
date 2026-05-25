<!DOCTYPE html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?? 'Snemanje na zahtevo'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body>

  <div class="hero-wrapper">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid px-3">
        <div class="d-flex align-items-center">
          <a class="navbar-brand" href="index.php">
            <img src="slike/logotiprss.png" alt="Logo" height="60">
          </a>
          <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="menu-okvir">
            <ul class="navbar-nav flex-row">
              <li class="nav-item"><a class="nav-link fw-semibold px-2" href="index.html">DOMOV</a></li>
              <li class="nav-item"><a class="nav-link fw-semibold px-2" href="storitve.html">STORITVE</a></li>
              <li class="nav-item"><a class="nav-link fw-semibold px-2" href="reference.html">REFERENCE</a></li>
              <li class="nav-item"><a class="nav-link fw-semibold px-2" href="onas.html">O NAS</a></li>
              <li class="nav-item"><a class="nav-link fw-semibold px-2" href="kontakt.php">KONTAKT</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="hero-title-area px-4 py-5">
      <h1 class="text-white fw-bold text-uppercase">Snemanje na zahtevo</h1>
    </div>
  </div>