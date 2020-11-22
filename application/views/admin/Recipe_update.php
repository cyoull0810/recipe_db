<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recipe Update</title>
    </head>
    <body>
        <div id="container">
            <h3>Recipe Update</h3>
						
            <div id="body">
                <?php
					if (isset($error)) {
						echo '<p style="color:red;">' . $error . '</p>';
					} else {
						echo validation_errors();
					}
                ?>

                <?php 
                    $attributes = array('title' => 'title', 'category' => 'category', 'location' => 'location');
                    echo form_open($this->uri->uri_string(), $attributes);
                    
                ?>

               
             <!--  <input type="text" id ="_id" value="
                <?php echo isset($recipe_update)?$recipe_update[0]['_id']:set_value('_id'); ?>" size="30" /> -->
                
               <input type="text" name ="title" value="
                <?php echo isset($recipe_update)?$recipe_update[0]['title']:set_value('title'); ?>" size="30" />

                <input type="text" name ="category" value="
                <?php echo isset($recipe_update)?$recipe_update[0]['category']:set_value('category'); ?>" size="20" />
                
                <input type="text" name ="location" value="
                <?php echo isset($recipe_update)?$recipe_update[0]['location']:set_value('location'); ?>" size="50" />

                <p><input type="submit" name="submit" value="Submit"/></p>
                
                <?php echo form_close(); ?>
                <div>
				<?php echo anchor('/Admin', 'Back to Admin Home Page');?>
			</div>
            </div>
        </div>
    </body>
</html>