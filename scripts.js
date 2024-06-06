$(document).ready(function() {
    let otpVerified = false;

    $('#sendOtpBtn').click(function() {
        var phoneNumber = $('#phoneNumber').val();
        $.ajax({
            url: 'send_otp.php',
            type: 'POST',
            data: { phoneNumber: phoneNumber },
            success: function(response) {
                $('#result').html(response).show();
            }
        });
    });

    $('#verifyOtpBtn').click(function() {
        var phoneNumber = $('#phoneNumber').val();
        var otp = $('#otp').val();
        $.ajax({
            url: 'verify_otp.php',
            type: 'POST',
            data: { phoneNumber: phoneNumber, otp: otp },
            success: function(response) {
                $('#result').html(response).show();
                if (response.includes('OTP verified successfully')) {
                    otpVerified = true;
                } else {
                    otpVerified = false;
                }
            }
        });
    });

    $('#contactForm').submit(function(event) {
        event.preventDefault();
        if (!otpVerified) {
            alert('Please verify your OTP first.');
            return;
        }
        $.ajax({
            url: 'submit_contact_form.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = 'thankyou.html';
            }
        });
    });
});
