window.onload = function() {
    var posts = document.getElementsByClassName("post-link");
    for (var i=0; i<posts.length; i++) {
        var postDate = new Date(posts[i].getElementsByClassName("date-posted")[0].getAttribute("data-date"));
        var currentDate = new Date();
        var duration = currentDate - postDate;
        var hoursAgo = Math.floor(duration / (1000 * 60 * 60));
        var timeAgoText = "";

        if (hoursAgo >= 24) {
            var daysAgo = Math.floor(hoursAgo / 24); 
            timeAgoText = daysAgo + " day" + (daysAgo > 1 ? "s" : "") + " ago";
        } else {
            timeAgoText = hoursAgo + " hours ago";
        }

        posts[i].getElementsByClassName("date-posted")[0].innerText = timeAgoText;
    }
}
