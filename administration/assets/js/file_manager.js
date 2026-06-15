// >>---------------------------------------- //File manager js Start// ---------------------------------------- <<

function initFileManagerActions() {
    let selectedCard = null;

    // >>----------------RENAME--------------------<<
    document.addEventListener("click", function (e) {
        const renameBtn = e.target.closest("a.edit-folder-list");
        if (!renameBtn) return;

        e.preventDefault();

        const cardCol = renameBtn.closest(".col-sm-6");
        if (!cardCol) return;

        selectedCard = cardCol.querySelector(".quick-access-card");
        if (!selectedCard) return;

        const title = selectedCard.querySelector(".file-name");
        if (!title) return;

        document.getElementById("renameInput").value = title.innerText;

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById("renameModal")
        ).show();
    });

    // >>---------------------- SAVE RENAME------------------<<
    document.getElementById("saveRename")?.addEventListener("click", function () {
        if (!selectedCard) return;

        const newName = document.getElementById("renameInput").value.trim();
        if (newName) {
            selectedCard.querySelector("p.f-w-600").innerText = newName;
        }

        bootstrap.Modal.getInstance(
            document.getElementById("renameModal")
        )?.hide();

        selectedCard = null;
    });

    // >>----------------------- DELETE-----------------<<
    document.addEventListener("click", function (e) {
        const deleteBtn = e.target.closest(".delete-access-btn");
        if (!deleteBtn) return;

        e.preventDefault();

        const cardCol = deleteBtn.closest(".col-sm-6");
        if (!cardCol) return;

        selectedCard = cardCol;

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById("deleteModal")
        ).show();
    });

    // >>-----------------CONFIRM DELETE------------------<<
    document.getElementById("confirmDelete")?.addEventListener("click", function () {
        if (!selectedCard) return;

        selectedCard.remove();

        bootstrap.Modal.getInstance(
            document.getElementById("deleteModal")
        )?.hide();

        selectedCard = null;
    });

}

initFileManagerActions();


// >>-------------------- folders card js-----------------<<

function initFileManager() {
    let activeCard = null;

    const starredRow = document.querySelector('#starred .row');
    const recycleRow = document.querySelector('#recycleBin .card');

    // STAR / UNSTAR
    document.addEventListener('click', function (e) {
        const starIcon = e.target.closest('.fav-icon');
        if (!starIcon) return;

        const card = starIcon.closest('.col-sm-6');

        starIcon.classList.toggle('text-warning');

        if (starIcon.classList.contains('text-warning')) {
            starredRow.appendChild(card.cloneNode(true));
        } else {
            [...starredRow.children].forEach(c => {
                if (c.innerText === card.innerText) c.remove();
            });
        }
    });

    // >>---------------- RENAME------------------<<
    document.addEventListener('click', function (e) {
        const fmRenameBtn = e.target.closest('.dropdown-item');
        if (!fmRenameBtn || fmRenameBtn.innerText.trim() !== 'Rename') return;

        e.preventDefault();

        // Always get the column first
        const col = fmRenameBtn.closest('.col-sm-6');
        if (!col) return;

        activeCard = col.querySelector('.folder-cards');
        if (!activeCard) return;

        const titleEl = activeCard.querySelector('.file-image p');
        if (!titleEl) return;

        document.getElementById('fmRenameInput').value = titleEl.innerText;

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById('fmRenameModal')
        ).show();
    });


    document.getElementById('fmSaveRename').onclick = function () {
        if (!activeCard) return;

        const newName = document.getElementById('fmRenameInput').value.trim();
        if (newName) {
            activeCard.querySelector('.file-image p').innerText = newName;
        }

        bootstrap.Modal.getInstance(
            document.getElementById('fmRenameModal')
        ).hide();
    };


    //>>--------------- DELETE → RECYCLE BIN----------------<<
    document.addEventListener('click', function (e) {
        const fmDeleteBtn = e.target.closest('.delete-folder-btn');
        if (!fmDeleteBtn || !fmDeleteBtn.innerText.includes('Delete')) return;

        e.preventDefault();
        activeCard = fmDeleteBtn.closest('.col-sm-6');

        bootstrap.Modal.getOrCreateInstance(
            document.getElementById('fmDeleteModal')
        ).show();
    });

    document.getElementById('fmConfirmDelete').onclick = function () {
        if (!activeCard) return;

        recycleRow.appendChild(activeCard.cloneNode(true));
        activeCard.remove();

        bootstrap.Modal.getInstance(
            document.getElementById('fmDeleteModal')
        ).hide();
    };

    // ADD NEW FOLDER
    document.getElementById('addFolderBtn')?.addEventListener('click', function () {
        const name = document.getElementById('newFolderName').value.trim();
        if (!name) return;

        const html = `
        <div class="col-sm-6 col-xl-4 col-xxl-3 mb-3">
            <div class="card folder-cards shadow-none">
                <div class="card-body">
                    <div class="starred-div favBtn">
                        <i class="ti ti-star f-s-18 fav-icon"></i>
                    </div>
                    <div class="dropdown folder-dropdown">
                        <a data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-secondary">Open</a></li>
                            <li><a class="dropdown-item text-secondary">Rename</a></li>
                            <li><a class="dropdown-item text-danger">Delete</a></li>
                        </ul>
                    </div>
                    <div class="file-image text-center">
                        <img src="../assets/images/icons/file-manager-icon/folder.png" class="img-fluid">
                        <p class="mb-0 f-s-16 txt-ellipsis-1">${name}</p>
                    </div>
                    <p class="text-secondary text-center mt-2 mb-0">0 KB</p>
                </div>
            </div>
        </div>`;

        document.querySelector('.documents-section .row')
            .insertAdjacentHTML('afterbegin', html);

        document.getElementById('newFolderName').value = '';
        bootstrap.Modal.getInstance(
            document.getElementById('addFolderModal')
        )?.hide();
    });
}

