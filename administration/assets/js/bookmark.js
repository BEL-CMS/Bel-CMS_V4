// >>---------------------------------------- //Bookmark js Start// ---------------------------------------- <<
// >>------------------add new card js-------------- << //
function bookmarkContent() {
    const files = document.querySelector(".file_upload")?.files;
    const uid = Date.now();

    return `
        <div class="col-sm-6 col-lg-4 col-xxl-3" data-id="${uid}">
            <div class="card book-mark-card draggable-card">
                <div class="card-body">
                    <div class="draggable-card-img">
                        <img src="${files && files[0] ? URL.createObjectURL(files[0]) : ''}"
                             alt="image" class="img-fluid">

                        <div class="draggable-card-icon">

                            <!-- Favourite -->
                            <span class="bg-white h-35 w-35 mb-2 d-flex-center b-r-50 me-3">
                                <i class="ti ti-heart f-s-18 text-danger heart-icon"></i>
                            </span>

                            <!------------ Share ------------>
                            <span class="bg-white h-35 w-35 d-flex-center b-r-50 me-3 shareBtn mb-2">
                                <a href="#" data-bs-toggle="dropdown">
                                    <i class="ti ti-share f-s-18 text-primary"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end ms-3">
                                    <li class="d-flex justify-content-around px-2 py-1">
                                        <i class="ti ti-brand-whatsapp f-s-20 text-success"></i>
                                        <i class="ti ti-brand-instagram f-s-20 text-danger"></i>
                                        <i class="ti ti-brand-facebook f-s-20 text-primary"></i>
                                        <i class="ti ti-brand-messenger f-s-20 text-info"></i>
                                    </li>
                                </ul>
                            </span>

                            <!------------ Important ---------->
                            <span class="bg-white h-35 w-35 mb-2 d-flex-center b-r-50">
                                <i class="ti ti-star f-s-18 text-warning star-icon"></i>
                            </span>
                        </div>

                        <div class="dropdown action-icon">
                            <span data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical text-white"></i>
                            </span>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item delete-btn" href="#">
                                        <i class="ti ti-trash text-danger"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="draggable-card-content pt-4">
                        <h5 class="fs-6 f-w-500 txt-ellipsis-1">${$('#title').val()}</h5>
                        <p class="f-s-16 text-secondary">${$('#webUrl').val()}</p>
                    </div>
                </div>
            </div>
        </div>
    `;
}


// <<---------on click icon fill js -------->>//
function getActionsFeture() {
    try {

        // DELETE
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.onclick = function (e) {
                e.preventDefault();
                const card = this.closest(".col-xxl-3");
                document.querySelector('#delete-tab-pane .row')
                    .appendChild(card.cloneNode(true));
                card.remove();
            };
        });

        // FAVOURITE
        document.querySelectorAll('.heart-icon').forEach(icon => {
            icon.onclick = function () {
                toggleTablerIcon(this, 'ti-heart', 'ti-heart-filled',
                    '#favourite-tab-pane .row');
            };
        });

        // IMPORTANT
        document.querySelectorAll('.star-icon').forEach(icon => {
            icon.onclick = function () {
                toggleTablerIcon(this, 'ti-star', 'ti-star-filled',
                    '#important-tab-pane .row');
            };
        });

    } catch (error) {
        console.error('Error in getActionsFeture:', error);
    }
}

function toggleTablerIcon(icon, outline, filled, targetPane) {
    const card = icon.closest('.col-xxl-3');
    const id = card.dataset.id;

    if (icon.classList.contains(filled)) {
        icon.classList.remove(filled);
        icon.classList.add(outline);

        document.querySelectorAll(`${targetPane} .col-xxl-3`)
            .forEach(el => el.dataset.id === id && el.remove());

    } else {
        icon.classList.remove(outline);
        icon.classList.add(filled);

        const clone = card.cloneNode(true);
        document.querySelector(targetPane).appendChild(clone);
    }
}


document.querySelector('#add-bookmark').onclick = function () {
    const row = document.querySelector("#bookmark-tab-pane .row");
    row.insertAdjacentHTML('afterbegin', bookmarkContent());
    $("#bookmarkAddModal").modal("hide");
    getActionsFeture();
};

// Initializing actions
getActionsFeture();
// >> ---------------------------------------- //Bookmark js End// ---------------------------------------- <<
