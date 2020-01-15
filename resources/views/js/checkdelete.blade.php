<script type="text/javascript">
    $('.selectall').click(function(){
        $('.selectbox').prop('checked',$(this).prop('checked'));
        // $('tr.select').addClass('selected');
        // $('tr.selected').toggleClass('selected ');
        // $('tr').css('backgroundColor', '#8A74C9');
    })
    $('.selectbox').change(function(){
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if (total == number) {
            $('.selectall').prop('checked', true);
        }else{
            $('.selectall').prop('checked', false);
            $('tr.selected').attr('id', 'klik');
        }
    })
    $("td").click(function(e) {
        var chk = $(this).closest("tr").find("input:checkbox").get(0);
        if(e.target != chk)
        {
            chk.checked = !chk.checked;
        }
    })
</script>