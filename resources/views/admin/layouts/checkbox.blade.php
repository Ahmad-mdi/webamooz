<script>
    $(function(){
        $('#selectAll').click(function (){
            if ($(this).prop('checked')){
                $('.checked').prop('checked',true);
                $('#disableAll').prop('checked',false);
            }
        });

        $('#disableAll').click(function (){
            if ($(this).prop('checked')){
                $('.checked').prop('checked',false);
                $('#selectAll').prop('checked',false);
            }
        });
    });
</script>
