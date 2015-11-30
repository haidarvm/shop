<div class="content">
  <div class="container">
  	<div class="row">
  		<div class="twelve columns">
  			<h6 style="border-top:1px solid grey;border-bottom:1px solid grey;background:#E3E3E0;font-style: italic;padding:10px;">CONTACT INFORMATION</h6>
  		</div>
  	</div>
    <div class="row">
  		<div class="two columns">
            Prefix<br/>
            <form action="<?php echo site_url()?>user/address" method="post">
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
  			Phone***<br/>
            <input class="u-full-width" name="phone" value="<?php echo isset($user) ? $user->phone : '';?>"  placeholder="Phone / Mobile Number" id="exampleEmailInput" type="text">
  		</div>
  		<div class="six columns">
  			Other Phone***<br/>
            <input class="u-full-width" name="other_phone" value="<?php echo isset($user) ? $user->other_phone : '';?>"  placeholder="Phone / Mobile Other" id="exampleEmailInput" type="text">
  		</div>
    </div>
    <div class="row">
        <div class="six columns">
  			Email***<br/>
            <input class="u-full-width" name="email" value="<?php echo isset($user) ? $user->email : '';?>"  placeholder="Your Last name here" id="exampleEmailInput" type="text">
  		</div>
    </div>
    <div class="row">
  		<div class="twelve columns">
  			<h6 style="border-top:1px solid grey;border-bottom:1px solid grey;background:#E3E3E0;font-style: italic;padding:10px;">ADDRESS</h6>
  		</div>
  	</div>
    <div class="row">
        <div class="twelve columns">
  			Street Address**<br/>
            <input class="u-full-width" name="address" value="<?php echo isset($user) ? $user->address : '';?>"  placeholder="Your Address" id="exampleEmailInput" type="text">
  		  	<input class="u-full-width" name="address2" value="<?php echo isset($user) ? $user->address2 : '';?>"  placeholder="Your Address" id="exampleEmailInput" type="text">
  		</div>
    </div>
    
    <div class="row">
        <div class="six columns">
  			City***<br/>
            <input class="u-full-width" name="city" value="<?php echo isset($user) ? $user->city : '';?>"  id="exampleEmailInput" type="text">
  		</div>
  		<div class="six columns">
  			Country***<br/>
            <input class="u-full-width" name="country" value="<?php echo isset($user) ? $user->country : '';?>"   id="exampleEmailInput" type="text">
  		</div>
    </div>
    <div class="row">
        <div class="six columns">
  			State / Province***<br/>
            <input class="u-full-width" name="state" value="<?php echo isset($user) ? $user->state : '';?>"  id="exampleEmailInput" type="text">
  		</div>
  		<div class="six columns">
  			Zip Code / Postal Code***<br/>
            <input class="u-full-width" name="zip_code" value="<?php echo isset($user) ? $user->zip_code : '';?>"   id="exampleEmailInput" type="text">
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