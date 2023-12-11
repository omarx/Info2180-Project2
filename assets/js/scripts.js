$(document).ready(function() {
    loadUsers();
    function loadUsers() {
        $.ajax({
            type: "GET",
            url: "./utils/get_users.php",
            dataType: "json",
            success: function(response) {
                if(response.status === 'success') {
                    $.each(response.users, function(i, user) {
                        $('#assigned').append($('<option>', {
                            value: user.id,
                            text : user.firstname + ' ' + user.lastname
                        }));
                    });
                }
            }
        });
    }



    const loginAttempt = $("#loginForm").data("login-attempt");

    if (loginAttempt === 'fail') {
        Swal.fire({
            title:'Error',
            text:'Oops! Wrong username or password',
            icon:'error'
        })
    }

    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();

        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();

        if (password !== confirmPassword) {
            Swal.fire({
                title:'Error',
                text:'Passwords do not match.',
                icon:'error'
            });
            return;
        }

        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*()_+}{:;'?/><,.-]{8,}$/;

        if (!passwordRegex.test(password)) {
            Swal.fire({
                title:'Error',
                text:'Password must contain at least one number, one letter, one capital letter, and be at least 8 characters long, including special characters.',
                icon:'error'
            });


            return;
        }

        $.ajax({
            type: "POST",
            url: "./utils/create_user.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if(response.status === 'success') {
                    Swal.fire({
                        title:"Success",
                        text:`Success ${response.message}`,
                        icon:'success'
                    })
                    // Optionally, redirect or update the UI
                    // window.location.href = 'path/to/dashboard.php';
                } else {
                    Swal.fire({
                        title:"Error",
                        text:`Oops! ${response.message}`,
                        icon:'error'
                    })
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", jqXHR.responseText); // Log the response text
                console.log("Error: " + textStatus + ": " + errorThrown);
            }
        });
    });

    $('#addContactForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./utils/new_contact.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if(response.status === 'success') {
                    Swal.fire({
                        title:"Success",
                        text:`Success ${response.message}`,
                        icon:'success'
                    })
                    // Optionally, redirect or update the UI
                    // window.location.href = 'path/to/dashboard.php';
                } else {
                    Swal.fire({
                        title:"Error",
                        text:`Oops! ${response.message}`,
                        icon:'error'
                    })
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", jqXHR.responseText); // Log the response text
                console.log("Error: " + textStatus + ": " + errorThrown);
            }
        });
    })

    $('span').each(function() {
        var text = $(this).text().trim();

        if (text === 'SALES LEAD') {
            $(this).addClass('sales-lead');
        } else if (text === 'SUPPORT') {
            $(this).addClass('support');
        }
    });

    $('.filter-option').on('click', function() {
        var filterType = $(this).text().trim();

        $('.filter-option').removeClass('active-filter');
        $(this).addClass('active-filter');

        $.ajax({
            type: "GET",
            url: "contact.php",
            data: { filterType: filterType },
            success: function(response) {
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error: " + textStatus + ": " + errorThrown);
            }
        });
    });
});
