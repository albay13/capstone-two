<div class="form-group row">
    <label class="control-label col-lg-3">Category Name </label>
    <div class="col-lg-9">
    	<div class="form-input">
        <input type="text" class="form-control" name="category_name" id="category_name" required>
    	</div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">Category Description </label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <textarea class="tinymce" id="category_desc" name="category_desc"></textarea> 
        </div>
        <small>Indicate a short description to easily determine the category</small>
    </div>
</div>
 <div class="form-group row">
    <label class="control-label col-lg-3">Parent Category</label>
    <div class="col-lg-9 form-input">
        <div class="form-input">
        <select class="form-control" id="parent_category" name="parent_category" required>
            <option value="0">None</option>
            <?php
                $parent = $crud->fetch_data("SELECT * FROM categories_tbl");
                foreach($parent as $row_parent){
            ?>
                <option value="<?php echo $row_parent["id"]; ?>"><?php echo $row_parent["category_name"]; ?></option>
            <?php
                }
            ?>
        </select>
        </div>
    </div>
</div>
 <div class="form-group row">
    <label class="control-label col-lg-3">Category Icon</label>
    <div class="col-lg-9 form-input">
    	<div class="form-input">
        <input type="file" class="form-control" name="category_icon" id="category_icon" required>
        </div>
        <small>If no file is selected, default icon will be used. Recommended size: 80x80</small>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">User Group</label>
    <div class="col-lg-9">
        
        <select class="form-control multiple_select" id="user_group" name="user_group[]" style="width: 100%;" multiple="" required>
             <?php
                $parent = $crud->fetch_data("SELECT * FROM categories_tbl");
                foreach($parent as $row_parent){
            ?>
                <option value="<?php echo $row_parent["id"]; ?>"><?php echo $row_parent["category_name"]; ?></option>
            <?php
                }
            ?>
        </select>
        <div class="form-input">
        </div>
        <small>If you assign a user group to this category, only users in that user group will be able to access tickets in this category.</small>
    </div>
</div>
