<?php
include 'config/db.php'; 

$sporocilo_obvestilo = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = intval($_POST['id'] ?? 0);
    $ime      = htmlspecialchars($_POST['ime'] ?? '');
    $priimek  = htmlspecialchars($_POST['priimek'] ?? '');
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $telefon  = htmlspecialchars($_POST['telefon'] ?? '');
    $storitev = htmlspecialchars($_POST['storitev'] ?? '');
    $sporocilo_vsebina = htmlspecialchars($_POST['sporocilo'] ?? '');

    $sql = "UPDATE kontaktna_sporocila SET ime = ?, priimek = ?, email = ?, telefon = ?, storitev = ?, sporocilo = ? WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssi", $ime, $priimek, $email, $telefon, $storitev, $sporocilo_vsebina, $id);
        
        if ($stmt->execute()) {
            // TUKAJ ZDAJ PREUSMERITEV DELUJE, ker brskalniku še nismo poslali HTML-ja!
            header("Location: pregled.php");
            exit();
        } else {
            $sporocilo_obvestilo = '<div class="alert alert-danger">Napaka pri posodabljanju: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    }
}


if ($id > 0) {
    $sql = "SELECT * FROM kontaktna_sporocila WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $ime      = $row['ime'];
            $priimek  = $row['priimek'];
            $email    = $row['email'];
            $telefon  = $row['telefon'];
            $storitev = $row['storitev'];
            $sporocilo_vsebina = $row['sporocilo'];
        } else {
            header("Location: pregled.php");
            exit();
        }
        $stmt->close();
    }
} else {
    header("Location: pregled.php");
    exit();
}


$title = 'Uredi sporočilo - Admin';
include 'header.php'; 
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0 fw-bold text-uppercase">Uredi kontaktno sporočilo (ID: <?php echo $id; ?>)</h4>
                </div>
                <div class="card-body p-4">
                    <?php echo $sporocilo_obvestilo; ?>
                    
                    <form action="uredi.php?id=<?php echo $id; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Ime *</label>
                            <input type="text" name="ime" class="form-control" value="<?php echo htmlspecialchars($ime); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Priimek *</label>
                            <input type="text" name="priimek" class="form-control" value="<?php echo htmlspecialchars($priimek); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email *</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Telefonska številka</label>
                            <input type="tel" name="telefon" class="form-control" value="<?php echo htmlspecialchars($telefon); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Vrsta storitve</label>
                            <select name="storitev" class="form-select">
                                <option value="" <?php echo ($storitev == '') ? 'selected' : ''; ?>>-- Izberi storitev --</option>
                                <option value="poroke" <?php echo ($storitev == 'poroke') ? 'selected' : ''; ?>>Snemanje porok</option>
                                <option value="zabave" <?php echo ($storitev == 'zabave') ? 'selected' : ''; ?>>Snemanje zabav</option>
                                <option value="filmi" <?php echo ($storitev == 'filmi') ? 'selected' : ''; ?>>Snemanje filmov</option>
                                <option value="drugo" <?php echo ($storitev == 'drugo') ? 'selected' : ''; ?>>Drugo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Sporočilo *</label>
                            <textarea name="sporocilo" class="form-control" rows="4" required><?php echo htmlspecialchars($sporocilo_vsebina); ?></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-dark flex-grow-1">Shrani spremembe</button>
                            <a href="pregled.php" class="btn btn-outline-secondary">Prekliči</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
$conn->close();
include 'footer.php'; 
?>