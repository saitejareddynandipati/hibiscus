$(document).on('change',"#product_number",function () { 
	var product_number=$(this).val();
		//alert("222");
		 
		 	var data = 'product_number='+product_number;
			$.ajax({
			type:"POST",
			url:'admincon/product_number_check',
			data:data,
			cache:false,
			success:function(html){
			/*alert(html);*/
			
			if(html==1)
			{
				$("#product_no").html("product Number already existed");
				$("#product_number").val("");
			}
		}
			
			});
		
	
 });

$("#addp_category_id").change(function(){
	var category_id = parseInt($('#addp_category_id').val()); 
	//alert('111');
	//$('#shop_id option').prop('selected',false);

	switch(category_id)
	{
		case 1:
			$('#divAcc').removeClass('hidden');	
			$('#sizeDiv').addClass('hidden');
		
		break;
		case 2:
			$('#divAcc').addClass('hidden');
			$('#sizeDiv').addClass('hidden');
		
		break;
		default:
			$('#divAcc').addClass('hidden');		
		break;
	}
	
});

$("#addp_subcategory_id").change(function(){
	var subcategory_id = parseInt($('#addp_subcategory_id').val()); 
  //alert('111');
	//$('#shop_id option').prop('selected',false);
	
	switch(subcategory_id)
	{
		case 5:
			$('#divAcc').removeClass('hidden');
			$('#sizeDiv').removeClass('hidden');
						
		break;
		case 4:
			$('#divAcc').addClass('hidden');
			$('#sizeDiv').addClass('hidden');
		
		break;
		case 6:
			$('#divAcc').addClass('hidden');
						$('#sizeDiv').addClass('hidden');
		
		break;
		default:
			$('#divAcc').removeClass('hidden');		
		break;
	}
	
});


$(document).on('change',"#category_id",function () { 
	var category_id=$(this).val();
		//alert("222");
		 if(category_id=='')
		 {
			 	//alert('Please Select Shop');

				$("#subcategory_id").html('<option value="">-Select Subcategory name-</option');
				$(this).focus();
		 }
		 else
		 {
		 	var data = 'category_id='+category_id;
			$.ajax({
			type:"POST",
			url:'get_Subcategory_by_categoryId',
			data:data,
			cache:false,
			success:function(html){
			//alert(html);
			$("#subcategory_id").html(html);
			}
			});
		}
	
 });

$(document).on('change',"#subcategory_id",function () { 
	var subcategory_id=$(this).val();
		//alert("222");
		 if(subcategory_id=='')
		 {
			 	//alert('Please Select Shop');

				$("#itemcategory_id").html('<option value="">-Select Type name-</option');
				$(this).focus();
		 }
		 else
		 {
		 	var data = 'subcategory_id='+subcategory_id;
			$.ajax({
			type:"POST",
			url:'get_type_by_SubcategoryId',
			data:data,
			cache:false,
			success:function(html){
			//alert(html);
			$("#itemcategory_id").html(html);
			}
			});
		}
	
 });


$(document).on('change',"#addp_category_id",function () { 
	var category_id=$(this).val();
		//alert("222");
		 if(category_id=='')
		 {
			 	//alert('Please Select Shop');

				$("#addp_subcategory_id").html('<option value="">-Select Subcategory name-</option');
				$(this).focus();
		 }
		 else
		 {
		 	var data = 'category_id='+category_id;
			$.ajax({
			type:"POST",
			url:'addp_get_Subcategory_by_categoryId',
			data:data,
			cache:false,
			success:function(html){
			//alert(html);
			$("#addp_subcategory_id").html(html);
			}
			});
		}
	
 });

$(document).on('change',"#addp_subcategory_id",function () { 
	var subcategory_id=$(this).val();
		//alert("222");
		 if(subcategory_id=='')
		 {
			 	//alert('Please Select Shop');

				$("#addp_itemcategory_id").html('<option value="">-Select Type name-</option');
				$(this).focus();
		 }
		 else
		 {
		 	var data = 'subcategory_id='+subcategory_id;
			$.ajax({
			type:"POST",
			url:'addp_get_type_by_SubcategoryId',
			data:data,
			cache:false,
			success:function(html){
			//alert(html);
			$("#addp_itemcategory_id").html(html);
			}
			});
		}
	
 });
$("#product_number").autocomplete({
	source:'productnumberautofill',
	minLength:1,
	width: 402,
	select: function( event, ui ) {
		//alert(ui.item.label);
		var label = ui.item.label;
		
	} 
 });