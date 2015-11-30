<div class="content">
  <div class="container">
  	<h5>CREATE AN ACCOUNT</h5>
  	<div class="row">
  		<div class="twelve columns">
  			<h6 style="border-top:1px solid grey;border-bottom:1px solid grey;background:#E3E3E0;font-style: italic;padding:10px;">PERSONAL INFORMATION</h6>
  		</div>
  	</div>
    <div class="row">
  		<div class="two columns">
            Prefix<br/>
            <form action="<?php echo site_url()?>user/register" method="post">
  			<select class="u-full-width" id="inputSize">
                <option value="Option 1">Mr</option>
                <option value="Option 2">Miss</option>
            </select>
  		</div>
  		<div class="five columns">
  			First Name**<br/>
            <input class="u-full-width" name="first_name" value="<?php echo isset($user) ? $user->first_name : '';?>" placeholder="Your First name here" id="exampleEmailInput" type="text">
  		</div>
  		<div class="five columns">
  			Last Name**<br/>
            <input class="u-full-width" name="last_name" value="<?php echo isset($user) ? $user->last_name : '';?>" placeholder="Your Last name here" id="exampleEmailInput" type="text">
  		</div>
  	</div>
    <div class="row">
        <div class="six columns">
  			Email***<br/>
            <input class="u-full-width" name="email" value="<?php echo isset($user) ? $user->email : '';?>"  placeholder="Your Last name here" id="exampleEmailInput" type="text">
  		</div>
        <div class="six columns">
  			<input type="checkbox"> Sign up to our newsletter</input><br/>
            <span style="font-size:11px;">* Signing up to our newsletter will keep you up to date with the latest offers and promotions.</span>
  		</div>
    </div>
    <div class="row">
  		<div class="twelve columns">
  			<h6 style="border-top:1px solid grey;border-bottom:1px solid grey;background:#E3E3E0;font-style: italic;padding:10px;">PASSWORD INFORMATION</h6>
  		</div>
  	</div>
    <div class="row">
        <div class="six columns">
  			Password**<br/>
            <input class="u-full-width" name="password" placeholder="Your password name here" type="password">
  		</div>
        <div class="six columns">
  			Confirm Password**<br/>
            <input class="u-full-width" name="re_password"  placeholder="Your password name here" type="password">
  		</div>
    </div>
    *** Required Fields <br/><br/>
    <div class="row">
        <div class="six columns">
            <input class="button-primary" value="Back" type="button">
  		</div>
        <div class="six columns">
            <input class="button-primary" value="Submit" type="submit">
  		</div>
  		</form>
    </div>
  </div>
</div>