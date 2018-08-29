//  Now we are making function through we are going to registrate new user
function signIn() {
    var user = {
        id: makeid(),
        first_name: document.getElementById("first").value,
        last_name: document.getElementById("last").value,
        username: document.getElementById("username").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
        image: null
    }

    // Reset error messages
    errors.innerHTML = '';
    success.innerHTML = '';
    
    // Validation rules
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    var valid = true;

    if(format.test(user.username)) {
        errors.innerHTML += '<div class="error-msg">Username can\'t contain special characters.</div>';
        valid = false;
    }

    if(format.test(user.password)) {
        errors.innerHTML += '<div class="error-msg">Password can\'t contain special characters.</div>';
        valid = false;
    }

    if(user.username.length < 5 || user.username.length > 12) {
        errors.innerHTML += '<div class="error-msg">Username must contain between 5 and 12 characters.</div>';
        valid = false;
    }

    if(user.password.length < 5 || user.password.length > 12) {
        errors.innerHTML += '<div class="error-msg">Password must contain between 5 and 12 characters.</div>';
        valid = false;
    }

    if(valid) {
        user.password = md5(user.password);
        var http = new XMLHttpRequest();
        http.open('POST', 'php/add_user.php', true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Listener for waiting backend actions
        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                // Converting JSON to JS object
                var data = JSON.parse(http.responseText);
                if(data.success != '') {
                    success.innerHTML = '<div class="success-msg">New user registered.</div>';
                }
            }
        }
        var data = JSON.stringify(user);
        http.send(data);
    }    
}

// Now we are making second function and through this function we are going to make login process
function login() {
    var user = {
        id: null,
        username: document.getElementById("usernamelog").value,
        password: document.getElementById("passwordlog").value
    }

    var error_div = document.getElementById('error');
    error_div.innerHTML = '';

    var http = new XMLHttpRequest();
    http.open('GET', 'php/get_users.php', true);
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var data = JSON.parse(http.responseText);
            data.data.forEach(function(user_data) {
                if(user_data.username == user.username && user_data.password == md5(user.password)){
                    localStorage.setItem('user_id', user_data.id);
                    user.id = user_data.id;
                }
            });
            if(user.id != null) {
                document.location.replace('home.html');
            } else {
                error_div.innerHTML = 'Wrong username and password combination.';
            }
        }
    }
    http.send(null);
}


