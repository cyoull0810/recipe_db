<!doctype html>

<h2><?php  ?></h2>
<?php
// For testing to dump the array values returned
// echo '<pre>';
// print_r($category['recipes']);

?>

<head>
    
    </head>
    <body>
    <div class="container-fluid"> 
    <div class="table-responsive"> 
        <table class="table table-striped">
        <a href="<?php echo site_url('Admin/create_recipe') ?>" class="btn btn-success btn-sm">Add Recipe</a>
        <thead>
            <tr>
                <th scope="col">Recipe </th>
                <th scope="col">Category </th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
  <?php
  
        foreach ($category['recipes']as $item) {
          echo '<tr>';
          echo '<td>' . $item['RECIPE'] . '</td>';
          echo '<td>' . $item['CATEGORY'] . '</td>';
          echo '<td>' . $item['LOCATION'] . '</td>';
          echo '<td>' . anchor('/Admin/update_recipe/' . $item['_id']->{'$id'} , 'Edit') . '</td>';
          echo '</tr>'; 

     }   
  ?>
   </tbody>
            </table>

            </div>
            </div>
     
    </body>
</html>