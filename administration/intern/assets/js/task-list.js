(function () {
    "use strict"

    let checkAll = document.querySelector('.check-all');
    checkAll.addEventListener('click', checkAllFn)

    function checkAllFn() {
        if (checkAll.checked) {
            document.querySelectorAll('.task-checkbox input').forEach(function (e) {
                e.closest('.task-list').classList.add('selected');
                e.checked = true;
            });
        }
        else {
            document.querySelectorAll('.task-checkbox input').forEach(function (e) {
                e.closest('.task-list').classList.remove('selected');
                e.checked = false;
            });
        }
    }

    //delete Btn
    let taskbtn = document.querySelectorAll(".task-delete-btn");

    taskbtn.forEach((eleBtn) => {
        eleBtn.onclick = () => {
            let task = eleBtn.closest(".task-list")
            task.remove();
        }
    })

    /* multi select with remove button */
    const multipleCancelButton = new Choices(
        '#choices-multiple-remove-button1',
        {
            allowHTML: true,
            removeItemButton: true,
        }
    );

    /* AssignedDate Picker */
    flatpickr("#assignedDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    /* DueDate Picker */
    flatpickr("#dueDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    
})();
"use strict"

var options = {
    series: [{
    data: [400, 540, 580, 690 ]
  }],
    chart: {
    type: 'bar',
    height: 200,
    toolbar: {
        show: false,
    }
  },
  colors: ['#00ffbe', '#ebf748', '#48f768', '#00e3d2'],
  plotOptions: {
    bar: {
      borderRadius: 1,
      horizontal: true,
      barHeight: '40%',
      dataLabels: {
        position: 'top'
      },
      distributed: true,
    }
  },
  dataLabels: {
    enabled: false
  },
  xaxis: {
    categories: ['New', 'Pending', 'Completed', 'Ongoing'],
  },
  };

  var chart = new ApexCharts(document.querySelector("#task-list-stats"), options);
  chart.render();