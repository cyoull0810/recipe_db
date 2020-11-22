<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recipe Upload</title>
    </head>
    <body>
        <div id="container">
            <h3>Recipe Upload</h3>
			

			
            <div id="body">
                <?php
					if (isset($error)) {
						echo '<p style="color:red;">' . $error . '</p>';
					} else {
						echo validation_errors();
					}
                ?>

                <?php 
					$attributes = array('title' => 'title', 'category' => 'category');
                    echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>


<!--
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload Recipe</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" name="title" value="<?php echo set_value('title'); ?>">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
                

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
-->

<label for="category">Choose a Categoryr:</label>
<select id="category" name="category">
  <option value='appetizers' <?php set_value('category', 'appetizers'); ?> > Appetizers</option>
  <option value='beverages'<?php set_value('category', 'beverages'); ?> >Beverages</option>
  <option value='breads'<?php set_value('category', 'breds'); ?> >Bread</option>
  <option value='desserts'<?php set_value('desserts'); ?> >Desserts</option>
  <option value='fish'<?php set_value('fish'); ?> >Fish</option>
  <option value='pasta'<?php set_value('pasta'); ?> >Pasta </option>
  <option value='salads'<?php set_value('salads'); ?> >Salads </option>
  <option value='poultry'<?php set_value('poultry'); ?> >Poultry </option>
  <option value='meat'<?php set_value('meat'); ?> >Meat </option>
  <option value='salsa_dips'<?php set_value('salsa_dips'); ?> >Salsa_dips</option>
  <option value='sides'<?php set_value('sides'); ?> >Sides</option>
</select>
<!--<input type="text" name ="category" value="<?php set_value('category'); ?>" size="20" /> <br> -->
<label for="fname">Title:</label><br>
<input type="test"  name="title" value="<?php echo set_value('title'); ?>"><br><br>

<input type="file"  name="recipe" value="<?php echo set_value('recipe'); ?>"><br>
                
                
<!--
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Category</label>
  </div>

  <select class="custom-select" id="inputGroupSelect01">

    <option selected>Choose...</option>
    <option value="1">Appetizer </option>
    <option value="2">Begerages</option>
    <option value="3">Breads</option>
    <option value="3">Desserts</option>
    <option value="3">Fish</option>
    <option value="3">Pasta</option>
    <option value="3">Salads</option>
    <option value="3">Poultry</option>
    <option value="3">Meat</option>
    <option value="3">Salsa_dips</option>
    <option value="3">Sides</option>
  </select>
</div>
-->

                <p><input type="submit" name="submit" value="Submit"/></p>
                
                <?php echo form_close(); ?>
                <div>
				  <?php echo anchor('/Admin', 'Back to Admin');?>
			    </div>
            </div>
        </div>
    </body>
</html>