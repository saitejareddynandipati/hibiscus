/*$(document).on('change',"#discount",function () { 
	var discount = $("#discount").val();
	var price = $("#price").val();
		//alert("222");	 	
		 	var data = { discount : discount, price : price };
			$.ajax({
			type:"POST",
			url:'admindiscount',
			data:data,
			cache:false,
			success:function(html){
				$("#actual_price").val(html);
			}
			
			});
		
	
 });*/

$( document ).ready(function() {
  	$( "#price,#discount" ).change(function() {
  		var discount = $("#discount").val();
  		var price = $("#price").val();
  		var actual_price = (price - (price*(discount/100)));
  		$("#actual_price").val(actual_price);
	});
});