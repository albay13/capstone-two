$(function(){
$.validator.setDefaults({
errorClass: 'help-block',
highlight: function(element) {
$(element)
.closest('.form-input')
.addClass('has-error');
},
unhighlight: function(element) {
$(element)
.closest('.form-input')
.removeClass('has-error');
},
errorPlacement: function (error, element) {
if (element.prop('type') === 'checkbox') {
error.insertAfter(element.parent());
} else {
error.insertAfter(element);
}
}
});
// Login Validation
$('#login_form').validate({
		rules:{
			username:"required",
			password:"required"
		},
		messages:{
			username:{
				required:"Please enter username"
			},
			password:{
				required:"Please enter password"
			}
		}
	});
//Add Status Validation
$("#add_status_form").validate({
    rules:{
        status_name:{
            required:true,
        },
        status_bgcolor:{
            required:true,
        },
        status_fontcolor:{
            required:true,
        }
    },
    messages:{
        status_name:"Please enter status name",
        status_bgcolor:"Please enter hex color for background color",
        status_fontcolor:"Please enter hex color for font color"
    }
});
$("#add_category_form").validate({
    rules:{
        category_name:"required",
        category_desc:"required",
        parent_category:"required",
        category_icon:"required",
        "user_group[]":"required"
    },
    messages:{
        category_name:"Please enter category name",
        category_desc:"Please enter category description",
        parent_category:"Please select parent category",
        category_icon:"Please select any image",
        "user_group[]":"Please select any user_group"
    }
});
});