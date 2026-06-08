<?php
$title = 'Pregled sporočil - Admin';
include 'header.php';
include 'config/db.php'; 


$sql = "SELECT * FROM kontaktna_sporocila ORDER BY datum_oddaje DESC";
$result = $conn->query($sql);
?>

<main class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4 fw-bold fst-italic text-uppercase">Prejeta kontaktna sporočila</h2>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Ime in priimek</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Storitev</th>
                            <th>Sporočilo</th>
                            <th>Datum</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 2. KORAK: Izpis podatkov v tabelo z zanko
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . htmlspecialchars($row['ime'] . ' ' . $row['priimek']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['telefon']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['storitev']) . "</td>";
                                echo "<td>" . nl2br(htmlspecialchars($row['sporocilo'])) . "</td>";
                                echo "<td>" . $row['datum_oddaje'] . "</td>";
                                // Tukaj bova kasneje dodala gumba za Uredi in Izbriši
                                echo "<td>
                                        <a href='uredi.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning mb-1 w-100'>Uredi</a>
                                        <a href='izbrisi.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger w-100' onclick='return confirm(\"Prepričan?\")'>Izbriši</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Ni prejetih sporočil.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</main>

<?php 
$conn->close();
include 'footer.php'; 
?>