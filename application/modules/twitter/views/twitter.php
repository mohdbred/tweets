<?php 
// error_reporting(0);
?>
<div class="container">
    <div class="box" style="min-height:450px;">

			<div class="col-md-6" style="width:38%">

                    <h3><?php echo 'Enter Celebrity @Tweet Name'; ?></h3>

                    <?php echo form_open(null, 'id="celebrity_form"'); ?>
                    	
                    	<div class="field_spacing">

                    			<!-- For Error output -->
    							<?php echo (validation_errors());?>
                        	<div class="label"><?php echo form_label('<span class="required">*</span> Tweet Name:', 'tweet_name'); ?></div>
                        	<div class="text"> <?php echo form_input(array('id' => 'tweet_name', 'name' => 'tweet_name', 'placeholder' => '@Tweet',)); ?></div>
                    	</div>

                <div class="clear"></div>

                    <?php echo form_close(); ?>

             		<div class="buttons">
                      	<a class="button" href="#" id="submit" onClick="$('#celebrity_form').submit()"><span>Submit</span></a>
                    </div>
           	</div>	


		<div class="col-md-6" style="margin-left:11%;width:50%">
			
			<h3>Tweets List</h3>
                        <ul id="list" class="tweet_list">
                        	
			<?php if(!empty($tweets_error)){

				echo '<div class="twitter-bubble">';
				echo $tweets_error;
				echo '</div>';
			}

			else if(!empty($results)){

				
				?>
				 
                            <?php
                            if ($results) {
                                foreach ($results as $value) {
                                    ?>

                                    <li>
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;
                                             <div class="twitter-bubble">
												<?php print_r($value->content); ?>
											 </div>
                                        </span>
                                    </li>

                                    <?php
                                }
                            }
                            ?>
                        </ul>

                        <div id="pagination">
							<ul class="tsc_pagination">

							<!-- Show pagination links -->
							<?php foreach ($links as $link) {
							echo "<li>". $link."</li>";
							} ?>
							</ul>
						</div>

<?php 
			}
			else{
				if(empty($tweets_error))
					echo 'No tweets to Show';
			}

			?>

		</div>


		</div>
	</div>
</div>
