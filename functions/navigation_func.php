<?php
include 'db/connect.php';

function getNavItems(){

  global $conn;
  $psql = mysqli_query($conn, 'SELECT * FROM categories');

   while($parent = mysqli_fetch_assoc($psql)){ 
      $parent_id = $parent['parent']; 
      $csql = mysqli_query($conn, "SELECT * FROM items WHERE parent = '$parent_id' ");                
        echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$parent['category'].'<span class="caret"></span></a>';
            echo '<ul class="dropdown-menu" role="menu">';
      while($child = mysqli_fetch_assoc($csql)){
            echo  '<li>';
            echo "<a href='category.php?cat=";
            echo $child['items_id'];
            echo "'>";
            echo $child['item_name']; 
            echo '</a></li>';
            }
            echo '</ul>';
        echo '</li>';
    }
}
