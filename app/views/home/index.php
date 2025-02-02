<?php include ROOT . '/app/views/layout/header.php'; ?>
<section id="events" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div class="row g-4">
            <!-- Event Card 1 -->
            <div class="row g-4">
                <?php foreach ($data as $event): ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-lg p-3" style="background: #f8f9fa;">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-primary">
                                    <?php echo htmlspecialchars($event['event_name']); ?>
                                </h5>
                                <hr class="my-2">
                                <p class="card-text mb-1">
                                    <strong>Date:</strong> <?php echo htmlspecialchars($event['event_date']); ?>
                                </p>
                                <p class="card-text mb-1">
                                    <strong>Time:</strong> <?php echo htmlspecialchars($event['event_time']); ?>
                                </p>
                                <p class="card-text mb-3">
                                    <strong>Seats Available:</strong>
                                    <span
                                        class="badge bg-success"><?php echo htmlspecialchars($event['event_seat']); ?></span>
                                </p>
                                <button data-event="<?= $event['id'] ?>"
                                    class="btn showFormBtn btn-outline-primary w-100 rounded-pill">Book Now</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/app/views/layout/footer.php'; ?>