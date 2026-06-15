// >>-----------------------------------------todo table js start----------------------------<<
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("add_employee_todo");
    const tbody = document.getElementById("t-data");
    const submitBtn = document.getElementById("submit-btn");
    const modalTitle = document.getElementById("todoModalLabel");
    const modalEl = document.getElementById("todoModal1");

    let editRow = null;


    const getStatusText = (status) => {
        return status === "success"
            ? "High"
            : status === "warning"
                ? "Medium"
                : "Low";
    };


    const getBadgeClass = (status) => {
        return status === "success"
            ? "bg-success"
            : status === "warning"
                ? "bg-warning"
                : "bg-danger";
    };


    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const task = document.getElementById("task-field").value.trim();
        const assign = document.getElementById("assign-field").value.trim();
        const date = document.getElementById("date-field").value;
        const notes = document.getElementById("notes-field").value.trim();
        const status = document.getElementById("status-field").value;

        if (!task || !assign || !date || !status) {
            alert("All fields required");
            return;
        }

        const badge = getBadgeClass(status);
        const statusText = getStatusText(status);


        if (editRow) {
            editRow.querySelector(".task").innerText = task;
            editRow.querySelector(".assign").innerText = assign;
            editRow.querySelector(".date").innerText = date;
            editRow.querySelector(".notes span").innerText = notes;

            const statusSpan = editRow.querySelector(".status span");
            statusSpan.innerText = statusText;
            statusSpan.className =
                `badge ${badge}-subtle ${badge} f-s-10 text-uppercase`;
        }

        else {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td><input type="checkbox" class="form-check-input ms-2"></td>
                <td class="task f-w-500 text-dark">${task}</td>
                <td class="status">
                    <span class="badge ${badge}-subtle ${badge} f-s-10 text-uppercase">${statusText}</span>
                </td>
                <td class="assign">${assign}</td>
                <td class="date text-danger">${date}</td>
                <td class="notes"><span>${notes}</span></td>
                <td>
                    <button type="button" class="btn edit-item-btn icon-btn btn-outline-success">
                        <i class="ti ti-edit"></i>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn remove-item-btn icon-btn btn-outline-danger">
                        <i class="ti ti-trash"></i>
                    </button>
                </td>
            `;
            tbody.insertBefore(tr, tbody.firstChild);
        }

        editRow = null;
        submitBtn.innerText = "Add";
        modalTitle.innerText = "Add Employee";

        form.reset();
        bootstrap.Modal.getInstance(modalEl).hide();
    });


    tbody.addEventListener("click", (e) => {

        if (e.target.closest(".remove-item-btn")) {
            e.target.closest("tr").remove();
        }

        if (e.target.closest(".edit-item-btn")) {
            editRow = e.target.closest("tr");

            document.getElementById("task-field").value =
                editRow.querySelector(".task").innerText;
            document.getElementById("assign-field").value =
                editRow.querySelector(".assign").innerText;
            document.getElementById("date-field").value =
                editRow.querySelector(".date").innerText;
            document.getElementById("notes-field").value =
                editRow.querySelector(".notes span").innerText;

            const statusText =
                editRow.querySelector(".status span").innerText.toLowerCase();

            document.getElementById("status-field").value =
                statusText === "high"
                    ? "success"
                    : statusText === "medium"
                        ? "warning"
                        : "danger";

            submitBtn.innerText = "Edit";
            modalTitle.innerText = "Edit Employee";

            new bootstrap.Modal(modalEl).show();
        }
    });

    modalEl.addEventListener("hidden.bs.modal", () => {
        editRow = null;
        submitBtn.innerText = "Add";
        modalTitle.innerText = "Add Employee";
        form.reset();
    });
});


// todo js
document.addEventListener('DOMContentLoaded', () => {
    const pushBtn = document.querySelector('#push');
    const taskInput = document.querySelector('#newtask input');
    const tasksContainer = document.querySelector('.todo-container');

    if (!pushBtn || !taskInput || !tasksContainer) return;

    pushBtn.addEventListener('click', () => {
        try {
            const taskValue = taskInput.value.trim();

            if (taskValue.length === 0) {
                alert("Enter Task Name!!!!");
                return;
            }

            const taskHTML = `
                <div class="task">
                    <span id="taskname">${taskValue}</span>
                    <button class="btn btn-sm p-1 border-0 delete">
                        <i class="ti ti-trash text-danger f-s-18"></i>
                    </button>
                </div>
            `;

            tasksContainer.insertAdjacentHTML('afterbegin', taskHTML);

            taskInput.value = '';

        } catch (error) {
            console.error("Error adding task:", error);
        }
    });

    tasksContainer.addEventListener('click', (e) => {
        if (e.target.closest('.delete')) {
            try {
                const taskElement = e.target.closest('.task');
                if (taskElement) taskElement.remove();
            } catch (error) {
                console.error("Error deleting task:", error);
            }
        }
    });
});

// >>--------------------------------------todo table js end--------------------------<<
