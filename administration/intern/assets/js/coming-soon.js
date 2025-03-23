
function updateTimer() {
    future = Date.parse("Dec 19, 2024 11:30:00");
    now = new Date();
    diff = future - now;

    days = Math.floor(diff / (1000 * 60 * 60 * 24));
    hours = Math.floor(diff / (1000 * 60 * 60));
    mins = Math.floor(diff / (1000 * 60));
    secs = Math.floor(diff / 1000);

    d = days;
    h = hours - days * 24;
    m = mins - hours * 60;
    s = secs - mins * 60;

    document.getElementById("timer")
        .innerHTML =
        '<div><div class=""><h4 class="avatar d-block timer-bg avatar-xxl avatar-rounded mt-2">' + d + '</h4><p class="mb-0 fs-12">DAYS</p></div></div>' +
        '<div><div class=""><h4 class="avatar d-block timer-bg avatar-xxl avatar-rounded mt-2">' + h + '</h4><p class="mb-0 fs-12">HOURS</p></div></div>' +
        '<div><div class=""><h4 class="avatar d-block timer-bg avatar-xxl avatar-rounded mt-2">' + m + '</h4><p class="mb-0 fs-12">MINUTES</p></div></div>' +
        '<div><div class=""><h4 class="avatar d-block timer-bg avatar-xxl avatar-rounded mt-2">' + s + '</h4><p class="mb-0 fs-12">SECONDS</p></div></div>'
}
setInterval('updateTimer()', 1000);