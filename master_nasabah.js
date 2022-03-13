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
            deleteConfirm: "Do you really want to delete nasabah?",
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "master_nasabah_index.php",
                        data: filter
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "master_nasabah_index.php",
                        data: item
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        url: "master_nasabah_index.php",
                        data: item
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "master_nasabah_index.php",
                        data: item
                    });
                }
            },
            fields: [
                { name: "kode_nasabah", title: "rek nasabah", type: "text", width: 20 },
                { name: "nama_nasabah", title: "nama nasabah", type: "text", width: 20},
                { name: "alamat_nasabah", title: "alamat nasabah", type: "text", width: 30 },
                { name: "tgl_lahir_nasabah", title: "tgl lahir", type: "text", width: 20},
                { name: "nama_ibu_kandung", title: "ibu kandung", type: "text", width: 20 },
                { name: "no_tlp_nasabah", title: "no tlp", type: "number", width: 20 },
                { type: "control" }
            ]
        });

   // });


});