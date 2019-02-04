<form method="post" name="add_ticket_form" id="add_ticket_form" class="needs-validation" data-toggle="validator">
    <div class="form-group row">
        <label class="control-label col-lg-3" for="ticket_title"> Title</label>
        <div class="col-lg-9">
            <input type="text" name="ticket_title" id="ticket_title" class="form-control" placeholder="Enter ticket title" maxlength="70" required>
            <small id="text-counter">Text Count : <span class="text-count">0</span>/70</small>
        </div>

    </div>
    <div class="form-group row">
        <label class="control-label col-lg-3" for="department"> Department</label>
        <div class="col-lg-9">
           <select class="form-control" id="department" name="department" class="department" required>
               <option value="">Select Department</option>
               <?php
                $department = $crud->fetch_data("SELECT * FROM department_tbl ORDER BY department");
                foreach($department as $row_dept){
               ?>
                <option value="<?php echo $row_dept["id"]; ?>"><?php echo $row_dept["department"]; ?></option>
               <?php
                }
               ?>
           </select>
        </div>
    </div>
     <div class="form-group row">
        <label class="control-label col-lg-3"> Priority</label>
        <div class="col-lg-9">
           <select class="form-control" id="priority" name="priority" required>
               <option value="">Select Priority</option>
               <option value="low">Low</option>
               <option value="medium">Medium</option>
               <option value="high">HIgh</option>
           </select>
            <small><span class="badge badge-danger">Note</span><i> Indicate ticket priority to apply proper action accordingly.</i></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-lg-3">Status</label>
        <div class="col-lg-9">
           <select class="form-control" name="status" id="status" required>
             <option value="">Select Status</option>
              <?php 
                $status = $crud->fetch_data("SELECT * FROM status_tbl");
                foreach($status as $row_stat){
              ?>
                <option value="<?php echo $row_stat["id"]; ?>"><?php echo $row_stat["status_name"]; ?></option>
              <?php
                }
              ?>
           </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-lg-3"> Category</label>
        <div class="col-lg-9">
           <select id="ticket_category" name="ticket_category" class="form-control" required>
               <option value="">Select Category</option>
               <?php
                $category = $crud->fetch_data("SELECT * FROM categories_tbl");
                foreach($category as $row_cat){
               ?>
                <option data value="<?php echo $row_cat["id"]; ?>"><?php echo $row_cat["category_name"]; ?></option>
               <?php
                }
               ?>
           </select>
        </div>
    </div>
    <div id="sub-category" class="form-group row">
        <label class="control-label col-lg-3"></label>
        <div class="col-lg-9">
            <div id="select-sub-category">
              <select name='sub_category' id='sub_category'><option value='0' selected></option></select>
            </div>  
        </div>
    </div>

     <div class="form-group row">
        <label class="control-label col-lg-3">Content</label>
        <div class="col-lg-9">
            <textarea id="content" name="content" style="height: 200px;" class="tinymce"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-lg-3"> Attach File</label>
        <div class="col-lg-9">
            <input type="file" name="uploaded_file" id="uploaded_file" class="form-control" required>
             <small><i> Please attach file to support your complaint.</i></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-lg-3"> Additional Notes (<i>Optional</i>)</label>
        <div class="col-lg-9">
            <textarea id="notes" name="notes" style="height: 200px;" class="tinymce"></textarea>
            <small><i> Additional notes for some other important information.</i></small>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <button type="submit" name="create_ticket" id="create_ticket" class="btn btn-info form-control ">Create Ticket</button>
        </div>
    </div>
</form>