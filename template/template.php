<?php

function display()
{
    global $post;
    global $DB;

    echo "
           <link rel='stylesheet' href='".get_home_url()."/wp-content/plugins/makeArtCourse/css/style.css'>
           <script src='".get_home_url()."/wp-content/plugins/makeArtCourse/js/app.js'></script>
           <script>
                var url = '". get_home_url()."/wp-content/plugins/makeArtCourse/api/saveArtCost.php';
                var postID = ".$post->ID.";
           </script>
           <div class='meta-art-cost'>
               <label>Giá tiền(VNĐ): </label>
               <input id='art-cost-input' type='number' name='art-cost' value='" . $DB->geArtCost($post->ID) . "' >
               <button class='art-cost-save' onclick='save_art_cost(url, postID)'>Lưu</button>
               <span class='save-art-cost-state'></span>
           </div>       
         ";
}