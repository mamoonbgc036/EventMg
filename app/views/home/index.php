<?php include ROOT . '/app/views/layout/header.php'; ?>
<!-- Events Section -->
<section id="events" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div class="row g-4">
            <!-- Event Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event 1">
                    <div class="card-body">
                        <h5 class="card-title">Corporate Gala Night</h5>
                        <p class="card-text">Date: March 15, 2025</p>
                        <p class="card-text">Fees: $150</p>
                        <a href="/EventMg/logout" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Music Festival</h5>
                        <p class="card-text">Date: April 20, 2025</p>
                        <p class="card-text">Fees: $50</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Event 3">
                    <div class="card-body">
                        <h5 class="card-title">Tech Expo 2025</h5>
                        <p class="card-text">Date: May 10, 2025</p>
                        <p class="card-text">Fees: $100</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/app/views/layout/footer.php'; ?>