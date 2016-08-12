<div class="inner-wrap">
    <div>
        
    </div>
    
    
    
    <div class="row">        
        <div class="col-sm-6">
            <h4>CONTACT US</h4>
            <div>
                <div>Address:</div>
                <div>Test Address</div>
            </div>
        </div> 
        
        <div class="col-sm-6">
            <?php echo $this->session->flashdata('message'); ?>
            <?php echo form_open(); ?>
            <div class="row">
                <h4>Have a Question, Seggestion, or Feedback?</h4>
                <div class="form-group">
                    <span class="input-icon">
                         <?php echo form_input(array('id' => 'name', 'name' => 'name', 'placeholder' => 'Name', 'class' => 'form-control', 'value' => set_value('name'))); ?>
                         <?php echo form_error('name');?>
                     </span>
                 </div>
                <div class="form-group">
                    <span class="input-icon">
                         <?php echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'value' => set_value('email'))); ?>
                         <?php echo form_error('email');?>
                     </span>
                 </div>
                 <div  class="form-group">
                      <span class="input-icon">
                         <?php echo form_input(array('id' => 'subject', 'name' => 'subject', 'placeholder' => 'Subject' , 'class' => 'form-control', 'value' => set_value('subject'))); ?>                             
                         <?php echo form_error('subject');?>
                     </span>
                 </div>
                 <div class="form-group">
                        <?php echo form_textarea(array('name'=>'message','id'=>'message','class' => 'form-control','placeholder' => 'Type Your Message'));?>
                 </div>

                 <div class="button-set">
                     <?php // echo form_label('&nbsp;', '') ?>
                     <?php echo form_submit('submitForm', 'Send', 'class="btn btn-primary"', 'id="send"'); ?>
                 </div>
            </div>            
        </div>  
    </div>
</div>