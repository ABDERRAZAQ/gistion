

$(document).ready(function() {

  $('select[name="division"]').on('change', function(){
      var divisionId = $(this).val();
      if(divisionId) {
          $.ajax({
              url: '/services/get/'+divisionId,
              type:"GET",
              dataType:"json",
              beforeSend: function(){
                  $('#loader').css("visibility", "visible");
              },

              success:function(data) {

                  $('select[name="service"]').empty();

                  $.each(data, function(key, value){

                      $('select[name="service"]').append('<option value="'+ key +'">' + value + '</option>');

                  });
              },
              complete: function(){
                  $('#loader').css("visibility", "hidden");
              }
          });
      } else {
          $('select[name="service"]').empty();
      }

  });

});