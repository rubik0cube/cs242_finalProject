<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shengchao
 * Date: 4/13/13
 * Time: 1:38 PM
 * To change this template use File | Settings | File Templates.
 */

function getComments($row) {
    echo "<li class='comment'>";
    echo "<div class='aut'>".$row['writer_name']."</div>";
    echo "<div class='comment_body'>".$row['content']."</div>";
    echo "<div class='timestamp'>".$row['create_time']."</div>";
    echo "<a href='#comment_form' style='color:yellowgreen' class='reply' id='".$row['comment_id']."'>Reply</a>";
    /* The following sql checks whether there's any reply for the comment */
    $q = "SELECT * FROM Comment WHERE parent_id = ".$row['comment_id']."";
    $r = mysql_query($q);
    if(mysql_num_rows($r)>0) // there is at least reply
    {
        echo "<ul>";
        while($row = mysql_fetch_assoc($r)) {
            getComments($row);
        }
        echo "</ul>";
    }
    echo "</li>";
}