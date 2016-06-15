$(function() {

    'use strict';

    var options = {
        ajax : {
            url : 'http://localhost/skripsi/index.php/voucher/get_anak',
            cache : true,
            dataType  : 'json',
            delay : 250,
            processResults: function (data) {
                $.each(data.items, function(i, o) { data.items[i].text = o.nama_calon; });
                
                return {
                    results: data.items
                };
            }
        }
    };

    $('#add-address').on('click', addAddress);
    $('.btn-delete-address').on('click', deleteAddress);
    $('.select2').select2(options);

    function addAddress() {
        var html = '' +
        '<tr>' +
         '<td><select class="form-control select2" name="kode_anak_asuh[]" required></select></input></td> ' +
             '<td><select name="kategori[]" required="requreid" class="form-control"><option value="">--Pilih--</option><option value="Akademis">Akademis</option><option value="Kesehatan">Kesehatan</option><option value="Lain-lain">Lain-lain</option></select></td> ' +
            '<td><input type="text" class="form-control" name="keperluan[]" required></input></td> ' +
            '<td><input type="text" class="form-control" name="jumlah[]" required></input></td> ' +
            '<td><input type="text" class="form-control" name="ref_kwitansi[]" ></input></td> ' +
            '<td><input type="date" class="form-control datepicker"  data-date-format="yyyy-mm-dd" name="tgl_bayar[]" placeholder="yyyy-mm-dd "  ></input></td>' +
           
            '<td class="text-center">' +
            '<button type="button" class="btn btn-danger btn-sm btn-delete-address"><i class="fa fa-trash-o"></i></button>' +
            '</td> ' +
        '</tr>';

        $('#table-address tbody').append(html);

        $('.btn-delete-address').on('click', deleteAddress);
        $('.select2').select2(options);
        
    }

    function deleteAddress() {
        var row = $(this).parents('tr').first();

        if (row.length > 0) $(row[0]).remove();
    }

});
