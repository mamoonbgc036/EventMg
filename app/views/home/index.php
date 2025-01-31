<?php include ROOT . '/app/views/layout/header.php'; ?>
<section id="events" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div class="row g-4">
            <!-- Event Card 1 -->
            <div class="row g-4">
                <?php foreach ($data as $event): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($event['event_name']); ?></h5>
                                <p class="card-text">Date: <?php echo htmlspecialchars($event['event_date']); ?></p>
                                <p class="card-text">Time: <?php echo htmlspecialchars($event['event_time']); ?></p>
                                <p class="card-text">Seats Available: <?php echo htmlspecialchars($event['event_seat']); ?>
                                </p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/app/views/layout/footer.php'; ?>