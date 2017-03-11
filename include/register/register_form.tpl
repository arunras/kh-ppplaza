<div id="content">
  
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } else { ?>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="admin/view/image/setting.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <table class="form">
            <tr>
              <td><!--<span class="required">*</span>--> <?php echo $entry_url; ?></td>
              <td><input type="text" name="config_url" value="" size="40" />
                <?php if ($error_url) { ?>
                <span class="error"><?php echo $error_url; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_name; ?></td>
              <td><input type="text" name="config_name" value="" size="40" />
                <?php if ($error_name) { ?>
                <span class="error"><?php echo $error_name; ?></span>
                <?php } ?></td>
            </tr>
            
            <tr>
              <td><?php echo $entry_title; ?></td>
              <td><input type="text" name="config_title" value="" />
                <?php if ($error_title) { ?>
                <span class="error"><?php echo $error_title; ?></span>
                <?php } ?></td>
            </tr>
            
            <tr>
              <td><?php echo $entry_owner; ?></td>
              <td><input type="text" name="config_owner" value="" size="40" />
                <?php if ($error_owner) { ?>
                <span class="error"><?php echo $error_owner; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_address; ?></td>
              <td><textarea name="config_address" cols="40" rows="5"></textarea>
                <?php if ($error_address) { ?>
                <span class="error"><?php echo $error_address; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_email; ?></td>
              <td><input type="text" name="config_email" value="" size="40" />
                <?php if ($error_email) { ?>
                <span class="error"><?php echo $error_email; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_telephone; ?></td>
              <td><input type="text" name="config_telephone" value="" />
                <?php if ($error_telephone) { ?>
                <span class="error"><?php echo $error_telephone; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_fax; ?></td>
              <td><input type="text" name="config_fax" value="" /></td>
            </tr>
            
            <tr style="display: none;">
                <td><?php echo $entry_status; ?></td>
                <td>
                    <input type="text" name="status" value="2" />
                </td>
            </tr>
          </table>
        </div>
        
      </form>
    </div>
  </div>
  <?php } ?>
</div>