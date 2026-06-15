//  >>--------------------------ready to use  js start ---------------------------------<<

const imageInput = document.getElementById('studentImage');
const previewBox = document.getElementById('studentImgPreview');

// Default image
const defaultImage = '../assets/images/profile-app/06.jpg';

// Set default on load
previewBox.style.backgroundImage = `url(${defaultImage})`;
previewBox.style.backgroundSize = 'cover';
previewBox.style.backgroundPosition = 'center';
previewBox.style.backgroundRepeat = 'no-repeat';

imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) {
        previewBox.style.backgroundImage = `url(${defaultImage})`;
        return;
    }

    if (!file.type.startsWith('image/')) {
        alert('Please upload a valid image file');
        this.value = '';
        previewBox.style.backgroundImage = `url(${defaultImage})`;
        return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
        previewBox.style.backgroundImage = `url(${e.target.result})`;
    };

    reader.readAsDataURL(file);
});
// >>----------------------------ready to use  js end --------------------------------<<
