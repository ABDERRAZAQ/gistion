



$(document).ready(function() {

    $('select[name="commandement"]').on('change', function(){
        var commandementId = $(this).val();
        if(commandementId) {
            $.ajax({
                url: '/Commandements/get/'+commandementId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
  
                success:function(data) {
  
                    $('select[name="communeLocal"]').empty();
  
                    $.each(data, function(key, value){
  
                        $('select[name="communeLocal"]').append('<option value="'+ key +'">' + value + '</option>');
  
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="communeLocal"]').empty();
        }
  
    });
  
  });