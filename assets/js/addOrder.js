/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
	
	var addOrderForm = $("#addOrder");
	
	var validator = addOrderForm.validate({
		
		rules:{
			orderNumber :{ required : true },
			custId : { required : true,selected : true },
			ammount : { required : true },
			deliveryDate : {required : true, selected : true},
			orderStatus : { required : true, selected : true },
			discount : { required : true, selected : true},
                        totalCloths : { required : true}
		},
		messages:{
			orderNumber :{ required : "This field is required" },
			custId : { required : "This field is required",selected : "Please select atleast one option"},
			ammount : { required : "This field is required" },
			deliveryDate : {required : "This field is required" ,selected : "Please select atleast one option"},
			orderStatus : { required : "This field is required", selected : "Please select atleast one option" },
			discount : { required : "This field is required", selected : "Please select atleast one option" },
                        totalCloths : { required : "This field is required" }
		}
	});
});