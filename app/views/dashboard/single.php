<?php include ROOT . '/app/views/dashboard/layout/header.php';


?>
<div class="container mt-5">
    <div class="card shadow-lg border-0 my-5 text-center">
        <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Event Image">
        <div class="card-body">
            <h5 class="card-title text-primary fw-bold"><?= $data[0]['event_name'] ?></h5>
            <p class="card-text text-muted"><?= $data[0]['event_desc'] ?></p>
            <p class="card-text"><i class="bi bi-calendar-event"></i>
                <strong>Date:</strong><?= $data[0]['event_date'] ?>
            </p>
            <p class="card-text"><i class="bi bi-clock"></i> <strong>Time:</strong><?= $data[0]['event_time'] ?>
            </p>
            <p class="card-text"><i class="bi bi-geo-alt"></i>
                <strong>Location:</strong><?= $data[0]['event_location'] ?>
            </p>
            <p class="card-text"><i class="bi bi-calendar-event"></i>
                <strong>Available Seat:</strong><?= $data[0]['event_seat'] ?>
            </p>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/dashboard/layout/footer.php'; ?>