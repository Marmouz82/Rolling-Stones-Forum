<?php
// request to get the last posts 
$req_posts = $db->query('SELECT * FROM posts ORDER BY post_date DESC LIMIT 3');
if (!$req_posts) {
    echo 'There is no post to display' .mysql_error();
} else {
?>

<!-- last_posts container -->
<div class="container bg-light rounded-lg mt-4 mb-2">
    <!-- last_posts header -->
    <div class="banner-aside flex row  align-items-center">
        Last Posts
    </div>
    <!-- last_posts container -->
    <div class="container-fuide d-flex flex-column py-2 ">
        <?php
        while ($post = $req_posts->fetch())
        {
        ?>
        <!-- last_posts title first_row -->
        <div class="last-posts card my-2 px-2 border-0">              
            <div class=" card-body row d-flex ">
                <!-- UNCOMMENT to active the link -->
                <!-- <a href="#" class="stretched-link"></a> -->  
                <div class="last-posts__title">
                    <?php
                        // get the topic subject 
                        $req_topics = $db->query("SELECT topic_subject FROM topics WHERE topic_id =" .  $post['post_topic']); 
                        while($topic = $req_topics->fetch()) {
                            echo $topic['topic_subject'];
                        }
                        $req_topics->closeCursor();
                    ?>
                </div>                
                <!-- last_posts text second_row -->
                <div class="last-posts__post-content text-secondary pt-1"> 
                    <?php 
                    // limit the number of characters displayed
                    echo substr($post['post_content'], 0,50);
                    ?>...
                </div>
                <!-- last_posts time-diff third_row                  -->
                <div class="last-posts__time-diff col text-secondary text-right"> 
                    <?php
                        // get the time difference converting stamptime to string 
                        $current_date = strtotime(date("Y-m-d H:i:s"));
                        $post_date = strtotime(date($post['post_date'])); 
                        $seconds_ago = ($current_date - $post_date); 
                        if ($seconds_ago >= 31536000) {
                            echo intval($seconds_ago / 31536000) . " year(s) ago";
                        } else if ($seconds_ago >= 2419200) {
                            echo intval($seconds_ago / 2419200) . " month(s) ago";
                        } else if ($seconds_ago >= 86400) {
                            echo intval($seconds_ago / 86400) . " day(s) ago";
                        } else if ($seconds_ago >= 3600) {
                            echo intval($seconds_ago / 3600) . " hour(s) ago";
                        } else if ($seconds_ago >= 60) {
                            echo intval($seconds_ago / 60) . " minute(s) ago";
                        } else {
                            echo "Less than a minute ago";
                        }
                    ?>
                </div> 
            </div>
        </div>
        <?php
        }
        $req_topics->closeCursor();
        ?>
    </div>
</div>
    
<?php
}
?>