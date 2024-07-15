<?php
include '../shared/connection.php';

include "authentication.php";
include 'template.html';
$id = $_POST['name'];
$stmt = $conn->prepare('SELECT * FROM bikes WHERE id = ?');
$stmt->bind_param('s', $id);
$stmt->execute();
$sql_result = $stmt->get_result();

$st = $conn->prepare('SELECT * FROM brand');
$st->execute();
$sql_result2 = $st->get_result();

while ($row = mysqli_fetch_assoc($sql_result)) {
    echo "
        <div class='position-absolute top-50 start-50 translate-middle w-75 ms-5'>
        
            <form method='POST' action='editbike.php' enctype='multipart/form-data' class='ps-5 row g-3'>
                <div class='col-md-6'>
                    <label for='vehicle_title' class='form-label'>Vehicle Title</label>
                    <input type='text' class='form-control' name='vehicle_title' value='{$row['title']}'>
                </div>
                <div class='col-md-6'>
                    <label for='select_brand' class='form-label'>Select Brand</label>
                    <select name='select_brand' class='form-select'>
                        <option selected>Choose...</option>";
                        
                        while ($row2 = mysqli_fetch_assoc($sql_result2)) {
                            $selected = ($row2['name'] === $row['brand']) ? "selected" : "";
                            echo "<option value='{$row2['name']}' $selected>{$row2['name']}</option>";
                        }
                        
    echo "          </select>
                </div>

                <div class='col-12'>
                    <label for='overview' class='form-label'>Model Overview</label>
                    <textarea class='form-control' name='overview' placeholder='Write something here.....'>{$row['overview']}</textarea>
                </div>
                <div class='col-md-2'>
                    <label for='model_year' class='form-label'>Model Year</label>
                    <input type='text' class='form-control' name='model_year' value='{$row['year']}'>
                </div>
                <div class='col-md-4'>
                    <label for='seats' class='form-label'>Seating Capacity</label>
                    <select name='seats' class='form-select'>
                        <option selected>Choose...</option>
                        <option value='1' " . ($row['capacity'] == 1 ? "selected" : "") . ">1</option>
                        <option value='2' " . ($row['capacity'] == 2 ? "selected" : "") . ">2</option>
                        <option value='3' " . ($row['capacity'] == 3 ? "selected" : "") . ">3</option>
                    </select>
                </div>
                <div class='col-md-2'>
                    <label for='rent' class='form-label'>Rent per day</label>
                    <input type='number' class='form-control' name='rent' value='{$row['rent']}'>
                </div>
                <div class='col-md-4'>
                    <label for='fuel' class='form-label'>Fuel Type</label>
                    <select name='fuel' class='form-select'>
                        <option selected>Choose...</option>
                        <option value='Petrol' " . ($row['fuel'] == 'Petrol' ? "selected" : "") . ">Petrol</option>
                        <option value='CNG' " . ($row['fuel'] == 'CNG' ? "selected" : "") . ">CNG</option>
                        <option value='Electric' " . ($row['fuel'] == 'Electric' ? "selected" : "") . ">Electric</option>
                    </select>
                </div>
                <div class='col-md-4'>
                    <label for='img1' class='form-label'>Image 1</label>
                    <input type='file' name='img1' class='form-control mt-2' required>
                </div>
                <div class='col-md-4'>
                    <label for='img2' class='form-label'>Image 2</label>
                    <input type='file' name='img2' class='form-control mt-2' required>
                </div>
                <div class='col-md-4'>
                    <label for='img3' class='form-label'>Image 3</label>
                    <input type='file' name='img3' class='form-control mt-2' required>
                </div>

                <!-- accessories -->
                <div class='row g-3'>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='antilock' " . ($row['Break'] ? "checked" : "") . ">
                        <label class='form-check-label' for='antilock'>
                            Anti-Lock Braking System
                        </label>
                    </div>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='brake_assist' " . ($row['breakAssit'] ? "checked" : "") . ">
                        <label class='form-check-label' for='brake_assist'>
                            Brake Assist
                        </label>
                    </div>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='crash_sensor' " . ($row['crashSensor'] ? "checked" : "") . ">
                        <label class='form-check-label' for='crash_sensor'>
                            Crash Sensor
                        </label>
                    </div>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='smooth_handling' " . ($row['smoothHandling'] ? "checked" : "") . ">
                        <label class='form-check-label' for='smooth_handling'>
                            Smooth Handling
                        </label>
                    </div>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='cen_lock' " . ($row['centralLocking'] ? "checked" : "") . ">
                        <label class='form-check-label' for='cen_lock'>
                            Central Locking
                        </label>
                    </div>
                    <div class='form-check col-md-4'>
                        <input class='form-check-input' type='checkbox' value='' name='leather_seats' " . ($row['LeatherSeats'] ? "checked" : "") . ">
                        <label class='form-check-label' for='leather_seats'>
                            Leather Seats
                        </label>
                    </div>
                </div>
                
                
                <div class='col-12 d-flex justify-content-between'>
                 <input type='hidden' name='id' value='{$row['id']}'>
                 <input type='submit' class='col-md-4 btn btn-primary' value='Update'>
                 <a class='btn col-md-4 btn-warning' href='update_bike.php'>Back</a>   
                </div>
            </form>
        </div>
    ";
}

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>
