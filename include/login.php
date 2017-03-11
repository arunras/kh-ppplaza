<script type="text/javascript">
	function submitLogin(){
    	$('form#iformLogin').submit();
	}

	function submitSuccess(per_id){
		<?php if($_SESSION['language_selected']=='kh'){$_SESSION['language_selected']='';}?>
		window.location.href="<?php echo HTTP_DOMAIN;?>";
	}
</script>
<div id="center_detail" style="border: 0px #F00 solid; height:500px;">
<div style="border-bottom: 1px #CCC solid; font-size: 20px;margin-bottom: 30px;">Welcome to PlazaPhnomPenh - Login</div>
<div class="LOGIN">
	<table border="0" width="100%">
    	<tr>
        	<td width="40%">
                <form action="store/index.php?route=account/login" id="iformLogin" method="post"> <!--target="loginsuccess" store/index.php?route=account/login-->
                    <table border="0">
                        <tr>
                            <td><label for="email">User ID:</label></td>
                            <td><input type="text" name="email" class="textbox" value="" autofocus="autofocus"/></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" name="password" class="textbox" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right">	
                            	<!--<div class="btn_login" onclick="submitLogin();"></div>-->
                                <!--
                                <button type="button" onclick="getTime()">Login</button>
                                -->
                                <input type="submit" class="btn_login" value="" style="border:none;"/>
                            </td>
                        </tr>        
                    </table>
                </form>
    		</td>
            <td  style="border-left:1px #e3e3e3 solid;">
            	<!--
            	<div  style="margin-left: 40px; cursor: pointer;">
    				<a href="#"><img src="<?php echo HTTP_DOMAIN;?>store/image/icon/fb_connect.png" /></a>
    			</div>
                -->
                <!--
                <div class="box-content" style="margin-left: 40px;">
                    <a class="box-fbconnect-a" href="https://www.facebook.com/dialog/oauth?client_id=287911227924206&redirect_uri=http%3A%2F%2Fplazaphnompenh.com%2Fstore%2Findex.php%3Froute%3Daccount%2Ffbconnect&state=1548258b5e93528f934afdf7bb20a839&scope=email%2Cuser_birthday%2Cuser_location%2Cuser_hometown"><img src="<?php echo HTTP_DOMAIN;?>store/image/icon/fb_connect.png" /></a>
                </div>
                -->
                <div class="box-content" style="margin-left: 40px; border: none;">
                    <a class="box-fbconnect-a" href="https://www.facebook.com/dialog/oauth?client_id=287911227924206&redirect_uri=http://plazaphnompenh.com/store/index.php?route=account/fbconnect&state=1548258b5e93528f934afdf7bb20a839&scope=email,user_birthday,user_location,user_hometown"><img src="<?php echo HTTP_DOMAIN;?>store/image/icon/fb_connect.png" /></a>
                </div>
            </td>
    	</tr>
        <tr>
        	<td colspan="2">
            	<div class="moreinfo">
                	<div style="font-size:12px;">More</div>
                	<div>If you do not have an account, <a href="<?php echo HTTP_DOMAIN; ?>store/index.php?route=account/register">Register</a>.</div>
                    <div>Forgot your <a href="#">password</a>?</div>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>
<iframe id="loginsuccess" name="loginsuccess"  style="display: none;"></iframe>