
// >>---------------------------------------- //Email js Start// ---------------------------------------- <<
document.addEventListener("DOMContentLoaded", function () {

    const addBtn = document.getElementById("addEmail");
    const mailList = document.getElementById("mailList");

    if (!addBtn || !mailList) {
        console.error("addEmail button or mailList not found");
        return;
    }

    addBtn.addEventListener("click", function () {

        const to = document.getElementById("userName").value;
        const subject = document.getElementById("subject").value;
        const status = document.getElementById("status").value || "General";
        const message = document.getElementById("exampleFormControlTextarea1").value;

        if (!to || !subject || !message) {
            alert("Please fill all required fields");
            return;
        }

        const mailItem = `
            <div class="mail-box">
                <input class="form-check-input" type="checkbox">

                <span class="ms-2 me-2">
                    <i class="ti ti-star fs-5"></i>
                </span>

                <div class="flex-grow-1 position-relative">
                    <div class="mail-img h-35 w-35 b-r-50 overflow-hidden text-bg-primary position-absolute mt-1">
                        <img src="../assets/images/avatar/14.png" class="img-fluid">
                    </div>

                    <div class="mg-s-45">
                        <h6 class="mb-0 f-w-600">${to}</h6>
                        <span class="f-s-13 text-secondary">
                            ${message.substring(0, 50)}...
                        </span>
                    </div>
                </div>

                <div>
                    <p class="text-center">${new Date().toLocaleDateString()}</p>
                    <span class="badge text-light-success">${status}</span>
                </div>

                <div>
                    <div class="btn-group dropdown-icon-none">
                        <button class="btn border-0 icon-btn dropdown-toggle"
                                data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                       <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#"><i
                                   class="ti ti-archive"></i> Archive </a></li>
                           <li><a class="dropdown-item" href="#"><i
                                   class="ti ti-trash"></i> Delete </a></li>
                           <li><a class="dropdown-item" href="#"><i
                                   class="ti ti-mail-opened"></i> Read Mali </a>
                           </li>
                       </ul>
                    </div>
                </div>
            </div>
        `;

        mailList.insertAdjacentHTML("afterbegin", mailItem);

        // Close modal
        const modalEl = document.getElementById("emailBox");
        const modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();

        // Reset form
        document.querySelector(".app-form").reset();
    });

});

document.querySelectorAll('.email-inbox-tab .nav-link').forEach(link => {
    link.addEventListener('click', () => {

        // check screen width (991px and below)
        if (window.innerWidth <= 991) {
            const mailboxCard = document.querySelector('.mailbox .card');
            if (mailboxCard) {
                mailboxCard.classList.add('mail-box-close');
            }
        }

    });
});

document.querySelectorAll('.mail-toggle-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const mailboxCard = document.querySelector('.mailbox .card');

        if (mailboxCard) {
            mailboxCard.classList.remove('mail-box-close');
        }
    });
});

// >> ---------------------------------------- //Email js End// ---------------------------------------- <<
