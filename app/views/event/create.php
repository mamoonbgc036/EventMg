<?php include ROOT . '/app/views/dashboard/layout/header.php'; ?>
<div class="container my-2">
    <div class="card shadow-lg" style="margin-top:60px">
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
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Available Seat</label>
                        <input type="number" value="<?= $data[0]['event_seat'] ?>" name="event_seat"
                            class="form-control" required>
                        <?php echo isset($_SESSION['errors']['event_seat']) ? '<p class="text-danger">' . $_SESSION['errors']['event_seat'] . '</p>' : null ?>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input type="date" value="<?= $data[0]['event_date'] ?>" name="event_date" class="form-control"
                            required>
                        <?php echo isset($_SESSION['errors']['event_date']) ? '<p class="text-danger">' . $_SESSION['errors']['event_date'] . '</p>' : null ?>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Time</label>
                        <input type="time" value="<?= $data[0]['event_time'] ?>" name="event_time" class="form-control"
                            required>
                        <?php echo isset($_SESSION['errors']['event_time']) ? '<p class="text-danger">' . $_SESSION['errors']['event_time'] . '</p>' : null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="event_location" class="form-control" required>
                    <?php echo isset($_SESSION['errors']['event_location']) ? '<p style="color: red;">' . $_SESSION['errors']['event_location'] . '</p>' : null ?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Create Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/dashboard/layout/footer.php'; ?>