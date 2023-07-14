$(document).ready(function () {
    $("#show-password").on("click", function () {
        if ($(this).is(":checked")) {
            $("#password").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
        }
    });

    $("#email").on("input", function (e) {
        e.preventDefault();
        $(this).removeClass("is-invalid");
        $(".erremail").html("");
    });
    $("#password").on("input", function (e) {
        e.preventDefault();
        $(this).removeClass("is-invalid");
        $(".errpassword").html("");
    });

    $("#form-login").submit(function (e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
            type: "post",
            url: "login/auth",
            data: formdata,
            dataType: "json",
            beforeSend: function () {
                $(".btnsubmit").attr("disable", "disabled");
                $(".btnsubmit").html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function () {
                $(".btnsubmit").removeAttr("disable");
                $(".btnsubmit").html("Ubah");
            },
            success: function (response) {
                if (response.error) {
                    let erremail = response.error.email;
                    let errpassword = response.error.password;
                    let errwrongpassword = response.error.wrong_password;

                    if (erremail) {
                        $("#email").addClass("is-invalid");
                        $(".erremail").html(erremail);
                    } else {
                        $("#email").removeClass("is-invalid");
                        $(".erremail").html("");
                    }
                    if (errpassword) {
                        $("#password").addClass("is-invalid");
                        $(".errpassword").html(errpassword);
                    } else {
                        $("#password").removeClass("is-invalid");
                        $(".errpassword").html("");
                    }
                    if (errwrongpassword) {
                        $(".alert-message")
                            .html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan!</strong> ${errwrongpassword}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>`);
                    }
                } else {
                    console.log(response.sukses.link);
                    window.location = response.sukses.link;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(
                    xhr.status,
                    +"\n" + xhr.responseText + "\n" + thrownError
                );
            },
        });
        return false;
    });
});
