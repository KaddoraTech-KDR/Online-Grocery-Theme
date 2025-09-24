jQuery(document).ready(function($) {
    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        var messageDiv = $('#login-message');
        
        messageDiv.html('<p class="loading">Logging in...</p>');
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=login_user',
            success: function(response) {
                if (response.success) {
                    messageDiv.html('<p class="success">' + response.data + '</p>');
                    setTimeout(function() {
                        window.location.href = ajax_object.home_url + '/dashboard';
                    }, 1000);
                } else {
                    messageDiv.html('<p class="error">' + response.data + '</p>');
                }
            },
            error: function() {
                messageDiv.html('<p class="error">An error occurred. Please try again.</p>');
            }
        });
    });
    
    $('#register-form').on('submit', function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        var messageDiv = $('#register-message');
        
        var password = $('#register-password').val();
        var confirmPassword = $('#register-confirm-password').val();
        
        if (password !== confirmPassword) {
            messageDiv.html('<p class="error">Passwords do not match.</p>');
            return;
        }
        
        messageDiv.html('<p class="loading">Registering...</p>');
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=register_user',
            success: function(response) {
                if (response.success) {
                    messageDiv.html('<p class="success">' + response.data + '</p>');
                    setTimeout(function() {
                        window.location.href = ajax_object.home_url + '/dashboard';
                    }, 1000);
                } else {
                    messageDiv.html('<p class="error">' + response.data + '</p>');
                }
            },
            error: function() {
                messageDiv.html('<p class="error">An error occurred. Please try again.</p>');
            }
        });
    });
    
    $('#register-confirm-password').on('keyup', function() {
        var password = $('#register-password').val();
        var confirmPassword = $(this).val();
        var messageDiv = $('#register-message');
        
        if (confirmPassword !== '' && password !== confirmPassword) {
            messageDiv.html('<p class="error">Passwords do not match.</p>');
        } else if (confirmPassword !== '' && password === confirmPassword) {
            messageDiv.html('<p class="success">Passwords match.</p>');
        } else {
            messageDiv.html('');
        }
    });
});