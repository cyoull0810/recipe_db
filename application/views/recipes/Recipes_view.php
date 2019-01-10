<!doctype html>

<h2><?php  ?></h2>
<?php
// For testing to dump the array values returned
//echo '<pre>';
//print_r($category['recipes']);

//
//foreach ($category['recipes'] as $item) {  
//  echo $item['RECIPE'];
//  echo $item['CATEGORY'];
//  echo $item['LOCATION'];
//} 
?>

<head>
        <title>Last 10 Results</title>
    </head>
    <body>
    <div class="container-fluid"> 
    <div class="table-responsive"> 
        <table class="table-striped">
        <thead>
            <tr>
                <td>Recipe</td>
            </tr>
        </thead>
        <tbody>
  <?php
        foreach ($category['recipes']as $item) {
          echo '<tr>';
          echo '<td>' . '<a href=' . base_url('assets/' . $item['LOCATION']) . ' target=_blank >'   . $item['RECIPE'] . '</a> </td>';
          echo '</tr>';
        }
       
  ?>
   </tbody>
            </table>
      </div>
      </div>        
    </body>
</html>


