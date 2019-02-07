<form id="add_status_form" name="add_status_+form" method="post">
<div class="modal-body">
<div class="form-group row">
    <label class="control-label col-lg-2">Name </label>
    <div class="col-lg-9">
    	<div class="form-input">
        <input type="text" class="form-control" name="status_name" id="status_name" required>
    	</div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-2">Color </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <input type="text" class="form-control minicolors" data-control="hue" value="#F75A5F" name="status_bgcolor" id="status_bgcolor" required>
        </div>
        <small>Enter a hexcode/choose in the color picker for the color. Leave out the #.</small>
    </div>
</div>
 <div class="form-group row">
    <label class="control-label col-lg-2">Font Color </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <input type="text" class="form-control  minicolors" data-control="hue" value="#F75A5F" name="status_fontcolor" id="status_fontcolor" required>
        </div>
        <small>Enter a hexcode/choose in the color picker for the color. Leave out the #.</small>
    </div>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
<button type="submit" name="add_custom_status" class="btn btn-primary">Add Custom Status</button>
</div>
</form>