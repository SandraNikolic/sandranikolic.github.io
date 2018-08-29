
var url = new URL(window.location.href);
var image_id = url.searchParams.get("id");
var image_container = document.getElementById('image');
var comments_container = document.getElementById('comments');
var author_image = document.getElementById('author-image');
var author_name = document.getElementById('author-name');


function loadImageData() {    
    var http = new XMLHttpRequest();
    getUsers();
    getComments();
    http.open('GET', 'php/get_images.php', true);
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var data = JSON.parse(http.responseText);
            if(data.data != '') {
                data.data.forEach(function(image) {
                    if(image.id == image_id) {                        
                        image_container.innerHTML = '<img src="img/' + image.name + '" />';
                        user_list.forEach(function(user){
                            if(image.user_id == user.id) {
                                if(user.image == null) {
                                    author_image.innerHTML = '<a href="user.html?id=' + user.id + '"><img class="author-image" src="img/no-img.png"></a>';
                                } else {
                                    author_image.innerHTML = '<a href="user.html?id=' + user.id + '"><img class="author-image" src="img/' + user.image + '"></a>';
                                }
                                author_name.innerHTML = '<p class="author-name">' + user.name + '</p>';
                            }
                        });
                    }
                });
            }
        }
    }
    http.send(null);    
}

// Adding new comment for image
function addComment() {
    var valid = true;
    var comment_content = document.getElementById('new-comment').value;
    if(comment_content.length > 20) {
        errors.innerHTML += '<div class="error-msg">Comment must contain maximum 20 characters.</div>';
        valid = false;
    }
    if(valid) {
        var comment = {
            id: makeid(),
            comment: comment_content,
            user_id: user_id,
            image_id: image_id,
            datetime: getDateTime(),
            timestamp: getTimestamp()
        }

        // Reset error messages
        errors.innerHTML = '';
        success.innerHTML = '';

        var http = new XMLHttpRequest();
        http.open('POST', 'php/add_comment.php', true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Listener for waiting backend actions
        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                // Converting JSON to JS object
                var data = JSON.parse(http.responseText);
                if(data.success != '') {
                    success.innerHTML = '<div class="success-msg">New comment added.</div>';
                    setTimeout(refreshPage, 1000);
                }
            }
        }
        var data = JSON.stringify(comment);
        http.send(data);
    }
}

// Get comments from comments.json file
function getComments() {
    var http = new XMLHttpRequest();
    http.open('GET', 'php/get_comments.php', true);
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var data = JSON.parse(http.responseText);
            if(data.data != '') {
                data.data.forEach(function(comment) {
                    if(comment.image_id == image_id) {
                        var item = {
                            id: comment.id,
                            image_id: comment.image_id,
                            user_id: comment.user_id,
                            comment: comment.comment.replace("_", " "),
                            datetime: comment.datetime.replace("_", " "),
                            timestamp: comment.timestamp
                        }
                        comment_list.push(item);
                    }                    
                });
                comments_loaded = true;
                sortComments();
            }
        }
    }
    http.send(null);
}

// Display comments
function displayComments() {
    comments_container.innerHTML = '';
    comment_list.forEach(function(comment){
        user_list.forEach(function(user){
            if(comment.user_id == user.id) {
                comments_container.innerHTML += '<p class="coment-author">';
                if(user.image == null) {                    
                    comments_container.innerHTML += '<a href="users.html?id=' + user.id + '"><img class="comment-author-image" src="img/no-img.png" /></a>';
                } else {
                    comments_container.innerHTML += '<a href="users.html?id=' + user.id + '"><img class="comment-author-image" src="img/' + user.image + '" /></a>';
                }
                comments_container.innerHTML += '</p><p class="comment-author-name">' + user.name + '</p>';
            }
        });
        comments_container.innerHTML += '<p class="comment-content">' + comment.comment + '</p>';
        comments_container.innerHTML += '<p class="comment-datetime">' + comment.datetime + '</p>';
    });
}