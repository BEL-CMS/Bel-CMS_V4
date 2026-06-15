
// >>---------------------------------------- //File upload  js Start// ---------------------------------------- <<
FilePond.registerPlugin(FilePondPluginImagePreview);

// >>------------------- File Upload DOM Trigger -------------------<<
document.querySelectorAll('.basic-uploader, .basic-uploader1')
    .forEach(input => {
        FilePond.create(input, {
            allowMultiple: false
        });
});

// >>------------------- File Upload DOM Trigger -------------------<<
document
    .querySelectorAll('.multiple-uploader, .multiple-uploader1')
    .forEach(input => {
        FilePond.create(input, {
            allowMultiple: true,
            allowReorder: true
        });
    });

// >>------------------- File Upload DOM Trigger -------------------<<
FilePond.create(document.querySelector('.circle-uploader'), {
    allowMultiple: false,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'center bottom',
    styleButtonProcessItemPosition: 'right bottom'
});

// >>------------------- File Upload DOM Trigger -------------------<<

try {
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");

    if (customBtn && realFileBtn && customTxt) {
        const handleCustomClick = () => realFileBtn.click();
        const handleFileChange = () => {
            customTxt.innerHTML = realFileBtn.value
                ? realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)?.[1] || "No file chosen"
                : "No file chosen, yet.";
        };

        customBtn.addEventListener("click", handleCustomClick);

        realFileBtn.addEventListener("change", handleFileChange);
    }
} catch (err) {
    console.error("Custom file input setup failed:", err);
}


// >>------------------- File Upload DOM Trigger -------------------<<

const pond = FilePond.create(document.querySelector('#fileUploader'), {
    allowMultiple: true,
    allowReorder: true
});

const historyBox = document.getElementById('uploadHistory');
const colors = ['primary', 'success', 'warning', 'danger', 'secondary'];
let index = 0;

function addHistoryItem(fileItem) {
    if (!fileItem || !fileItem.id) return;

    const color = colors[index++ % colors.length];
    const item = document.createElement('div');

    item.className = 'history-item';
    item.dataset.id = fileItem.id;

    item.innerHTML = `
        <div class="d-flex justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center gap-2">
                <div class="file-img-box f-s-30 d-flex-center text-${color}">
                    <i class="ti ti-file"></i>
                </div>
                <p class="mb-0 fw-medium">${fileItem.filename}</p>
            </div>
            <i class="ti ti-trash f-s-18 text-danger cursor-pointer"></i>
        </div>
    `;

    item.querySelector('.ti-trash').addEventListener('click', () => {
        pond.removeFile(fileItem.id);
    });

    historyBox.appendChild(item);
}

function removeHistoryItem(fileItem) {
    if (!fileItem || !fileItem.id) return;

    const el = historyBox.querySelector(`[data-id="${fileItem.id}"]`);
    if (el) el.remove();
}


pond.on('addfile', (error, fileItem) => {
    if (!error && fileItem) addHistoryItem(fileItem);
});

pond.on('removefile', (error, fileItem) => {
    if (!error && fileItem) removeHistoryItem(fileItem);
});

document.querySelectorAll('#uploadHistory [data-static="true"] .ti-trash')
    .forEach(trash => {
        trash.addEventListener('click', e => {
            e.target.closest('.history-item').remove();
        });
    });


// >>------------------- File Upload DOM Trigger -------------------<<

function initImageUploader(uploaderSelector, listSelector, cancelSelector) {
    const uploader = document.querySelector(uploaderSelector);
    const uploadList = document.querySelector(listSelector);
    const cancelAllBtn = document.querySelector(cancelSelector);

    if (!uploader || !uploadList) return;

    let uploads = [];
    const colors = ['primary', 'success', 'warning', 'danger', 'secondary'];
    let colorIndex = 0;

    uploader.addEventListener('change', () => {
        [...uploader.files].forEach(file => {
            if (!file.type.startsWith('image/')) return;
            createUploadItem(file);
        });
        uploader.value = '';
    });

    function createUploadItem(file) {
        const id = Date.now() + Math.random();
        const sizeMB = (file.size / 1024 / 1024).toFixed(1);
        const color = colors[colorIndex++ % colors.length];

        const item = document.createElement('div');
        item.className = 'd-flex justify-content-between align-items-center p-3 border-bottom';
        item.dataset.id = id;

        item.innerHTML = `
            <div class="d-flex align-items-center gap-2">
                <div class="file-img-box f-s-30 d-flex-center p-2 bg-${color} b-r-12 text-white">
                    <i class="ti ti-photo"></i>
                </div>
                <div>
                    <p class="mb-0 fw-medium">
                        ${file.name}
                        <span class="text-muted f-s-12">(${sizeMB} MB)</span>
                    </p>
                    <span class="status text-primary">
                        <span class="percent">0%</span> uploading
                    </span>
                </div>
            </div>
            <i class="ti ti-x f-s-18 text-danger cursor-pointer"></i>
        `;

        uploadList.appendChild(item);

        const percentEl = item.querySelector('.percent');
        const statusEl = item.querySelector('.status');
        const removeBtn = item.querySelector('.ti-x');

        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.floor(Math.random() * 10) + 5;

            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                statusEl.innerHTML = `<i class="ti ti-check"></i> Done`;
                statusEl.className = 'status text-success';
            }

            percentEl.textContent = progress + '%';
        }, 500);

        uploads.push({ id, interval });

        removeBtn.onclick = () => {
            clearInterval(interval);
            item.remove();
        };
    }

    if (cancelAllBtn) {
        cancelAllBtn.onclick = () => {
            uploads.forEach(u => clearInterval(u.interval));
            uploads = [];
            uploadList.innerHTML = '';
        };
    }
}
initImageUploader('#imageUploader', '#uploadList', '#cancelAll');

// >>---------------  image uploader ----------------<<
function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = $('#imgPreview');
            imgPreview.css('background-image', `url(${e.target.result})`);
            imgPreview.hide().fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('#imageUpload').on('change', function() {
    readURL(this);
});
// >> ---------------------------------------- //File upload  js End// ---------------------------------------- <<
