<form id="add_article_category_form" name="add_article_category_form" method="post" enctype="multipart/form-data"> 
<div class="modal-body">
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
                $parent = $crud->fetch_data("SELECT * FROM article_categories_tbl");
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
    <label class="control-label col-lg-3">Restricted Group</label>
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
        <small>Only users in the groups listed above can view articles in this category.</small>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
<button type="submit" name="add_custom_category" id="add_custom_category" class="btn btn-primary">Add Custom Category</button>
</div>
</form>