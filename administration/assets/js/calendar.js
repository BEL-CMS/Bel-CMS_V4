// >>---------------------------------------- //Calendar js Start// ---------------------------------------- <<

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        navLinks: true,
        editable: true,
        dayMaxEvents: true,
        headerToolbar: {
            left: 'prev,next,addEventButton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
        },
        customButtons: {
            addEventButton: {
                text: 'add event...',
                click: function () {
                    const dateStr = prompt('Enter a date in YYYY-MM-DD format');
                    const date = new Date(dateStr + 'T00:00:00');

                    if (!isNaN(date.valueOf())) {
                        calendar.addEvent({
                            title: 'dynamic event',
                            start: date,
                            allDay: true
                        });
                        alert('Great. Now, update your database...');
                    } else {
                        alert('Invalid date.');
                    }
                }
            }
        },
        events: [
            {
                title: 'Holiday',
                start: '2026-04-01',
                end: '2026-04-02',
                className: "event-success",
                extendedProps: {iconName: "glass"}
            },
            {
                title: 'Meeting',
                start: '2026-04-09',
                className: "event-primary",
                extendedProps: {iconName: "briefcase"}
            },
            {
                title: 'Tour',
                start: '2026-04-18',
                end: '2026-04-21',
                className: "event-warning",
                extendedProps: {iconName: "plane"}
            }
        ],
        eventClick: function (info) {
            const event = info.event;

            document.getElementById('event-details').innerHTML = `
        <div class="d-flex align-items-center gap-3 p-3 rounded mb-3 border">
            <div class="flex-grow-1">
                <div class="text-dark f-w-500 small">Event Title</div>
                <h5 class="fw-bold text-primary">${event.title}</h5>
            </div>
        </div>

        <div class="row g-3">
           <div class="col-6">
                  <div class="text-dark f-w-500 small">Start Date</div>
              <div class="p-3 border rounded">
          
                  <p class="fw-semibold text-success mb-1">
                      <i class="ti ti-calendar"></i> ${event.start?.toLocaleDateString()}
                  </p>
          
                  <p class="text-muted mb-0">
                      <i class="ti ti-clock"></i> ${event.start?.toLocaleTimeString([], {
                          hour: '2-digit',
                          minute: '2-digit'
                      })}
                  </p>
              </div>
           </div>

            <div class="col-6">
                    <div class="text-dark f-w-500 small">End Date</div>
                <div class="p-3 border rounded">
            
                    <p class="fw-semibold text-danger mb-1">
                        <i class="ti ti-calendar"></i> 
                        ${event.end ? event.end.toLocaleDateString() : "Not set"}
                    </p>
            
                    <p class="text-muted mb-0">
                        <i class="ti ti-clock"></i> 
                        ${event.end ? event.end.toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        }) : "--"}
                    </p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-dark f-w-500 small">All Day</div>
                        <div class="fw-semibold text-secondary">${event.allDay ? "Yes" : "No"}</div>
                    </div>
                    <span class="badge ${event.allDay ? "bg-success" : "bg-secondary"}">
                        ${event.allDay ? "All Day" : "Timed"}
                    </span>
                </div>
            </div>
        </div>
    `;

            $('#exampleModal').modal('show');
        },
        selectable: true,
        selectMirror: true,
        select: function (arg) {
            const title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                });
            }
            calendar.unselect();
        },

        droppable: true,
        drop: function (arg) {
            if (document.getElementById('drop-remove').checked) {
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },
        eventContent: function (info) {
            const iconMap = {
                briefcase: "ti ti-briefcase",
                photo: "ti ti-photo",
                plane: "ti ti-plane",
                cake: "ti ti-cake",
                glass: "ti ti-glass-full",
                allEvents: "ti ti-calendar"
            };

            const iconName = info.event.extendedProps.iconName || "allEvents";
            const icon = iconMap[iconName];

            const colorClass = info.event.classNames.find(c => c.startsWith("event-")) || "event-primary";
            const color = colorClass.replace("event-", "");


            const wrapper = document.createElement("div");
            wrapper.className = `list-event d-flex flex-column gap-2 align-items-center rounded p-2 position-relative bg-${color}-subtle`;

            wrapper.innerHTML = `
        <span class="bg-${color} text-white h-30 w-30 d-flex-center b-r-50">
            <i class="${icon}"></i>
        </span>

        <strong class="f-s-12 text-center text-${color}">${info.event.title}</strong>

        <button class="btn w-25 h-25 icon-btn btn-sm bg-transparent position-absolute end-0 top-0 m-2">
            <i class="ti ti-x"></i>
        </button>
    `;


            wrapper.querySelector("button").addEventListener("click", function (e) {
                e.stopPropagation(); // prevent modal open
                info.event.remove();
            });

            return { domNodes: [wrapper] };
        }


    });

    const containerEl = document.getElementById('events-list');
    new FullCalendar.Draggable(containerEl, {
        itemSelector: '.list-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.querySelector('h6').innerText.trim(),
                className: eventEl.getAttribute('data-class'),
                extendedProps: {
                    iconName: eventEl.getAttribute('data-icon'),
                    time: eventEl.querySelector('p').innerText
                }
            };
        }
    });

    calendar.render();

    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".remove-event");
        if (!btn) return;

        const eventEl = btn.closest(".fc-event");
        if (!eventEl) return;

        const event = calendar.getEventById(eventEl.fcSeg?.eventRange?.def?.publicId);

        if (event) {
            event.remove();
        }
    });
});

// >>---------------------------------------- //Calendar js End// ---------------------------------------- <<
