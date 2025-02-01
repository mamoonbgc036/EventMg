<?php include ROOT . '/app/views/layout/header.php'; ?>
<div class="container my-2">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4>Create Event</h4>
        </div>
        <div class="card-body">
            <form action="/EventMg/event/store" method="POST">
                <div class="mb-3">
                    <label class="form-label">Event Name</label>
                    <input type="text" name="event_name" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_name']) ? '<p style="color: red;">' . $_SESSION['errors']['event_name'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="event_desc" class="form-control" rows="3" required></textarea>
                    <?php echo isset($_SESSION['errors']['event_desc']) ? '<p style="color: red;">' . $_SESSION['errors']['event_desc'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Available Seat</label>
                    <input type="number" name="event_seat" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_seat']) ? '<p style="color: red;">' . $_SESSION['errors']['event_seat'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="event_date" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_date']) ? '<p style="color: red;">' . $_SESSION['errors']['event_date'] . '</p>' : null ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="event_time" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_time']) ? '<p style="color: red;">' . $_SESSION['errors']['event_time'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="event_location" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_location']) ? '<p style="color: red;">' . $_SESSION['errors']['event_location'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Create Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/layout/footer.php'; ?>