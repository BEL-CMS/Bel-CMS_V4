
// >>---------------------------------------- //Date picker js Start// ---------------------------------------- <<
const commonConfig = {
    disableMobile: true,
    appendTo: document.body,
    position: "auto"
};

flatpickr(".basic-date", {
    ...commonConfig,
    dateFormat: "Y-m-d"
});

flatpickr(".time-picker", {
    ...commonConfig,
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i"
});

flatpickr(".date-time-picker", {
    ...commonConfig,
    enableTime: true,
    dateFormat: "Y-m-d H:i"
});

flatpickr(".picker-range", {
    ...commonConfig,
    mode: "range"
});

flatpickr(".human-friendly-dates", {
    ...commonConfig,
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d"
});

flatpickr(".multiple-dates", {
    ...commonConfig,
    mode: "multiple"
});
// >> ---------------------------------------- //Date picker js End// ---------------------------------------- <<
