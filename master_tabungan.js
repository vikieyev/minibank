$(function() {

    //$.ajax({
   //     type: "GET",
   //     url: "master_index.php"
   // }).done(function() {

       //clients.unshift({ kode_tabungan: "0", nama_tabungan: "" });
		//clients.loadData
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
            deleteConfirm: "Do you really want to delete tabungan?",
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "master_index.php",
                        data: filter
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "master_index.php",
                        data: item
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        url: "master_index.php",
                        data: item
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "master_index.php",
                        data: item
                    });
                }
            },
            fields: [
                { name: "kode_tabungan", title: "Kode", type: "text", width: 20 },
                { name: "nama_tabungan", title: "Nama Program", type: "text", width: 50},
                { name: "setoran_minimal", title: "Min. Setoran Awal", type: "number", width: 30,filtering: false },
                { type: "control" }
            ]
        });

   // });


});