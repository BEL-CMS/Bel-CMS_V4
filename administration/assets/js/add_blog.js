// ---------------------------------------- // Add Blog js Start // ---------------------------------------- // 

// --- editor js --- //
const editor = document.querySelector('#editor');

if (editor) {
    try {
        $(editor).trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'],
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
        });

        console.log('Trumbowyg editor initialized successfully');
    } catch (error) {
        console.error('Error initializing Trumbowyg editor:', error);
    }
} else {
    console.warn('Editor element #editor not found');
}


// ----------------------

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

// ---------------------------------------- // Add Blog js End // ---------------------------------------- // 