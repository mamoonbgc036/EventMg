<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2025 Share&Care Limited. All Rights Reserved.</p>
    </div>
</footer>

<script>
$(document).ready(function() {
    $(".showFormBtn").click(function() {
        var eventId = $(this).data("event"); // Get data-event value
        $("#eventId").val(eventId); // Set it in the hidden input
        $("#bookingForm").slideDown(function() {
            $("html, body").animate({
                scrollTop: $("#bookingForm").offset().top - 50
            }, 10);
        });
    });

    $("#closeFormBtn").click(function() {
        $("#bookingForm").slideUp();
    });

    $("#confirmBtn").click(function() {
        var phone = $("input[type='text']").val();
        var email = $("input[type='email']").val();
        var eventId = $("#eventId").val(); // Get event ID from hidden field

        $.ajax({
            url: "/EventMg/book",
            type: "POST",
            data: {
                phone: phone,
                email: email,
                event_id: eventId
            }, // Include event ID
            success: function(response) {
                console.log(response, 'check');
                var toast = new bootstrap.Toast(document.getElementById('successToast'));
                toast.show();
                $("#bookingForm").slideUp();
            },
            error: function() {
                alert("Booking failed. Please try again.");
            }
        });
    });
});
</script>
</body>

</html>