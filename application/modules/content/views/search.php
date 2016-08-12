<?php
//$type=$content['form_name'];
//print_r($form_data);exit;
//print_r($contents);
?>
<div class="clear"></div>
<div class="container">
    <div class="row">
        <div >
            <div class="content_right" style="float:right;">

                <h3> Connect with <?php echo isset($form_data['form_name']) ? $form_data['form_name'] : '' ?> </h3>
                <p>Top Rated <?php echo isset($form_data['form_name']) ? $form_data['form_name'] : '' ?> </p>


                <?php
                if (isset($form_data) && $form_data) {

                    if ($contents) {
                        foreach ($contents as $value) {
                            ?>
                            <div class="content_image"style="float:left" >
                                <!--                    Static No Image-->
                                <img src="{{theme_url}}/assets/images/no_image.jpg" alt="img"/><hr>
                            </div>

                            <div class="content_data" style="float:right;margin-left:10px">
                                <div class="inner_content_left" style="float: left">
                                    <ul>
                                        <li><?php echo $value->first_name . ' ' . $value->last_name . '  ' . '-' . $form_data['form_name']; ?> </li>
                                        <li>Lorem Ipsum has been the industry's standard dummy text</li>
                                        <li><b>Company: <?php echo $value->company ?></b></li>
                                        <li><b>Location: <?php echo $value->address . ' ' . $value->address2; ?></b></li>
                                        <li>  Reviews(s)</li>
                                        <li>Photos:<?php echo 'Dummy' ?></li>
                                        <li><input type="checkbox" value="1" id="_business">Verified Business</input></li>
                                    </ul>     
                                </div>
                                <div class="inner_content_right" style="float: right;margin-left: 20px">
                                    <img src="{{theme_url}}/assets/images/success.png" alt="img"/>Loreum Ipsum
                                    <br><br><br>
                                   <a href="<?php echo site_url('content/home/searchResult/'.$value->id) ?>"><input type="button" id="_view" value="View Listing"/></a><br>
                                    <a href="#"><input type="button" id="_contact" value="Contact"/></a>


                                </div>

                            </div>
                            <div class="clear"></div>
                            <?php
                        }
                    } else {
                        echo "No contents found related to your search";
                    }
                } else {
                    echo "No contents selected to Search.";
                }
                ?>
            </div>


        </div>
    </div>
</div>