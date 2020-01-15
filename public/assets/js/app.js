$('body').on('click', '.modal-edit', function (event) {
    event.preventDefault();

    $('#modalEdit').modal('show');

    // var me = $(this),
    //     url = me.attr('href'),
    //     // id = me.attr('id'),
    //     title = me.attr('title');

    // $('#modal-title').text(title);
    // $('#modal-btn-save').text('Tambah');

    // $.ajax({
    //     url: url,
    //     dataType: 'html',
    //     success: function (response) {
    //         $('#modal-body').html(response);
    //     }
    // });

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    console.log(data);

    $('#nik').val(data[2]);
    $('#nama').val(data[3]);
});
