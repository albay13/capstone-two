<form id="add_custom_views_form" name="add_custom_views_form" method="post"> 
<div class="modal-body">
<div class="form-group row">
    <label class="control-label col-lg-3">Name </label>
    <div class="col-lg-9">
    	<div class="form-input">
        <input type="text" class="form-control" name="query_name" id="query_name" required>
    	</div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">Status </label>
    <div class="col-lg-9">
        <div class="form-input">
        <select id="status" name="status" class="form-control">
            <option value="default">All</option>
        <?php 
            $select_status = $crud->fetch_data("SELECT * FROM status_tbl");
            foreach($select_status as $status){
        ?>
            <option value="<?php echo $status["id"]; ?>"><?php echo $status["status_name"]; ?></option>
        <?php
            }
        ?>
        </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">Category </label>
    <div class="col-lg-9">
        <div class="form-input">
        <select id="category" name="category" class="form-control">
            <option value="default">All</option>
        <?php 
            $select_category = $crud->fetch_data("SELECT * FROM categories_tbl");
            foreach($select_category as $category){
        ?>
            <option value="<?php echo $category["id"]; ?>"><?php echo $category["category_name"]; ?></option>
        <?php
            }
        ?>
        </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">Order By </label>
    <div class="col-lg-9">
        <div class="form-input">
        <select id="order_by" name="order_by" class="form-control">
        <?php 
            $select_columns = $crud->fetch_data("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'help_desk' AND TABLE_NAME = 'ticket_info_tbl' LIMIT 3, 7");
            foreach($select_columns as $cols){
        ?>
            <option style="text-transform:capitalize;" value="<?php echo $cols["COLUMN_NAME"]; ?>"><?php echo "<span style='text-transform:capitalize;'>".$cols["COLUMN_NAME"]."</span>"; ?></option>
        <?php
            }
        ?>
        </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-lg-3">Sort By </label>
    <div class="col-lg-9">
        <div class="form-input">
            <select id="sort_by" name="sort_by" class="form-control">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
<button type="submit" name="add_custom_category" id="add_custom_category" class="btn btn-primary">Add Custom View</button>
</div>
</form>