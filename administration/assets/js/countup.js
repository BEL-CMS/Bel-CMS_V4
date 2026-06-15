// >>---------------------------------------- //Count-up js Start// ---------------------------------------- <<

 document.querySelectorAll('.counter').forEach(function(element) {
    var countTo = parseInt(element.getAttribute('data-count'));
    var currentCount = parseInt(element.textContent);
    var duration = 8000;
    var interval = 16;

    var iterations = duration / interval;
    var stepValue = (countTo - currentCount) / iterations;

    var intervalId = setInterval(function() {
        currentCount += stepValue;
        element.textContent = + Math.floor(currentCount);
        iterations--;
        if (iterations <= 0) {
            clearInterval(intervalId);
            element.textContent = '' + countTo;
        }
    }, interval);
});

 function animateCounters() {
     document.querySelectorAll('.update-data').forEach(function (element) {
         const currentValue = parseInt(element.getAttribute('data-count'), 10);
         const targetValue = currentValue + 1;

         let currentCount = 0;
         const duration = 800; // animation speed
         const interval = 16;
         const steps = duration / interval;
         const increment = targetValue / steps;

         element.textContent = '0';

         const counterInterval = setInterval(() => {
             currentCount += increment;

             if (currentCount >= targetValue) {
                 clearInterval(counterInterval);
                 element.textContent = targetValue;
                 element.setAttribute('data-count', targetValue);
             } else {
                 element.textContent = Math.floor(currentCount);
             }
         }, interval);
     });
 }

document.getElementById('startCounter').addEventListener('click', animateCounters);

// >> ---------------------------------------- //Count-up js End// ---------------------------------------- <<
