/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
let datajasa = "";

$(document).ready(function () {
    datajasa = $("#data-jasa").DataTable({
        processing: true,
        serverSide: true,
        ajax: "services", // memanggil route yang menampilkan data json
        columns: [
            {
                // mengambil & menampilkan kolom sesuai tabel database
                data: "id",
                name: "id",
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "category",
                name: "category",
            },
            {
                data: "size",
                name: "size",
            },
            {
                data: "price",
                name: "price",
            },
            {
                data: "action",
                name: "action",
            },
        ],
    });

    $(".showform").on("click", function (e) {
        $.ajax({
            type: "get",
            url: "services/tampilformtambah",
            dataType: "json",
            success: function (response) {
                $(".viewform").show().html(response.sukses);
            },
        });
    });
});

function updatejasa(id) {
    console.log(id);
}

function hapusjasa(id) {
    console.log(id);
}
