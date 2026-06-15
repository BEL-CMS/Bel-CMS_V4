
//  >>----------------------------ticket  js start ---------------------------------<<
$('.ticket-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });

  // Function to format the date in "D MMM YYYY"
  function formatDate(date) {
      const d = new Date(date);
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      const day = d.getDate();
      const month = months[d.getMonth()];
      const year = d.getFullYear();
      return `${day} ${month} ${year}`;
  }


  $(function() {
    $('#ticketDatatable').DataTable();
   });

   function tableBodyFun() {
    return `
    <tr>
                            <td>
                             <div class="form-check d-flex align-items-center gap-1">
                                    <input class="form-check-input f-s-18 mb-1" type="checkbox">
                                </div>
                            </td>
                            <td>AR 2044</td>
                            <td>

                                <div class="d-flex align-items-center">
                                    <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-primary me-2">
                                        <img src="../assets/images/avatar/01.png" alt="" class="img-fluid">
                                       </div>
                                       ${$('#clientName').val()}
                                </div>
                            </td>

                            <td> <span class="badge text-outline-warning">${$('#priority').val()}</span></td>
                            <td>${$('#titleName').val()}</td>
                            <td><span class="badge text-outline-primary">${$('#status').val()}</span></td>
                            <td>${formatDate($('#dateName').val())}</td>
                            <td>${formatDate($('#dueName').val())}</td>
                            <td>
                                <div class="btn-group dropdown-icon-none">
                                    <button
                                        class="btn border-0 icon-btn b-r-4 dropdown-toggle active"
                                        type="button" data-bs-toggle="dropdown"
                                        data-bs-auto-close="true" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./ticket_details.html"><i
                                                    class="ti ti-eye text-primary me-2"></i> View </a></li>
                                        <li><a class="dropdown-item" href="#" ><i
                                                    class="ti ti-edit text-success me-2"></i> Edit </a></li>
                                        <li ><a class="dropdown-item delete-btn" href="#" ><i
                                                    class="ti ti-trash text-danger me-2"></i> Delete </a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
  `
  }

  $('#ticketKey').on('click', function () {
    let tableBody = document.querySelector("#ticket_key_body");
        tableBody.innerHTML = tableBodyFun() + tableBody.innerHTML;
        $("#ticketModal").modal("hide");
        $('#clientName').val("");
        $('#priorityname').val("");
        $('#titleName').val("");
        $('#statusname').val("");
        $('#dateName').val("");
        $('#dueName').val("");
        deletAction();
        // document.querySelector(".api_key_content").classList.toggle("d-none");


  });
   $('#create_ticket_key').on('click', function () {
    $("#ticketModal").modal("show");
  })


  function generateUUID() {
    var d = new Date().getTime();
    if (window.performance && typeof window.performance.now === "function") {
      d += performance.now();
    }
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      var r = (d + Math.random() * 16) % 16 | 0;
      d = Math.floor(d / 16);
      return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
    return uuid;
  }

function deletAction() {
    const deleteButtons = document.querySelectorAll(".delete-btn");
    let rowToDelete = null;

    deleteButtons.forEach((button) => {
        button.addEventListener("click", () => {
            rowToDelete = button.closest("tr");
            $("#apiDeletModal").modal("show");
        });
    });

    const confirmDelete = document.querySelector("#confirmDelete");

    if (confirmDelete) {
        confirmDelete.addEventListener("click", () => {
            if (rowToDelete) {
                rowToDelete.remove();
                rowToDelete = null;
                $("#apiDeletModal").modal("hide");
            }
        });
    }
}

deletAction();

//  >>--------------------------ticket  js end --------------------------------<<
