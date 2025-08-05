
    // for publish date picker
    flatpickr("#publish-date", {});

    // for publish time
    flatpickr("#publish-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });

    // for blog tags
    const multipleCancelButton1 = new Choices(
        '#blog-tags',
        {
            allowHTML: true,
            removeItemButton: true,
        }
    );
    
    /* quill snow editor */
    var toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'font': [] }],
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],

        ['image', 'video'],
        ['clean']                                         // remove formatting button
    ];
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });