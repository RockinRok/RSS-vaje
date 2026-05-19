<?php
$title = 'Kontakt - Snemanje na zahtevo';
include 'header.php';

$sporocilo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime      = htmlspecialchars($_POST['ime'] ?? '');
    $priimek  = htmlspecialchars($_POST['priimek'] ?? '');
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $telefon  = htmlspecialchars($_POST['telefon'] ?? '');
    $storitev = htmlspecialchars($_POST['storitev'] ?? '');
    $sporocilo_vsebina = htmlspecialchars($_POST['sporocilo'] ?? '');

    $sporocilo = '<div class="alert alert-success">Sporočilo uspešno poslano!</div>';
}
?>

  <main class="container-fluid px-0">
    <div class="row g-0">

      <div class="col-12 col-lg-2 sidebar border-end order-last order-lg-first">
        <div class="p-2 text-center border-bottom">
          <span class="fw-bold small text-uppercase">Navigacija</span>
        </div>
        <div class="p-2 text-center">
          <a href="Galerija.html" class="sidebar-link text-uppercase fw-bold small">Galerija</a>
        </div>
      </div>

      <div class="col-12 col-lg-10 p-4">
        <?php echo $sporocilo; ?>
        <div class="row g-3">

          <div class="col-md-4">
            <div class="vsebina-box p-4 border h-100">
              <h2 class="fw-bold fst-italic mb-4">KONTAKTIRAJTE NAS</h2>
              <p class="small fw-bold mb-1">TELEFONSKA ŠTEVILKA:</p>
              <ul class="small mb-3"><li>+386 80 808 808</li></ul>
              <p class="small fw-bold mb-1">MOBILNA ŠTEVILKA</p>
              <ul class="small mb-3"><li>02 808 8080</li></ul>
              <p class="small fw-bold mb-1">EMAIL:</p>
              <ul class="small mb-3"><li>snemanjenazahtevo@gmail.com</li></ul>
              <p class="small fw-bold mb-1">DAVČNA ŠTEVILKA</p>
              <ul class="small mb-3"><li>12345678</li></ul>
              <p class="small fw-bold mb-1">TRR</p>
              <ul class="small mb-3"><li>SI56 1234 5678 1234 123</li></ul>
            </div>
          </div>

          <div class="col-md-8">
            <div class="vsebina-box p-4 border h-100">
              <form action="kontakt.php" method="POST">

                <div class="mb-3">
                  <label class="form-label small fw-bold">Ime *</label>
                  <input type="text" name="ime" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Priimek *</label>
                  <input type="text" name="priimek" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Email *</label>
                  <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Telefonska številka</label>
                  <input type="tel" name="telefon" class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Vrsta storitve</label>
                  <select name="storitev" class="form-select">
                    <option value="">-- Izberi storitev --</option>
                    <option value="poroke">Snemanje porok</option>
                    <option value="zabave">Snemanje zabav</option>
                    <option value="filmi">Snemanje filmov</option>
                    <option value="drugo">Drugo</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Sporočilo *</label>
                  <textarea name="sporocilo" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-dark w-100">Pošlji</button>

              </form>
            </div>
          </div>

        </div>
      </div>

    </div>
  </main>

<?php include 'footer.php'; ?>