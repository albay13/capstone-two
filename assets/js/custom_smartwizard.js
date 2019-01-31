$(function(){
    //Smart Wizard
    $('.sw-btn-group-extra').hide();
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if(stepDirection === 'forward' && elmForm){
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            if(elmErr && elmErr.length > 0){
                // Form validation failed
                return false;
            }
        }
        return true;
    });
    // Toolbar extra buttons
    var btnFinish = $('<button name="btn_finish"></button>').text('Finish')
    .addClass('btn btn-info')
    .on('click', function(){ 
    	if( !$(this).hasClass('disabled')){
            var elmForm = $("#myForm");
            if(elmForm){
                elmForm.validator('validate');
                var elmErr = elmForm.find('.has-error');
                if(elmErr && elmErr.length > 0){
                    alert('Oops we still have error in the form');
                    return false;
                }else{
                    alert('Great! we are ready to submit form');
                    elmForm.submit();
                    return false;
                }
            }
        }
    });
    var btnCancel = $('<button></button>').text('Cancel')
             .addClass('btn btn-danger')
             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
      // Step show event
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
       //alert("You are on step "+stepNumber+" now");
       if(stepPosition === 'first'){
           $("#prev-btn").addClass('disabled');
       }else if(stepPosition === 'final'){
           $("#next-btn").addClass('disabled');
       }else{
           $("#prev-btn").removeClass('disabled');
           $("#next-btn").removeClass('disabled');
       }
        if($('button.sw-btn-next').hasClass('disabled')){
    		$('.sw-btn-group-extra').show(); // show the button extra only in the last page
    	}else{
    		$('.sw-btn-group-extra').hide();				
    	}
    });
    $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'default',
            transitionEffect:'fade',
            useURLhash: false,
            showStepURLhash: false,
            toolbarSettings:{toolbarButtonPosition: 'end',
            				 toolbarExtraButtons: [btnFinish, btnCancel]	
        					},
                            

    });
    $("#reset-btn").on("click", function() {
        // Reset wizard
        $('#smartwizard').smartWizard("reset");
        return true;
    });
    $("#prev-btn").on("click", function() {
        // Navigate previous
        $('#smartwizard').smartWizard("prev");
        return true;
    });
    $("#next-btn").on("click", function() {
        // Navigate next
        $('#smartwizard').smartWizard("next");
        return true;
    });
    //End of Smart Wizard
})