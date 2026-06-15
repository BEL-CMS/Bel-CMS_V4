
// >>---------------------------------------- //Progress js Start// ---------------------------------------- <<
document.addEventListener("DOMContentLoaded", function () {

    function animateProgress(barId, tipId, value) {
        let bar = document.getElementById(barId);
        let tip = document.getElementById(tipId);

        if (!bar || !tip) return; // safety check

        let start = 0;
        let interval = setInterval(() => {
            if (start >= value) {
                clearInterval(interval);
            }

            bar.style.width = start + "%";
            tip.style.left = start + "%";
            tip.innerText = start + "%";

            start++;
        }, 20);
    }

    animateProgress("bar1", "tip1", 12);
    animateProgress("bar2", "tip2", 25);
    animateProgress("bar3", "tip3", 38);
    animateProgress("bar4", "tip4", 50);
    animateProgress("bar5", "tip5", 63);
    animateProgress("bar6", "tip6", 75);
    animateProgress("bar7", "tip7", 83);
    animateProgress("bar8", "tip8", 95);

});

// >> ---------------------------------------- //Progress js End// ---------------------------------------- <<
