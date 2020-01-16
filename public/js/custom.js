// $("#cash_memo").on("submit", function(){

// 	$.ajaxSetup({
//         headers: 
//         {
//             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//         }
//     });

// 	var data = $(this).serialize();
//   	var url = $('#url').val();

//   $.ajax({
//     url: url +'/'+ 'store',
//     method: 'GET',
//     data:data,
//     success:function(response){
//       jQuery('#message').html(response);
//       jQuery('#cash_memo').trigger("reset");
//     },
//     error:function(response){
//       alert(response);
//     }
//   });

//   return false;

  
// }); 

$(document).ready(function(){
  //Calculate button events
  $('#generate').hide();
  $('#calculate').click(function(){
    var earning_value = parseInt($('#earning_value').val());
    var deduction_value = parseInt($('#deduction_value').val());
    var basic_salary = parseInt($('#basic_salary').val());

    if(!earning_value){
      earning_value = 0;
    }
    if(!deduction_value){
      deduction_value = 0;
    }
    console.log(earning_value);
    $('#earning').val(earning_value);
    $('#deduction').val(deduction_value);
    $('#net_salary').val(basic_salary+earning_value-deduction_value);

    $('#generate').show();
  });
});

$(document).ready(function(){
  $('.quantitytt').on('keyup', function(){

    var sum = 0;

    $('input[name^="price"]').each(function() {
      var val = parseInt($(this).val());
      if(val != null){
        sum  += val;
      }
    });

    $('#totalPrice').text('Total Price: '+sum);
    $('#totalPriceInput').val(sum);

  });
});

$(document).ready(function(){
  $('.quantitytt').on('keyup', function(){

    var sum = 0;

    $('input[name^="quantity"]').each(function() {
      var val = parseInt($(this).val());
      if(val != null){
        sum  += val;
      }
    });

    $('#totalPitches').text('Total Pitches: '+sum);
    $('#totalPitchesInput').val(sum);

  });
});
