/* <-----  Ajax Setup-------> */
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
/* <----- End Ajax Setup-------> */

/* <----- Add new data into table-------> */

$(document).ready(function() {
    $("#studentForm").parsley();
});

$("#studentForm").submit(function(e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let password = $("#password").val();
    let _token = $("input[name=_token]").val();

    if (
        $("#studentForm")
        .parsley()
        .isValid()
    ) {
        $.ajax({
            url: "/student/add",
            type: "POST",
            dataType: "json",
            data: {
                name: name,
                email: email,
                phone: phone,
                password: password,
                _token: _token
            },
            success: function(response) {
                if (response) {
                    toastr["success"]("Data has been added", "Success");
                    $("#studentForm")[0].reset();
                    $("#studentForm")
                        .parsley()
                        .reset();
                    $("#addNewStudentModal").modal("hide");
                    allData();
                }
            }
        });
    }
});

/* <----- End-------> */

/* <----- Show All data from database-------> */

function allData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/student/all",
        success: function(response) {
            var data = "";
            var i = 1;
            $.each(response, function(key, value) {
                data = data + "<tr>";
                data = data + "<td>" + i++ + "</td>";
                data = data + "<td>" + value.name + "</td>";
                data = data + "<td>" + value.email + "</td>";
                data = data + "<td>" + value.phone + "</td>";
                data = data + "<td>";
                data =
                    data +
                    "<a class='btn btn-outline-info me-2' onclick='editData(" +
                    value.id +
                    ")' > <i class='fas fa-pen-square'></i></a>";
                data =
                    data +
                    "<a class='btn btn-outline-danger' onclick='deleteData(" +
                    value.id +
                    ")'> <i class='far fa-trash-alt'></i></a>";
                data = data + "</td>";
                data = data + "</tr>";
            });
            $("tbody").html(data);
        }
    });
}
allData();
/* <----- End -------> */

/* <----- Start Edit Data-------> */

function editData(id) {
    $.ajax({
        url: "/students/edit/" + id,
        type: "GET",
        dataType: "json",

        success: function(response) {
            $("#editStudentModal").modal("toggle");
            $("#id").val(response.id);
            $("#edit_name").val(response.name);
            $("#edit_email").val(response.email);
            $("#edit_phone").val(response.phone);
        }
    });
}

/* <--------- End ------------> */

/* <----- Update data into table-------> */

$(document).ready(function() {
    $("#studentEditForm").parsley();
});

$("#studentEditForm").submit(function(e) {
    e.preventDefault();

    let id = $("#id").val();
    let name = $("#edit_name").val();
    let email = $("#edit_email").val();
    let phone = $("#edit_phone").val();
    let password = $("#edit_password").val();
    let _token = $("input[name=_token]").val();

    if (
        $("#studentEditForm")
        .parsley()
        .isValid()
    ) {
        $.ajax({
            url: "/students/update/" + id,
            type: "POST",
            dataType: "json",
            data: {
                name: name,
                email: email,
                phone: phone,
                password: password,
                _token: _token
            },
            success: function(response) {
                if (response) {
                    toastr["success"](
                        "Information has been updated",
                        "Success"
                    );
                    $("#editStudentModal").modal("hide");
                    allData();
                    $("#studentForm")[0].reset();
                }
            }
        });
    }
});

/* <----- End-------> */

/* <----- Delete Student-------> */

function deleteData(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            $.ajax({
                url: "/students/delete/" + id,
                type: "DELETE",
                dataType: "json",
                success: function(response) {
                    if (response) {
                        toastr["success"]("Record has been deleted", "Success");
                        allData();
                    }
                }
            });
        }
    });
}

/* <----- End-------> */

/* <----- For notification-------> */
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
    newestOnTop: true
};
/* <----- End-------> */