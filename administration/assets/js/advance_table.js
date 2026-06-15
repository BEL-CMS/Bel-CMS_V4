// >>-------------  Advance Table js  start ------------- <<

let currentRow;

// >>--------Edit button---------<<
document.addEventListener("click", e => {
    if (!e.target.closest(".editBtn")) return;

    currentRow = e.target.closest("tr");

    document.querySelector("#editName").value        = currentRow.cells[1].innerText.trim();
    document.querySelector("#editProductId").value   = currentRow.cells[2].innerText.trim();
    document.querySelector("#editProductName").value = currentRow.cells[3].innerText.trim();
    document.querySelector("#editDuration").value    = currentRow.cells[4].innerText.trim();
    document.querySelector("#editAmount").value      = currentRow.cells[5].innerText.trim();
    document.querySelector("#editPhone").value       = currentRow.cells[7].innerText.trim();
});

// >>------------Save changes-------------<<
document.querySelector("#saveChangesBtn").addEventListener("click", () => {

    currentRow.cells[1].querySelector("p").innerText = editName.value;
    currentRow.cells[2].innerText = editProductId.value;
    currentRow.cells[3].innerText = editProductName.value;
    currentRow.cells[4].innerText = editDuration.value;
    currentRow.cells[5].innerText = editAmount.value;
    currentRow.cells[7].innerText = editPhone.value;

    let s = currentRow.cells[6];
    let newStatus = editStatus.value;

    const statusIcons = {
        hourglass: `<span class="badge text-light-info f-s-20"><i class="ti ti-hourglass"></i></span>`,
        check:     `<span class="badge text-light-success f-s-20"><i class="ti ti-check"></i></span>`,
        alert:     `<span class="badge text-light-danger f-s-20"><i class="ti ti-alert-triangle"></i></span>`
    };

    s.innerHTML = statusIcons[newStatus] || "";
});


// >>-------- Delete with confirmation (SweetAlert)-------------<<
document.addEventListener("click", e => {
    if (e.target.closest(".deleteBtn")) {
        e.preventDefault();
        const row = e.target.closest("tr");

        Swal.fire({
            title: "Are you sure?",
            text: "This row will be permanently deleted!",
            icon: "warning",
            showCancelButton: true,
            dangerMode: true
        }).then(res => {
            if (res.isConfirmed) {
                row.remove();
                Swal.fire("Deleted!", "The row has been removed.", "success");
            }
        });
    }
});

// >>-------------  Table Charts js ------------- <<

const options = {
    series: [{
        name: 'series1',
        data: [50, 45, 60, 46, 58, 45]
    }],
    chart: {
        width: 150,
        height: 55,
        type: 'line',
        offsetX: 0,
        offsetY: 0,
    },
    dataLabels: {
        enabled: false
    },
    colors: ['rgba(255, 0, 0)'],
    stroke: {
        width: 2,
    },
    xaxis: {
        show: true,
        labels: {
            show: false
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        }
    },
    yaxis: {
        show: false,
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: false
            }
        },
    },
    tooltip: {
        enabled: false,
    }
};

const seriresLists = {
    0:[50, 45, 60, 46, 58, 45],
    1:[45, 10, 20, 66, 18, 15],
    2:[20, 45, 38, 26, 18, 35],
    3:[50, 45, 60, 46, 58, 45],
    4:[50, 45, 60, 46, 58, 45]
}

const colorLists = {
    0:"rgba(var(--primary))",
    1:"rgba(var(--secondary))",
    2:"rgba(var(--success))",
    3:"rgba(var(--danger))",
    4:"rgba(var(--primary))"
}

document.querySelectorAll(".volumeChart").forEach((ele,index) => {
    options.series = [{
        name: 'series1',
        data: seriresLists[index]
    }]
    options.colors = [colorLists[index]];
    const chart = new ApexCharts(ele, options);
    chart.render();
})

// >>-------------  Drag & Drop Table js ------------- <<

document.addEventListener("click", function(e){
    if(e.target.closest(".buyBtn")){
        const row = e.target.closest("tr");
        const clone = row.cloneNode(true);
        row.parentNode.appendChild(clone);
    }
});

// >>------------------- SELL → remove the clicked row-----------<<
document.addEventListener("click", function(e){
    if(e.target.closest(".sellBtn")){
        const row = e.target.closest("tr");
        row.remove();
    }
});


// >>------------------- drag and drop rows-------------<<
const tableBody = document.getElementById("sourceTable");
let draggedRow;

tableBody.addEventListener("dragstart", (e) => {
    draggedRow = e.target;
    e.dataTransfer.effectAllowed = "move";
    draggedRow.classList.add("dragging-row"); // add background while dragging
});

tableBody.addEventListener("dragend", (e) => {
    draggedRow.classList.remove("dragging-row"); // remove when dropped
    draggedRow = null;
});

tableBody.addEventListener("dragover", (e) => {
    e.preventDefault();
    const targetRow = e.target.closest("tr");
    if (targetRow && targetRow !== draggedRow) {
        const rect = targetRow.getBoundingClientRect();
        const next = (e.clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
        tableBody.insertBefore(draggedRow, next ? targetRow.nextSibling : targetRow);
    }
});

// >>-------------  Advance Table js End ------------- <<
