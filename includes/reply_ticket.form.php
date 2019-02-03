<form method="post" name="reply_ticket_form" id="reply_ticket_form">
  <input hidden type="text" name="ticket_id" id="ticket_id" value="<?php echo $_GET["ticket_id"]; ?>">
  <div class="form-group row"> 
      <div class="col-lg-12">
          <textarea id="reply" name="reply" style="height: 200px;" class="form-control tinymce"></textarea>
      </div>
  </div>
  <div class="form-group row"> 
      <div class="col-lg-12">
          <label class="control-label font-weight-bold">Attach File</label>
          <input type="file" name="attachment" id="attachment" class="form-control ">
      </div>
  </div>
  <div class="form-group row"> 
      <div class="col-lg-12">
          <label class="control-label font-weight-bold">Default Responses</label>
          <select id="default_response" name="default_response" class="form-control">
              <option>zxczxc</option>
              <option>xcxc</option>
          </select>
      </div>
  </div>
  <div class="form-group row">
      <div class="col-lg-12">
          <button type="submit" class="btn btn-primary form-control">Reply</button>
      </div>
  </div>
</form> 