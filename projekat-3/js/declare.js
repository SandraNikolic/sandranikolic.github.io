// Declaring variables
var errors = document.getElementById('errors');
var success = document.getElementById('success');
var user_id = localStorage.getItem('user_id');
var status_div = document.getElementById('feed-list');
var feed_list = [];
var user_list = [];
var comment_list = [];
var status_loaded = false;
var image_loaded = false;
var users_loaded = false;
var comments_loaded = false;