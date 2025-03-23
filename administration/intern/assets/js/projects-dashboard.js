/* Project Overview */
var options = {
    chart: {
        height: 358,
        toolbar: {
            show: false
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 5,
            left: 0,
            blur: 3,
            color: ["rgba(255,255,255,0)", 'var(--primary02)', "var(--primary005)"],
            opacity: 0.5
        },
    },
    plotOptions: {
        bar: {
            columnWidth: "40%",
        },
    },
    grid: {
        show: true,
        borderColor: 'rgba(119, 119, 142, 0.1)',
        strokeDashArray: 4,
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [0, 2, 2],
        curve: "smooth",
    },
    legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'center',
        fontWeight: 600,
        fontSize: '11px',
        tooltipHoverFormatter: function (val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
        },
        labels: {
            colors: '#74767c',
        },
        markers: {
            width: 8,
            height: 8,
            strokeWidth: 0,
            radius: 12,
            offsetX: 0,
            offsetY: 0
        },
    },
    series: [{
        name: "Active Projects",
        data: [66, 85, 50, 105, 65, 74, 70, 105, 100, 125, 85, 110, 85, 58, 112],
        type: 'bar',
    }, {
        name: 'Completed Projects',
        data: [65, 20, 40, 55, 80, 90, 59, 86, 120, 165, 115, 120, 50, 70, 85],
        type: 'line',
    }, {
        name: "Project Revenue",
        data: [20, 65, 85, 38, 55, 25, 25, 165, 75, 64, 70, 75, 85, 85, 115],
        type: 'line',
    }],
    colors: ["rgba(255,255,255,0.05)", "var(--primary-color)", "var(--primary05)",],
    yaxis: {
        title: {
            style: {
                color: '#adb5be',
                fontSize: '14px',
                fontFamily: 'poppins, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        },
        labels: {
            formatter: function (y) {
                if (typeof y !== 'undefined') {
                    return y.toFixed(0) + "";
                } else {
                    return "";
                }
            },
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    xaxis: {
        type: 'day',
        categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
            '10 Jan', '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan'
        ],
        axisBorder: {
            show: true,
            color: 'rgba(119, 119, 142, 0.05)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: 'rgba(119, 119, 142, 0.05)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
        labels: {
            rotate: -90,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
}
var chart = new ApexCharts(document.querySelector("#project-overview"), options);
chart.render();
/* Project Overview */

/* Project Timeline */
//* Initialize a new Gantt object
// array of tasks
var tasks = [
    {
        start: "2024-1-03",
        end: "2024-1-11",
        name: " Project Kickoff",
        id: "Task 0",
        progress: 20,
        custom_class: "primary",
        assignee: "John Smith"
    },
    {
        start: "2024-1-05", // start date
        end: "2024-1-08", // end date
        name: "Design Phase", // title
        id: "Task 1", // unique id
        progress: 30, // progress bar in %
        dependencies: "Task 0", // Task 0 is the parent task
        custom_class: "primary", //custom class name
        assignee: "Daniel Clark"
    },
    {
        start: "2024-1-07",
        end: "2024-1-11",
        name: "Development",
        id: "Task 2",
        progress: 40,
        dependencies: "Task 1",
        custom_class: "success",
        assignee: "Sarah Miller"
    },
    {
        start: "2024-1-12",
        end: "2024-1-13",
        name: "Testing",
        id: "Task 3",
        progress: 15,
        dependencies: "Task 2",
        custom_class: "warning",
        assignee: "Emma Harris"
    },
    {
        start: "2024-1-14",
        end: "2024-1-18",
        name: "UAT",
        id: "Task 4",
        progress: 80,
        dependencies: "Task 2",
        custom_class: "primary",
        assignee: "Benjamin Carter"
    },
    {
        start: "2024-1-16",
        end: "2024-1-19",
        name: "Deployment",
        id: "Task 5",
        progress: 5,
        dependencies: "Task 4",
        custom_class: "primary",
        assignee: "Ava Jacksons"
    },
    {
        start: "2024-1-20",
        end: "2024-1-27",
        name: "Project Closure",
        id: "Task 6",
        progress: 0,
        dependencies: "",
        custom_class: "warning",
        assignee: "Ryan Brooks"
    }
];
var gantt = new Gantt("#projects-timeline", tasks);

//* Initial view mode
// default view mode is Day
// Other values are Quarter Day, Half Day, Day, Week, Month, Year
gantt.change_view_mode("Day");

// can also be written as
// var gantt = new Gantt("projects-timeline", tasks).change_view_mode("Week");

//* Change view mode on button click
// buttons variables
const QuarterDay = document.getElementById("quarter-day");
const HalfDay = document.getElementById("half-day");
const Day = document.getElementById("day");
const Week = document.getElementById("week");
const Month = document.getElementById("month");
const Year = document.getElementById("yearID");

// storing the buttons in a an array
let AllModes = [QuarterDay, HalfDay, Day, Week, Month, Year];

// function to change view mode on click
function changeViewMode(mode) {
    for (let modes of AllModes) {
        modes.classList.remove("active");
    }
    gantt.change_view_mode(mode);
}

// adding event listeners to the buttons
QuarterDay.addEventListener("click", () => {
    changeViewMode("Quarter Day");
    QuarterDay.classList.add("active");
});
HalfDay.addEventListener("click", () => {
    changeViewMode("Half Day");
    HalfDay.classList.add("active");
});
Day.addEventListener("click", () => {
    changeViewMode("Day");
    Day.classList.add("active");
});
Week.addEventListener("click", () => {
    changeViewMode("Week");
    Week.classList.add("active");
});
Month.addEventListener("click", () => {
    changeViewMode("Month");
    Month.classList.add("active");
});
Year.addEventListener("click", () => {
    changeViewMode("Year");
    Year.classList.add("active");
});

//* Adding options
var gantt = new Gantt("#projects-timeline", tasks, {
    // event listeners
    on_click: function (task) {
    },
    on_date_change: function (task, start, end) {
    },
    on_progress_change: function (task, progress) {
    },
    on_view_change: function (mode) {
    },
    // custom popup
    custom_popup_html: function (task) {
        // custom popup when th user clicks on any task.
        // the task object will contain the updated dates and progress value
        const start_date = task._start.toLocaleDateString();
        const end_date = task._end.toLocaleDateString();
        return `
            <div class="details-container">
              <h5>${task.name}</h5>
              <p>Started on ${start_date}</p>
              <p>Expected to finish by ${end_date}</p>
              <p>${task.progress}% completed!</p>
              <p>Depended on ${task.dependencies}.</p>
              <p>Assigned to ${task.assignee}.</p>
            </div>
          `;
    },
    // other options
    // header_height: 50, // height of the header of gantt chart
    // column_width: 5,
    // step: 24,
    // view_modes: ["Quarter Day", "Half Day", "Day", "Week", "Month"],
    bar_height: 20, // height of the task bar
    bar_corner_radius: 0, // border radius of bar
    arrow_curve: 0, // curve of the arrow
    padding: 30 // padding of bar in gantt chart
    // view_mode: "Day", // view mode of the  gantt chart
    // date_format: "YYYY-MM-DD", // date format of gantt chart
});
/* Project Timeline */

/* Star Active */
const stars = document.querySelectorAll('.star');
for (let i = 0; i < stars.length; i++) {
    stars[i].addEventListener('click', activeStar);
}
function activeStar(e) {
    'use strict';
    var currentStar = e.target;
    if (currentStar.classList.contains('active')) {
        currentStar.classList.remove('active');
    } else {
        currentStar.classList.add('active');
    }
}
/* Star Active */