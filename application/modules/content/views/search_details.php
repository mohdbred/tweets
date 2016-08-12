<?php
//print_r($user_detail);
$type = '';
?>
<br>
<div class="clear"></div>
<div class="container">
    <div class="row">
        <?php if($user_detail){?>
        <div class="outer">
            <div class="inner1" style="float: left;">
                <img src="{{theme_url}}/assets/images/no_image.jpg" alt="img"/><hr>
            </div>
            <div class="inner2" style="float: left;margin-left: 100px;">
                <ul>
                    <li>
                        <h2><?php
                            switch ($user_detail->user_type_id) {
                                case 2: {
                                        $type = 'Doctor';
//                                echo 'Dr. ';
                                        break;
                                    }
                                case 3: {
                                        $type = 'Physical Trainer';
//                                echo 'PT. ';
                                        break;
                                    }
                                case 4: {
                                        $type = 'Gym Trainer';
//                                echo 'Tr. ';
                                        break;
                                    }
                                case 5: {
                                        $type = 'Mind Body';
//                                echo 'MB. ';
                                        break;
                                    }
                            }
                            echo $user_detail->first_name . ' ' . $user_detail->last_name
                            ?></h2></li>
                    <li>
                        <?php echo $type; ?>
                    </li>
                    <li><b>Company: <?php echo $user_detail->company?></b></li>
                    <li><b>Location: <?php echo $user_detail->address.' '.$user_detail->address2?></b></li>
                    <li>
                        <input type="button" value="Send Message"/>
                    </li>
                </ul>

            </div>
            <div class="inner4" style="float:right;margin-right: 100px;">
                <?php echo $user_detail->phone?>
            </div>
            <div class="inner3" style="float: right;margin-right: 450px;">
                <h3><b>Descriptions</b></h3>
                
            </div>
            



        </div>
        <?php }else{
            echo "No Users Selected to Display";
        }
?>
    </div>
</div>



