
<?php
include "../shared/connection.php";
 include "template.html";

$name = $_POST['name'];
$stmt = $conn->prepare("SELECT * FROM brand WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$sql_result = $stmt->get_result();

while ($row = mysqli_fetch_assoc($sql_result)) {
    echo "
    <div class='card position-absolute bottom-0 mb-5 end-50 w-25 border border-dark'>
    <div class='card-img-top  '> <img src='$row[logo]' class='h-100 w-100 rounded'></div>
        <form method='POST' action='edit.php' enctype='multipart/form-data' class='card-body mx-auto my-2 row g-3'>
            <div class='row-md-4'>
                <label for='brand_name' class='form-label'>Brand name</label>
                <input type='text' class='form-control'id='brand_name' value='" . htmlspecialchars($row['name'], ENT_QUOTES) . "' name='brand_name'>
            </div>

            <div class='row-md-4'>
                <label for='bikes' class='form-label'>Bikes</label>
                <input type='number' class='form-control' id='bikes' value='" . htmlspecialchars($row['bikes'], ENT_QUOTES) . "' name='bikes'>
            </div>

            <div class='row-md-4'>
                <label for='brand_logo' class='form-label'>Brand logo</label>
                <input type='file' class='form-control' id='brand_logo' name='brand_logo'  >
            </div>
 
            <div class='row-md-4 mt-5'>
                <button type='submit' class='px-5 btn btn-primary'>Update</button>
            </div>
        </form>
    </div>";
}

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>
