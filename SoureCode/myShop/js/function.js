function addCart(id,quantity) 
{ 
	$.ajax({ 
	url:"../view/shoppingcart/viewCart.php", 
	method:"POST", 
	data:{id:id, quantity:quantity}, 
	dataType:"text", 
	success:function(data){} 
}); 
}
$(document).on('click','a[data-role=addcart]',function(){
	var id = $(this).data('id');
	id= id.trim();
	addCart(id,1); 
});