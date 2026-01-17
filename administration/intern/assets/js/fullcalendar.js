(function () {
  "use strict";

  // Initialize the FullCalendar with updated events
  var curYear = moment().format('YYYY');
  var curMonth = moment().format('MM');
  var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    defaultView: 'month',
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
    editable: true,
    selectable: true,
    selectMirror: true,
    droppable: true, // this allows things to be dropped onto the calendar
    events: [{
      title: 'Annual School Day',
      start: moment(curYear + '-' + curMonth + '-02').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-03').format('YYYY-MM-DD'),
      className: "bg-secondary",
      description: 'A celebration of the school year with various events and activities for students and staff.',
    },
    {
      title: 'Science Fair',
      start: moment(curYear + '-' + curMonth + '-17').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-17').format('YYYY-MM-DD'),
      className: "bg-info",
      description: 'Students will showcase their science projects. Open to all parents and students.',
    },
    {
      title: 'Parent-Teacher Meeting',
      start: '2025-03-15',
      end: '2025-03-15',
      className: "bg-primary",
      description: 'An important event where parents meet teachers to discuss the progress of their children.',
    },
    {
      title: 'Spring Break',
      start: moment(curYear + '-' + curMonth + '-13').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-13').format('YYYY-MM-DD'),
      className: "bg-warning",
      description: 'The students get a break for the spring holidays. No school during this period.',
    },
    {
      title: 'Sports Day',
      start: moment(curYear + '-' + curMonth + '-21').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-21').format('YYYY-MM-DD'),
      className: "bg-success",
      description: 'A day full of sports activities and competitions. Parents and teachers are welcome to join in.',
    },
    {
      title: 'Exam Week',
      start: '2025-04-10',
      end: '2025-04-14',
      className: "bg-success",
      description: 'A week where students will sit for their final exams.',
    },
    {
      title: 'Holiday Celebrations',
      start: moment(curYear + '-' + curMonth + '-04T10:00:00').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-06T15:00:00').format('YYYY-MM-DD'),
      className: "bg-info",
      description: 'Celebrating the upcoming national holiday with various cultural activities and festivities.',
    },
    {
      title: 'School Play: Romeo & Juliet',
      start: moment(curYear + '-' + curMonth + '-23T13:00:00').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-25T18:30:00').format('YYYY-MM-DD'),
      className: "bg-danger",
      description: 'A special performance by the school’s drama club. All students and families are invited to watch.',
    },
    {
      title: 'Career Day',
      start: moment(curYear + '-' + curMonth + '-04').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-04').format('YYYY-MM-DD'),
      className: "bg-success",
      description: 'Students will learn about various career paths with guest speakers from various professions.',
    },
    {
      title: 'Teacher Appreciation Day',
      start: moment(curYear + '-' + curMonth + '-28').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-28').format('YYYY-MM-DD'),
      className: "bg-teal",
      description: 'A day to appreciate the hard work and dedication of the school’s teachers.',
    },
    {
      title: 'School Picnic',
      start: moment(curYear + '-' + curMonth + '-31').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + curMonth + '-31').format('YYYY-MM-DD'),
      className: "bg-pink",
      description: 'A fun outdoor picnic for all students, teachers, and families to enjoy together.',
    },
    {
      title: 'Summer Vacation Starts',
      start: moment(curYear + '-' + '11' + '-11').format('YYYY-MM-DD'),
      end: moment(curYear + '-' + '11' + '-11').format('YYYY-MM-DD'),
      className: "bg-warning",
      description: 'The last day of school before the summer holidays begin.',
    }
    ],
    eventRender: function (info) {
      // Modify the event's title or description with formatted start and end dates
      const event = info.event;

      // Format the start and end dates as "DD MMMM, YYYY" (e.g., "02 March, 2025")
      const formattedStart = moment(event.start).format('DD MMMM, YYYY');
      const formattedEnd = moment(event.end).format('DD MMMM, YYYY');

      // Add the formatted start and end dates into the event's title or description
      var eventElement = info.el.querySelector('.fc-title');
      if (eventElement) {
        eventElement.innerHTML += `<br><small>From: ${formattedStart} To: ${formattedEnd}</small>`;
      }
    },
    // Handle click on a date in the calendar
    dateClick: function (info) {
      // Trigger the Add Event modal
      var addEventModal = new bootstrap.Modal(document.getElementById('addEvent'));
      addEventModal.show();

      // Clear the date pickers to avoid auto-selection of the clicked date
      document.getElementById('fromDate').value = ''; // Clear the value
      document.getElementById('toDate').value = ''; // Clear the value

      // Optional: Focus on the first input field (event name) for convenience
      document.getElementById('eventName').focus();
    },
    eventClick: function (info) {
      var event = info.event;
      var eventId = event.id;

      // Set data in the Event Details modal (for viewing)
      document.getElementById('modalEventName').textContent = event.title;
      document.getElementById('modalEventDescription').textContent = event.extendedProps.description;

      // Use moment to format the date
      document.getElementById('modalEventStart').textContent = moment(event.start).format("DD MMM, YYYY");
      document.getElementById('modalEventEnd').textContent = event.end ? moment(event.end).format("DD MMM, YYYY") : 'N/A';

      // Show Event Details modal
      var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
      eventModal.show();

      // Add the click event for the Delete button
      document.getElementById('deleteEventButton').onclick = function () {
        // Delete the event from the calendar
        event.remove();
        // Close the modal
        var eventModal = bootstrap.Modal.getInstance(document.getElementById('eventModal'));
        eventModal.hide();
        alert('Event deleted successfully!');
      };
    }
  });

  // Render the calendar
  calendar.render();

  // External Events
  var containerEl = document.getElementById('external-events');
  new FullCalendar.Draggable(containerEl, {
    itemSelector: '.fc-event',
    eventData: function (eventEl) {
      return {
        title: eventEl.innerText.trim(),
        className: eventEl.className + ' overflow-hidden '
      };
    }
  });

  // Handle Add Event Button Click
  document.getElementById('addEventButton').addEventListener('click', function () {
    var eventName = document.getElementById('eventName').value.trim();
    var fromDateStr = document.getElementById('fromDate').value.trim();
    var toDateStr = document.getElementById('toDate').value.trim();
    var eventDescription = document.getElementById('event-description').value.trim();
    var eventType = document.getElementById('eventType').value.trim();

    // Check if all required fields are filled (non-empty)
    if (!eventName || !fromDateStr || !toDateStr || !eventType) {
      alert('Please fill in all fields before adding the event.');
      return; // Exit the function to prevent form submission
    }

    // Convert date strings to YYYY-MM-DD format
    var fromDate = moment(fromDateStr, "DD MMMM, YYYY").format("YYYY-MM-DD");
    var toDate = moment(toDateStr, "DD MMMM, YYYY").format("YYYY-MM-DD");

    var eventClass = eventType;

    // Create a new event
    var newEvent = {
      title: eventName,
      start: fromDate,
      end: toDate,
      description: eventDescription,
      className: eventClass, // Event class for styling
      id: Date.now() // Unique ID for the new event
    };

    calendar.addEvent(newEvent);
    alert('Event added successfully!');

    // Clear the input fields after submitting
    document.getElementById('eventName').value = '';
    document.getElementById('fromDate').value = '';
    document.getElementById('toDate').value = '';
    document.getElementById('event-description').value = '';
    document.getElementById('eventType').value = '';

    // Close the modal
    var addEventModal = bootstrap.Modal.getInstance(document.getElementById('addEvent'));
    addEventModal.hide(); // Correctly hide the modal
  });

  // Date Picker (From Date)
  flatpickr("#fromDate", {
    disableMobile: true,
    minDate: "today",
    defaultDate: null, // Prevent default date selection
    dateFormat: "d F, Y",
    disable: [
      function (date) {
        return date < new Date(); // Disable past dates
      }
    ],
    onOpen: function (selectedDates, dateStr, instance) {
      // Reset the date manually if needed
      instance.clear();
    }
  });

  // Date Picker (To Date)
  flatpickr("#toDate", {
    disableMobile: true,
    minDate: "today",
    defaultDate: null, // Prevent default date selection
    dateFormat: "d F, Y",
    disable: [
      function (date) {
        return date < new Date(); // Disable past dates
      }
    ],
    onOpen: function (selectedDates, dateStr, instance) {
      // Reset the date manually if needed
      instance.clear();
    }
  });


  // for activity scroll
  var myElement1 = document.getElementById('full-calendar-activity');
  new SimpleBar(myElement1, { autoHide: true });

})();