initFileManager();

// >>------storage item chart js-------<<


document.addEventListener("DOMContentLoaded", function () {

    const storageEl = document.querySelector("#storageChart");
    if (!storageEl) {
        console.warn("storageChart not found");
        return;
    }

    const storageOptions = {
        series: [
            { name: "Documents", data: [12, 10, 25, 8, 20] },
            { name: "Sound", data: [8, 15, 10, 18, 12] },
            { name: "Videos", data: [15, 20, 8, 14, 10] },
            { name: "Photo", data: [10, 30, 5, 12, 8] }
        ],
        chart: {
            type: 'bar',
            height: 280,
            stacked: true,
            toolbar: { show: false },
            fontFamily: "Lexend Deca , sans-serif",
        },
        plotOptions: {
            bar: {
                columnWidth: '25%',
                borderRadius: 6,
                borderRadiusApplication: 'end'
            }
        },
        colors: ['rgba(var(--primary),1)', 'rgba(var(--success),1)', 'rgba(var(--warning),1)', 'rgba(var(--danger),1)'],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        },
        yaxis: {
            min: 0,
            max: 100,
            tickAmount: 5,
            labels: {
                formatter: val => `${val}GB`
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr','May']
        },

        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            markers: {
                width: 10,
                height: 10,
                radius: 50
            }
        },
        grid: {
            strokeDashArray: 4
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            y: {
                formatter: val => `${val} GB`
            }
        }
    };

    const storageChart = new ApexCharts(storageEl, storageOptions);
    storageChart.render();

});


// >>-----------------------//  recent table  js---------------------<<
-
document.addEventListener("DOMContentLoaded", function () {
    const rowsPerPage = 6;
    const table = document.getElementById("recentFilesTable");
    const rows = table.querySelectorAll("tbody tr");
    const pagination = document.querySelector(".pagination");

    let currentPage = 1;
    const totalPages = Math.ceil(rows.length / rowsPerPage);

    function showPage(page) {
        currentPage = page;

        rows.forEach((row, index) => {
            row.style.display =
                index >= (page - 1) * rowsPerPage &&
                index < page * rowsPerPage
                    ? ""
                    : "none";
        });

        updatePagination();
    }

    function updatePagination() {
        const pageItems = pagination.querySelectorAll(".page-item");

        pageItems.forEach(item => item.classList.remove("active", "disabled"));

        // Previous
        if (currentPage === 1) {
            pageItems[0].classList.add("disabled");
        }

        // Active page
        pageItems[currentPage].classList.add("active");

        // Next
        if (currentPage === totalPages) {
            pageItems[pageItems.length - 1].classList.add("disabled");
        }
    }

    pagination.addEventListener("click", function (e) {
        e.preventDefault();
        const target = e.target;

        if (!target.classList.contains("page-link")) return;

        if (target.textContent === "Previous" && currentPage > 1) {
            showPage(currentPage - 1);
        } else if (target.textContent === "Next" && currentPage < totalPages) {
            showPage(currentPage + 1);
        } else if (!isNaN(target.textContent)) {
            showPage(parseInt(target.textContent));
        }
    });

    // INIT
    showPage(1);
});
//  >>---------------------------------------- //File manager js End// ---------------------------------------- <<
