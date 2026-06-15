// >>---------------------------------------- //Add Product js Start// ---------------------------------------- <<
$(document).ready(function() {
    const editorElement = $('#description-editor');
    if (editorElement.length) {
        editorElement.trumbowyg({
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
    } else {
        console.warn('#description-editor not found. Please check the element.');
    }
});
// >> ---------------------------------------- //Add Product js End// ---------------------------------------- <<
