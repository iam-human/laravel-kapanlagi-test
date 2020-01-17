<script>
    
$('#tambah').click(function() {
    alert('Modal');
});

$('#formAdd').on('submit', function(event){
    event.preventDefault();
    if ($('#action').val() == 'Tambah') {
        $.ajax({
            url: "{{route('admin.store')}}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = "",
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#formAdd')[0].reset();
                    $('#adminTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
});

</script>