<?php
    $query = $crud->fetch_data("SELECT * FROM status_tbl where id = '".$_GET["id"]."'");
    $row = mysqli_fetch_array($query);
?>
<div class="form-group row">
    <label class="control-label col-lg-2">Name </label>
    <div class="col-lg-9">
    	<div class="form-input">
        <input value="<?php echo $row["status_name"]; ?>" type="text" class="form-control" name="status_name" id="status_name" required>
    	</div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-2">Color </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <input  value="<?php echo $row["bg_color"]; ?>" type="text" class="form-control minicolors" name="status_bgcolor" id="status_bgcolor" required>
        </div>
        <small>Enter a hexcode for the color. Leave out the #.</small>
    </div>
</div>
 <div class="form-group row">
    <label class="control-label col-lg-2">Font Color </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <input value="<?php echo $row["text_color"]; ?>" type="text" class="form-control minicolors" name="status_fontcolor" id="status_fontcolor" required>
        </div>
        <small>Enter a hexcode for the color. Leave out the #.</small>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <button type="submit" name="edit_custom_status" class="btn btn-primary btn-block">Edit Custom Status</button>
    </div>
</div>
