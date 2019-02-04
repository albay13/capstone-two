<form id="add_question_form" name="add_question_form" method="post"> 
<div class="modal-body">
<div class="form-group row">
    <label class="control-label col-lg-2">Question </label>
    <div class="col-lg-9">
    	<div class="form-input">
        <input type="text" class="form-control" name="question" id="question" required>
    	</div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-2">Answers </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <textarea class="tinymce" id="answer" name="answer"></textarea> 
        </div>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
<button type="submit" name="btn-add-question" id="btn-add-question" class="btn btn-primary">Add Question</button>
</div>
</form>