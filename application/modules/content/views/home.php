<?php
//print_r($amenities);
//exit;
?>

<div class="tab-section">
    <div class="tab-section-in">
        <div class="container-1">
            <div class="heading">
                <h1 class="main-heading">Social Media Health and Wellness Directory</h1> 
                <h3 class="sub-heading">
                    <ul>
                        <li>Doctors </li>
                        <li></i>Therapist</li>
                        <li></i>Fitness Centers-Personal Trainers </li>

                        <li></i>Chiropractic</li>
                        <li></i>Dentist</li>
                        <li>Wellness-Beauty</li>

                    </ul></h3>
                <a class="click-link" href="#">click below<img src="{{ theme_url }}/assets/images/down-arrow.png" alt=""/></a>
            </div>

            <div class="row">
                <div class="tabs-bg tab-wrap">                                   
                    <ul class="directory-tabs tab-inner">
                        <li class="tab"><div class="col-sm-3">
                                <div class="tab-cont">
                                    <a href="tab-1">
                                        <div class="image"><img src="{{ theme_url }}/assets/images/tab-img1.png" alt=""/></div>
                                        <h4>Doctors</h4>
                                    </a>
                                </div>
                            </div></li>
                        <li class="tab"><div class="col-sm-3">
                                <div class="tab-cont">
                                    <a href="tab-2">
                                        <div class="image"><img src="{{ theme_url }}/assets/images/tab-img2.png" alt=""/></div>
                                        <h4>Physical Therapist</h4>
                                    </a>
                                </div>
                            </div></li>
                        <li class="tab"><div class="col-sm-3">
                                <div class="tab-cont">
                                    <a href="tab-3">
                                        <div class="image"><img src="{{ theme_url }}/assets/images/tab-img3.png" alt=""/></div>
                                        <h4>Fitness-Personal Trainers</h4>
                                    </a>
                                </div>
                            </div></li>
                        <li class="tab"><div class="col-sm-3">
                                <div class="tab-cont">
                                    <a href="tab-4">
                                        <div class="image"><img src="{{ theme_url }}/assets/images/tab-img4.png" alt=""/></div>
                                        <h4>Wellness-Beauty</h4>
                                    </a>
                                </div>
                            </div></li>                                        
                    </ul> 
                    <div id="tab-1" class="tab-content">
                        <form class="tab-form" action="{{base_url}}/index.php/content/home/search" method="post">
                            <input type="hidden" value="Doctor" name="form_name"/>
                            <input type="hidden" value=<?php echo $DOCTOR_ID ?> name="form_id"/>
                            <ul>
                                <li class="company">
                                    <input class="form-control" type="text" value="" placeholder="Company" name="company"/></li>
                                <li class="specialties"><span class="span-select">
                                        <select class="form-control " name="specialties">
                                            <option value="" name="Select">All Specialties</option>
                                            <?php
                                            foreach ($dr_specialties as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="conditions"><span class="span-select">
                                        <select class="form-control" name="conditions">
                                            <option value="" name="Select">All Conditions Treated</option>
                                            <?php
                                            foreach ($conditions as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="procedures"><span class="span-select">
                                        <select class="form-control" name="procedures">
                                            <option value="" name="Select">All Procedures Performed</option>
                                            <?php
                                            foreach ($procedures as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="city"><span class="span-select">
                                        <select class="form-control" name="city">
                                            <option value="" name="Select">City</option>
                                            <?php
                                            foreach ($city as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="state"><span class="span-select">
                                        <select class="form-control" name="state">
                                            <option value="" name="Select">State</option>
                                            <?php
                                            foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="zip-code"><input name="zip-code" class="form-control" type="text" value="" placeholder="ZIP code"/></li>
                                <li class="insurance"><input name="insurance" class="form-control" type="text" value="" placeholder="Insurance"/></li>
                                <li><button type="submit" class="search-btn btn btn-1c">Search</button></li>
                            </ul>
                        </form>
                    </div>
                    <div id="tab-2" class="tab-content">
                        <form class="tab-form" action="{{base_url}}/index.php/content/home/search" method="post">
                            <input type="hidden" value="Physical Therapist" name="form_name"/>
                            <input type="hidden" value=<?php echo $THERAPIST_ID ?> name="form_id"/>
                            <ul>
                                <li class="compny"><input class="form-control" type="text" value="" placeholder="Company" name="company"/></li>
                                <li class="therapist"><span class="span-select">
                                        <select class="form-control " name="type">
                                             <option value="" name="Select">Type of Therapist</option>
                                            <?php
                                            foreach ($therapist_type as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="speciality"><span class="span-select">
                                        <select class="form-control" name="speciality">
                                             <option value="" name="Select">Speciality</option>
                                            <?php
                                            foreach ($therapist_amenities as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>                                            
                                <li class="ciyt"><span class="span-select">
                                        <select class="form-control" name="city">
                                             <option value="" name="Select">City</option>
                                            <?php
                                            foreach ($city as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="state"><span class="span-select">
                                        <select class="form-control" name="state">
                                             <option value="" name="Select">State</option>
                                            <?php
                                            foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="zip-code"><input  name="zip-code" class="form-control" type="text" value="" placeholder="ZIP Code"/></li>
                                <li class="insurance"><input  name="insurance" class="form-control" type="text" value="" placeholder="Insurance"/></li>
                                <li><button type="submit" class="search-btn btn btn-1c">Search</button></li>
                            </ul>
                        </form>
                    </div>
                    <div id="tab-3" class="tab-content">
                        <form class="tab-form" action="{{base_url}}/index.php/content/home/search" method="post">
                            <input type="hidden" value="Personal_Trainer" name="form_name"/>
                            <input type="hidden" value=<?php echo $GYM_ID ?> name="form_id"/>
                            <ul>
                                <li class="compny"><input class="form-control" type="text" value="" placeholder="Company" name="company"/></li>
                                <li class="gym"><span class="span-select">
                                        <select class="form-control " name="type">
                                             <option value="" name="Select">Type of Gym</option>
                                            <?php
                                            foreach ($gym_type as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="amenities"><span class="span-select">
                                        <select class="form-control" name="amenities">
                                             <option value="" name="Select">Amenities</option>
                                            <?php
                                            foreach ($gym_amenities as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>                                            
                                <li class="ciyt"><span class="span-select">
                                        <select class="form-control" name="city">
                                             <option value="" name="Select">City</option>
                                            <?php
                                            foreach ($city as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="state"><span class="span-select">
                                        <select class="form-control" name="state">
                                             <option value="" name="Select">State</option>
                                            <?php
                                            foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="zip-code"><input  name="zip-code" class="form-control" type="text" value="" placeholder="ZIP code"/></li>
                                <li class="insurance"><input  name="insurance" class="form-control" type="text" value="" placeholder="Insurance"/></li>
                                <li><button type="submit" class="search-btn btn btn-1c">Search</button></li>
                            </ul>
                        </form>
                    </div>
                    <div id="tab-4" class="tab-content">
                        <form class="tab-form" action="{{base_url}}/index.php/content/home/search" method="post">
                            <input type="hidden" value="Wellness Beauty" name="form_name"/>
                            <input type="hidden" value=<?php echo $MIND_BODY_ID ?> name="form_id"/>
                            <ul>
                                <li class="compny"><input class="form-control" type="text" value="" placeholder="Company" name="company"/></li>
                                <li class="wellness"><span class="span-select">
                                        <select class="form-control " name="type">
                                             <option value="" name="Select">Type of Wellness</option>
                                            <?php
                                            foreach ($mind_body_type as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="amenities"><span class="span-select">
                                        <select class="form-control" name="amenities">
                                             <option value="" name="Select">Amenities</option>
                                            <?php
                                            foreach ($mind_body_amenities as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>                                          
                                <li class="ciyt"><span class="span-select">
                                        <select class="form-control" name="city">
                                             <option value="" name="Select">City</option>
                                            <?php
                                            foreach ($city as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="state"><span class="span-select">
                                        <select class="form-control" name="state">
                                             <option value="" name="Select">State</option>
                                            <?php
                                            foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value->id ?>" name="<?php echo $value->name ?>" ><?php echo $value->name ?></option>
                                            <?php } ?>
                                        </select></span></li>
                                <li class="zip-code"><input name="zip-code" class="form-control" type="text" value="" placeholder="ZIP code"/></li>
                                <li class="insurance"><input  name="insurance" class="form-control" type="text" value="" placeholder="Insurance"/></li>
                                <li><button type="submit" class="search-btn btn btn-1c">Search</button></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>                                                        
        </div>
    </div>                    
</div>

<!-- Banner Start-->
<div class="banner-wrap">
    <div class="banner">
        <?php foreach ($gallery['banner'] as $val) { ?>    
            <div class="item">
                <iframe width="100%" height="400" src="<?php echo $val['video_url'] ?>"></iframe>
                <div class="banner-text">
                    <h3><?php echo $val['title']; ?></h3>
    <!--                <p><span style="font-size:28px;"><strong></strong></span></p>
                    <p>&nbsp;</p>-->
                </div>
            </div>
        <?php } ?>  
    </div>
</div>
<!-- Banner End-->


<!--  Features Start-->
<div class="feature-wrap">
    <div class="container">
        <div class="feature-headings">
            <h2 class="sub-head">Features</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut<br>
                et dolore magna aliqua. Ut enim ad minim veniam</p></div>
        <div class="feature-detail">
            <ul>
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/trainer.png" alt="trainer"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Fitness Center-<br>Personal Trainer</a></div>

                </li>
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">                                            
                            <img src="{{ theme_url }}/assets/images/physical-thypist.png" alt="thypist"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Physical Therapist<br>Occupational Therapy <br>Speech Therapy</a></div>

                </li>
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/doctor.png" alt="doctor"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Doctors</a></div>

                </li>
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/rehab.png" alt="rehab"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Chiropractitioner</a></div>

                </li> 
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/denist.png" alt="dentist"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Dentistry</a></div>
                </li>
                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/insurance.png" alt="insurance"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Insurance</a></div>

                </li> 
                <li>
                    <div class="feature-image">
                        <a class="hi-icon medical population" href="#">
                            <img src="{{ theme_url }}/assets/images/population.png" alt="population"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Special Population </a></div>                                    
                </li>                           

                <li>
                    <div class="feature-image">
                        <a class="hi-icon" href="#">
                            <img src="{{ theme_url }}/assets/images/behavioral-mdeication.png" alt="behavioral medication"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Behavior Modification</a></div>

                </li> 

                <li>
                    <div class="feature-image">
                        <a class="hi-icon medical" href="#">
                            <img src="{{ theme_url }}/assets/images/medical.png" alt="lorem dolor"/>
                        </a>
                    </div>
                    <div class="feature-name"><a href="#">Lorem Ipsum</a></div>

                </li> 
                <li>
                    <div class="feature-image">
                        <a class="hi-icon medical" href="#">
                            <img src="{{ theme_url }}/assets/images/medical.png" alt="lorem dolor"/>
                        </a>
                    </div>
                    <div class="feature-name"><a  href="#">Lorem Ipsum</a></div>

                </li> 

            </ul>
        </div>
    </div>
</div>
<!-- Features End -->



<!-- Featured Videos Start -->
<div class="feature-video-wrp">
    <div class="container">
        <div class="feature-headings">
            <h2 class="sub-head">Featured Videos</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut<br/>et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
        <div class="feature-video">
            <?php
            if (!empty($gallery['featured'])) {
                foreach ($gallery['featured'] as $val) {
                    ?>
                    <div class="video">
                        <iframe width="100%" height="200" src="<?php echo $val['video_url']; ?>"></iframe>
                    </div>
                    <?php
                }
            } else {
                ?>
                <h2>No videos found!</h2><?php }
            ?>
        </div>
    </div>   
</div>   




