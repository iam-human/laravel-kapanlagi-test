<script>
    $('input[type="file"]').change(function(e){
        var file = e.target.files[0].name;
        $('.custom-file-label').html(file);
    });
    //view photo
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#viewfoto").change(function(){
        readURL(this);
    });
</script>