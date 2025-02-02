<?php include ROOT . '/app/views/dashboard/layout/header.php'; ?>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Create Event Button -->
                    <div style="text-align: right; margin-bottom: 15px;">
                        <a href="/EventMg/event/create" class="btn btn-primary">
                            Create Event
                        </a>
                        <?php
                        if ($_SESSION['role_id'] == 1):
                            ?>
                            <a href="/EventMg/downloadCsv" class="btn btn-success btn-sm" style="margin-left: 10px;">
                                Download CSV
                            </a>
                            <?php
                        endif;
                        ?>
                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Available Seat</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    foreach ($data as $key => $datum) {
                                        ?>
                                        <tr class="table-warning text-dark">
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo htmlspecialchars($datum['event_name']); ?></td>
                                            <td><?php echo htmlspecialchars($datum['event_date']); ?></td>
                                            <td><?php echo htmlspecialchars($datum['event_time']); ?></td>
                                            <td><?php echo htmlspecialchars($datum['event_seat']); ?></td>
                                            <td><?php echo htmlspecialchars($datum['created_at']); ?></td>
                                            <td>
                                                <a href="/EventMg/event/edit/<?= htmlspecialchars($datum['id']); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="/EventMg/events/show/<?= htmlspecialchars($datum['id']); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                                <a href="/EventMg/event/delete/<?= htmlspecialchars($datum['id']); ?>"
                                                    onclick="return confirm('Are you sure you want to delete this event?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7" class="text-center">You have no events added</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/dashboard/layout/footer.php'; ?>