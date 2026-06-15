
// // >>---------------------------------------- //Profile js Start// ---------------------------------------- <<
//  >>--------image js----------<<
GLightbox({
    touchNavigation: true,
    loop: true,
    width: "90vw",
    height: "90vh",
});

// >>------------ STORY DATA OBJECT-------------<<
const stories = {
    1: { story: "../assets/images/profile-app/11.jpg", text: "Enjoying the sunshine today 🌞" },
    2: { story: "../assets/images/profile-app/12.jpg", text: "Coffee time ☕" },
    3: { story: "../assets/images/profile-app/13.jpg", text: "Working on new ideas 💡" },
    4: { story: "../assets/images/profile-app/14.jpg", text: "Weekend vibes ✨" },
    5: { story: "../assets/images/profile-app/15.jpg", text: "Late night coding 💻" },
    6: { story: "../assets/images/profile-app/06.jpg", text: "Morning walk 🌿" },
    7: { story: "../assets/images/profile-app/07.jpg", text: "Gym time 💪" },
    8: { story: "../assets/images/profile-app/08.jpg", text: "Reading a new book 📚" },
    9: { story: "../assets/images/profile-app/09.jpg", text: "Travel memories ✈️" },
    10:{ story: "../assets/images/profile-app/10.jpg", text: "Creative mood 🎨" }
};



// >>-----------INIT BOOTSTRAP MODAL---------<<
document.addEventListener('DOMContentLoaded', () => {

    const modalEl = document.getElementById('storyModal');
    const storyModal = new bootstrap.Modal(modalEl);

    const imageEl = document.getElementById('storyImage');
    const textEl = document.getElementById('storyText');
    const titleEl = document.getElementById('storyTitle');

    document.querySelectorAll('.story-item').forEach(item => {
        item.addEventListener('click', () => {

            const id = item.dataset.storyId;
            if (!id || !stories[id]) return;

            const story = stories[id];

            titleEl.textContent = item.querySelector('.story-name')?.textContent || '';
            modalEl.querySelector('.story-modal-bg').style.backgroundImage =
                `url(${story.story})`;

            textEl.textContent = story.text;

            storyModal.show();
        });
    });

});


// >>----------- image uploader------------<<
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

// >>----------  Friends Request remove ---------<<
document.addEventListener("click", function (e) {
    if (e.target.closest(".btn-request-delete")) {
        const cardCol = e.target.closest(".btn-request-box");
        if (cardCol) {
            cardCol.remove();
        }
    }
});

// >>------------------ File Upload DOM Trigger -------------------<<

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

//  >> ---------------------------------------- //Profile js End// ---------------------------------------- <<
