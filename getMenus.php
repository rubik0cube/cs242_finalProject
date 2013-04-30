<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/9/13
 * Time: 2:50 PM
 * To change this template use File | Settings | File Templates.
 */
include 'connection.php';

$restaurant = $_POST['restaurant'];

$query = "SELECT * From menus WHERE restaurant='".$restaurant."'";
$result = mysql_query($query);

$imagesDir = 'image/tag/';
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);


echo "<h3>" . $restaurant . " Menus</h3>";
echo "<div class='accordion' id='accordion2'>";

while($row = mysql_fetch_assoc($result)){
    $dish_name = $row['dish_name'];
    $dish_type = $row['dish_type'];
    $dish_price = $row['dish_price'];
    $dish_id = $row['dish_id'];
    $randomImage = $images[array_rand($images)];

    echo "
    <div class='accordion-group' style='background-color: white'>
    <div class='accordion-heading'>
      <a title=". $dish_type . " class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#". $dish_id . "'>
                <img border='0' src=". $randomImage ." width='30' height='30'>". $dish_name ."
                <blockquote class='pull-right'>". $dish_price ."</blockquote>

      </a>
    </div>
    <div id='". $dish_id ."' class='accordion-body collapse'>
      <div class='accordion-inner'>
            <div id='comment'></div>
            <label for='name'>Name:</label>
            <input id = 'poster_name' type='text' name='name'>
            <label for='comment_body'>Comment:</label>
            <textarea name='comment_body' id='comment_body' style='height:80px;width=80%'></textarea>
            <input type='hidden' name='dish_name' id='dish_name' value='". $dish_name . "'>
            <input type='hidden' name='restaurant' id='restaurant' value='". $restaurant . "'>
            <input type='hidden' name='parent_id' id='parent_id' value='0'>
            <button class='btn' id='add_button' type='button'>Add Comment</button>
      </div>
    </div>
    </div>
    ";
}

echo "</div>";

