<form id="add_article_form" name="add_article_form" method="post">
	<div class="form-group row">
		<label class="control-label col-lg-2">Article Title</label>
		<div class="col-lg-9">
			<input type="text" class="form-control" id="article_title" name="article_title">
		</div>
	</div>
	<div class="form-group row">
		<label class="control-label col-lg-2">Content</label>
		<div class="col-lg-9">
			<textarea id="article_content" name="article_content" class="tinymce" style="height: 200px;"></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="control-label col-lg-2">Category</label>
		<div class="col-lg-9">
			<select id="article_category" name="article_category" class="form-control">
				<?php
					$category = $crud->fetch_data("SELECT * FROM article_categories_tbl");
					foreach($category as $art_cat){ 
				?>
					<option value="<?php echo $art_cat["id"]; ?>"><?php echo $art_cat["category_name"]; ?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>
	<div id="sub-category" class="form-group row">
        <label class="control-label col-lg-2"></label>
        <div class="col-lg-9">
            <div id="select-sub-category">
            	<select name='sub_category' id='sub_category'><option value='0' selected></option></select>
        	</div>  
        </div>
    </div>
	<div class="form-group row">
		<div class="col-lg-12">
			<button type="submit" id="btn-post-article" name="btn-post-article" class="btn btn-primary form-control">Post Article</button>
		</div>
	</div>
</form>