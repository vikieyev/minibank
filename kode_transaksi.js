$(function() {

            $("#jsGrid").jsGrid({
            height: "70%",
            width: "100%",
            filtering: true,
            inserting: false,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete data?",
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "kode_transaksi_index.php",
                        data: filter
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "kode_transaksi_index.php",
                        data: item
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        url: "kode_transaksi_index.php",
                        data: item
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "kode_transaksi_index.php",
                        data: item
                    });
                }
            },
            fields: [
                { name: "kode_transaksi", title: "Kode Transaksi", type: "text", width: 20 },
                { name: "ket_transaksi", title: "Keterangan", type: "text", width: 50},
                { name: "jenis_neraca", title: "Neraca", type: "text", width: 30,filtering: false },
                { type: "control" }
            ]
        });

   // });


});