<?php $arr_hrs = array('00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23');?>

<div class="page-wrap">
		<div class="box-header">
		  <h3 class="box-title">Update Provider Details</h3>
		</div><!-- /.box-header -->
		<p><?php echo $this->Session->flash();?></p>
		<div class="form-area" style="width: 95%;">	
			<section class="content">
				  <div class="row">
					<div class='box box-info'>
							<?php
							echo $this->Form->create("provider", array('url'=>array('controller' =>'providers', 'action' => 'edit','plugin'=>'admin'),'id'=>'provider','enctype'=>'multipart/form-data'));
							?> 
							 <input type="hidden" id="id" name="id" value="<?php echo $providerdata[0]['Provider']['id'];?>">
							 <input type="hidden"  name="pageNo" value="<?php echo $pageNo;?>">
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Title<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="page_title" placeholder="Name" name="name" required="required"  value="<?php echo $providerdata[0]['Provider']['name'];?>">
							</div>							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Branch Name<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" required="required" value="<?php echo $providerdata[0]['Provider']['branch_name'];?>" >
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Menu Types<span class="requiredspn">*</span>(Press CTRL+click to select multiple menu types)</label>
							  <select name="menus[]" class="form-control" multiple="multiple" required="required">
							  <optgroup label="Select Menus">
							  <?php
								foreach($optionmenu as $menuname=>$menuid){
							  ?>
							  <option value="<?php echo $menuid;?>" <?php echo (in_array($menuid,explode(',',$providerdata[0]['Provider']['menus']))?'selected="selected"':'');?>><?php echo $menuname;?></option>
							  <?php }?>
							  </optgroup>
							  </select>
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputType">Provider Type<span class="requiredspn">*</span> </label>
							  <select name="provider_type" class="form-control"  required="required" >
							  <option value=''>Choose Provider Type</option>
							  <?php
							  foreach($optionprovidertype as $typename=>$typeid){
							  ?>
							  <option value="<?php echo $typeid;?>"  <?php echo ($typeid==$providerdata[0]['Provider']['provider_type'])?'selected="selected"':'';?>><?php echo $typename;?></option>
							  <?php }?>
							  </optgroup>
							  </select>
							</div>
							<!--<div class='box-body pad'>
							  <label for="exampleInputType">Provider Services</label>
							  <select name="services[]" class="form-control" multiple="multiple" >
							  <optgroup label="Select Services">
							  <?php
							   //foreach($optionproviderservice as $servicename=>$serviceid){
							  ?>
							  <option value="<?php //echo $serviceid;?>" <?php //echo (in_array($serviceid,explode(',',$providerdata[0]['Provider']['services']))?'selected="selected"':'');?>><?php //echo $servicename;?></option>
							  <?php //}?>
							  </optgroup>
							  </select>
							</div>-->
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Cuisine<span class="requiredspn">*</span></label></br>
							  <textarea  id="cuisine" name="cuisine"  rows="4" cols="100"  required="required"><?php echo $providerdata[0]['Provider']['cuisine'];?></textarea>
							</div>
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Customer Type&nbsp;:&nbsp;</label>
							 <input type="radio" name="customer_type" value="Y" <?php echo ($providerdata[0]['Provider']['customer_type']=='Y'?'checked="checked"':''); ?>> Partner&nbsp;



							 <input type="radio" name="customer_type" value="N" <?php echo ($providerdata[0]['Provider']['customer_type']=='N'?'checked="checked"':''); ?> > Non Partner
							</div>

							<div class='box-body pad'>
								<label for="exampleInputDescription">Top Provider&nbsp;:&nbsp;</label>
								<?php
									$top_provider =  $providerdata[0]['Provider']['top_provider'];
									$checked = ($top_provider == "Y") ? 'checked' : '';
								?>
								<input type="checkbox"  id="top_provider"  name="top_provider" <?php echo $checked; ?> >

							</div>
							
							
							<div class='box-body pad'>
							  <label for="exampleInputType">Reservation Availability&nbsp;:&nbsp;</label>
							 <input type="radio" name="reservation_availability" value="Y" <?php echo ($providerdata[0]['Provider']['reservation_availability']=='Y'?'checked="checked"':''); ?>> Yes&nbsp;
							 <input type="radio" name="reservation_availability"  <?php echo ($providerdata[0]['Provider']['reservation_availability']=='N'?'checked="checked"':''); ?> value="N" > No
							</div>
								
							<div class='box-body pad'>
							  <label for="exampleInputType">Home Delivery&nbsp;:&nbsp;</label>
							 <input type="radio" name="home_delivery" value="Y" <?php echo ($providerdata[0]['Provider']['home_delivery']=='Y'?'checked="checked"':''); ?>> Yes&nbsp;
							 <input type="radio" name="home_delivery" <?php echo ($providerdata[0]['Provider']['home_delivery']=='N'?'checked="checked"':''); ?> value="N" > No
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputType">Eat On Site&nbsp;:&nbsp;</label>
							 <input type="radio" name="eat_on_site" <?php echo ($providerdata[0]['Provider']['eat_on_site']=='Y'?'checked="checked"':''); ?> value="Y" checked="checked"> Yes&nbsp;
							 <input type="radio" name="eat_on_site" <?php echo ($providerdata[0]['Provider']['eat_on_site']=='N'?'checked="checked"':''); ?> value="N" > No
							</div>


							<div class='box-body pad'>

							  <label for="exampleInputType">
							  Take away&nbsp;:&nbsp;</label>
							 <input type="radio" name="take_away" <?php echo ($providerdata[0]['Provider']['take_away']=='Y'?'checked="checked"':''); ?> value="Y" checked="checked"> Yes&nbsp;
							 <input type="radio" name="take_away" <?php echo ($providerdata[0]['Provider']['take_away']=='N'?'checked="checked"':''); ?> value="N" > No
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputOpening">Opening/Closing Hours</label></br>
							  <?php
							  $day_arr = array('1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday');
							  ?>
							  <table class = "table">

								<thead>
									<tr>
										<th>Day</th>
										<th>Opening Hours</th>
										<th>Closing Hours</th>
									</tr>
								</thead>

								<tbody>
								<?php 
								
								$opening_hours = unserialize($providerdata[0]['Provider']['opening_hours']);
								$closing_hours =  unserialize($providerdata[0]['Provider']['closing_hours']);
								
								
								for($i=1;$i<=7;$i++){
								$openhr = explode(":",$opening_hours[$i]);
								$openhr1= ($openhr[0]!=''?$openhr[0]:'00');
								$openhr2= ($openhr[1]!=''?$openhr[1]:'00');
								
								$closehr = explode(":",$closing_hours[$i]);
								$closehr1= ($closehr[0]!=''?$closehr[0]:'00');
								$closehr2= ($closehr[1]!=''?$closehr[1]:'00');
								
								?>
							<tr>
										<td><?php echo $day_arr[$i];?></td>
										<td> 
											<select name="opening_hours1[<?php echo $i?>]">
											<?php foreach($arr_hrs as $hrs){?>
											<option value="<?php echo $hrs;?>" <?php echo ($hrs==$openhr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
											<?php } ?>
											</select>&nbsp;&nbsp;
											<select name="opening_hours2[<?php echo $i?>]">
											<option value="00" <?php echo ($openhr2=='00'?'selected="selected"':'')?>>00</option>
											<option value="15" <?php echo ($openhr2=='15'?'selected="selected"':'')?>>15</option>
											<option value="30" <?php echo ($openhr2=='30'?'selected="selected"':'')?>>30</option>
											<option value="45" <?php echo ($openhr2=='45'?'selected="selected"':'')?>>45</option>
											</select> HRS.
										</td>
							
								<td>
										<select name="closing_hours1[<?php echo $i?>]">
										 <?php foreach($arr_hrs as $hrs){?>
										 <option value="<?php echo $hrs;?>" <?php echo ($hrs==$closehr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
										 <?php } ?>
										 </select>&nbsp;&nbsp;
										 <select name="closing_hours2[<?php echo $i?>]">
										 <option value="00" <?php echo ($closehr2=='00'?'selected="selected"':'')?>>00</option>
										 <option value="15" <?php echo ($closehr2=='15'?'selected="selected"':'')?>>15</option>
										 <option value="30" <?php echo ($closehr2=='30'?'selected="selected"':'')?>>30</option>
										 <option value="45" <?php echo ($closehr2=='45'?'selected="selected"':'')?>>45</option>
										 </select> HRS.
								</td>
							</tr>
							<?php }?>

								</tbody>

								</table>
							</div>
							
							
							
							
							
							
							
							<div class='box-body pad'>
							  <label for="exampleInputOpening">Happy Opening/Closing Hours</label></br>
							  <table class = "table">

								<thead>
									<tr>
										<th>Day</th>
										<th>Opening Hours</th>
										<th>Closing Hours</th>
									</tr>
								</thead>

								<tbody>
									<?php 
									
									$opening_hours = unserialize($providerdata[0]['Provider']['happy_hours_start']);
									$closing_hours =  unserialize($providerdata[0]['Provider']['happy_hours_end']);
									
									
									for($i=1;$i<=7;$i++){
									$openhr = explode(":",$opening_hours[$i]);
									$openhr1= ($openhr[0]!=''?$openhr[0]:'00');
									$openhr2= ($openhr[1]!=''?$openhr[1]:'00');
									
									$closehr = explode(":",$closing_hours[$i]);
									$closehr1= ($closehr[0]!=''?$closehr[0]:'00');
									$closehr2= ($closehr[1]!=''?$closehr[1]:'00');
									
									?>
									<tr>
										<td><?php echo $day_arr[$i];?></td>
										<td> 
											<select name="happy_opening_hours1[<?php echo $i?>]">
											<?php foreach($arr_hrs as $hrs){?>
											<option value="<?php echo $hrs;?>" <?php echo ($hrs==$openhr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
											<?php } ?>
											</select>&nbsp;&nbsp;
											<select name="happy_opening_hours2[<?php echo $i?>]">
											<option value="00" <?php echo ($openhr2=='00'?'selected="selected"':'')?>>00</option>
											<option value="15" <?php echo ($openhr2=='15'?'selected="selected"':'')?>>15</option>
											<option value="30" <?php echo ($openhr2=='30'?'selected="selected"':'')?>>30</option>
											<option value="45" <?php echo ($openhr2=='45'?'selected="selected"':'')?>>45</option>
											</select> HRS.
										</td>
							
									<td>
										<select name="happy_closing_hours1[<?php echo $i?>]">
										 <?php foreach($arr_hrs as $hrs){?>
										 <option value="<?php echo $hrs;?>" <?php echo ($hrs==$closehr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
										 <?php } ?>
										 </select>&nbsp;&nbsp;
										 <select name="happy_closing_hours2[<?php echo $i?>]">
										 <option value="00" <?php echo ($closehr2=='00'?'selected="selected"':'')?>>00</option>
										 <option value="15" <?php echo ($closehr2=='15'?'selected="selected"':'')?>>15</option>
										 <option value="30" <?php echo ($closehr2=='30'?'selected="selected"':'')?>>30</option>
										 <option value="45" <?php echo ($closehr2=='45'?'selected="selected"':'')?>>45</option>
										 </select> HRS.
									</td>
							</tr>
							<?php }?>

								</tbody>

								</table>
							</div>

							<!-- kitchen hours -->
							<div class='box-body pad'>
							  <label for="exampleInputOpening">Kitchen Opening/Closing Hours</label></br>
							  <table class = "table">

								<thead>
									<tr>
										<th>Day</th>
										<th>Opening Hours</th>
										<th>Closing Hours</th>
									</tr>
								</thead>

								<tbody>
									<?php 
									
									$opening_hours = unserialize($providerdata[0]['Provider']['kitchen_hours_start']);
									$closing_hours =  unserialize($providerdata[0]['Provider']['kitchen_hours_end']);
									
									
									for($i=1;$i<=7;$i++){
									$openhr = explode(":",$opening_hours[$i]);
									$openhr1= ($openhr[0]!=''?$openhr[0]:'00');
									$openhr2= ($openhr[1]!=''?$openhr[1]:'00');
									
									$closehr = explode(":",$closing_hours[$i]);
									$closehr1= ($closehr[0]!=''?$closehr[0]:'00');
									$closehr2= ($closehr[1]!=''?$closehr[1]:'00');
									
									?>
									<tr>
										<td><?php echo $day_arr[$i];?></td>
										<td> 
											<select name="kitchen_opening_hours1[<?php echo $i?>]">
											<?php foreach($arr_hrs as $hrs){?>
											<option value="<?php echo $hrs;?>" <?php echo ($hrs==$openhr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
											<?php } ?>
											</select>&nbsp;&nbsp;
											<select name="kitchen_opening_hours2[<?php echo $i?>]">
											<option value="00" <?php echo ($openhr2=='00'?'selected="selected"':'')?>>00</option>
											<option value="15" <?php echo ($openhr2=='15'?'selected="selected"':'')?>>15</option>
											<option value="30" <?php echo ($openhr2=='30'?'selected="selected"':'')?>>30</option>
											<option value="45" <?php echo ($openhr2=='45'?'selected="selected"':'')?>>45</option>
											</select> HRS.
										</td>
							
									<td>
										<select name="kitchen_closing_hours1[<?php echo $i?>]">
										 <?php foreach($arr_hrs as $hrs){?>
										 <option value="<?php echo $hrs;?>" <?php echo ($hrs==$closehr1?'selected="selected"':'')?>><?php echo $hrs;?></option>
										 <?php } ?>
										 </select>&nbsp;&nbsp;
										 <select name="kitchen_closing_hours2[<?php echo $i?>]">
										 <option value="00" <?php echo ($closehr2=='00'?'selected="selected"':'')?>>00</option>
										 <option value="15" <?php echo ($closehr2=='15'?'selected="selected"':'')?>>15</option>
										 <option value="30" <?php echo ($closehr2=='30'?'selected="selected"':'')?>>30</option>
										 <option value="45" <?php echo ($closehr2=='45'?'selected="selected"':'')?>>45</option>
										 </select> HRS.
									</td>
							</tr>
							<?php }?>

								</tbody>

								</table>
							</div>
							
							
							
							
							
							<div class='box-body pad'>
								<label for="exampleInputPassword1">Description</label>
								<textarea id="editor1" name="description" rows="10" cols="80"  placeholder="Description"><?php echo $providerdata[0]['Provider']['description'];?></textarea>
							</div>
							
							
							<div class='box-body pad'>
								<label for="exampleInputDescription">Quick Search Keywords<span class="requiredspn">*</span> [Separate each search keyword by coma (,) e.g: Thai,Maxican ]</label></br>
								<textarea id="keywords" name="keywords" rows="4" cols="100" required="required"  placeholder="Quick search keywords"><?php echo $providerdata[0]['Provider']['keywords'];?></textarea>
							</div>

							

							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Email Address<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" required="required" value="<?php echo $providerdata[0]['Provider']['email'];?>" >
							</div>
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Phone Number<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $providerdata[0]['Provider']['phone'];?>" required="required">
							</div>
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Mobile<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile"  value="<?php echo $providerdata[0]['Provider']['mobile'];?>" required="required">
							</div>
							<div class='box-body pad'>
							  <label for="exampleInputPaypal">Paypal Business Email</label>
							  <input type="text" class="form-control" id="paypal_business_email" placeholder="Paypal Business Email" name="paypal_business_email"  value="<?php echo $providerdata[0]['Provider']['paypal_business_email'];?>" >
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Address Line 1<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="address_line1" placeholder="Address Line 1" name="address_line1" required="required" value="<?php echo $providerdata[0]['Provider']['address_line1'];?>" required="required">
							</div>								
							<div class='box-body pad' style="display:none">
							  <label for="exampleInputEmail1">Address Line 2</label>
							  <input type="text" class="form-control" id="address_line2" placeholder="Address Line 2" name="address_line2" value="<?php echo $providerdata[0]['Provider']['address_line2'];?>" >
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">Country<span class="requiredspn">*</span></label>
							  <?php echo $this->Form->input('country_id',array('class'=> 'form-control', 'id'=>'country_id','options' => $optioncountry,'empty' =>'Select Country','autofocus'=>true,'required'=>true,'selected' => $providerdata[0]['Provider']['country_id'], 'onChange'=>'javascript:changestate(this.value);', 'label'=>false)); ?> 
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">State<span class="requiredspn">*</span></label>
							 <div  id="statedivid">
								<?php echo $this->Form->input('state_id',array('class'=> 'form-control', 'id'=>'state_id','options'=>$optionstate,'empty' =>'Select State','autofocus'=>true,'required'=>true,'selected' => $providerdata[0]['Provider']['state_id'],'onChange'=>'javascript:changecity(this.value);', 'label'=>false)); ?> 
								</div>
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputEmail1">City<span class="requiredspn">*</span></label>
								<div  id="">
								<?php echo $this->Form->input('city_id',array('class'=> 'form-control', 'id'=>'citydivid','options'=>$optioncity,'empty' =>'Select City','selected' => $providerdata[0]['Provider']['city_id'],'autofocus'=>true,'required'=>true, 'label'=>false)); ?> 
								</div>
							</div>	
							
														
							<div class='box-body pad'>
							  <label for="exampleInputZipcode">Zipcode<span class="requiredspn">*</span></label>
							  <input type="text" class="form-control" id="zipcode" placeholder="Zipcode" name="zipcode" value="<?php echo $providerdata[0]['Provider']['zipcode'];?>" required="required" >
							</div>
							
							<div class='box-body pad'>
							<?php
							/* echo "<pre>";
							print_r($providerdata);
							echo "</pre>"; */
							?>
							<input type="hidden" name="latitude" id="latitude">
							<input type="hidden" name="longitude" id="longitude">
							  <div id="mapCanvas" ></div>
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputZipcode">Area</label>
							  <input type="text" class="form-control" id="area" placeholder="Area" name="area" value="<?php echo $providerdata[0]['Provider']['area'];?>" >
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputDeliveryDistance">Maximum Delivery distance covered  (KM)</label>
							  <input type="text" class="form-control" id="delivery_distance" placeholder="Delivery distance" name="delivery_distance"  value="<?php echo $providerdata[0]['Provider']['delivery_distance'];?>">
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputDeliveryCharge">Delivery Charge</label>
							  <input type="text" class="form-control" id="delivery_charge" placeholder="Delivery Charge" name="delivery_charge"  value="<?php echo $providerdata[0]['Provider']['delivery_charge'];?>">
							</div>
							
							
							<div class='box-body pad'>
							  <label for="exampleInputZipcode">Currency<span class="requiredspn">*</span></label>
							  <?php 
							  echo $this->Form->input('currency',array(
							  	'class'=> 'form-control',
							  	'id'=>'citydivid',
							  	'options'=>$currencies,
							  	'empty' =>'Select Currency',
							  	'autofocus'=>true,
							  	'required'=>true, 
							  	'label'=>false,
								'default'=>$providerdata[0]['Provider']['currency_id']
								)); 
							  	?> 
							</div>
							
							<div class='box-body pad'>
							  <label for="exampleInputZipcode">Expence Type</label>
							  <?php 
							  echo $this->Form->input('expence_type',array(
							  	'class'=> 'form-control',
							  	'options'=>array('low'=>'Low','medium'=>'Medium','high'=>'High'),
							  	'autofocus'=>true,
							  	'required'=>true, 
							  	'label'=>false,
								'default'=>$providerdata[0]['Provider']['expence_type']
								)); 
							  	?> 
							</div>
							
							<div class='box-body pad'>
							<label for="exampleInputProfile">Profile Picture</label>
							  <input  type="file"  name="profile_img" id="profile_img"   />
							<?php
							echo "<br>";
							if($providerdata[0]['Provider']['profile_img']!=""){ ?>
							<img src="<?php echo $this->webroot ?>uploaded/providerfiles/<?php echo $providerdata[0]['Provider']['profile_img']; ?>" height="50" width="50" border="0" > 
							<?php } ?>
							</div>
							
							<div id="formdiv box-body pad" class="multiBannerUpload" style="padding: 40px 20px;" >
								<label for="exampleInputBannerImages"> Banner Image Upload Up to 7</label>
								<div style="clear:both;"></div>
								<?php
								$imgcount = 8;
								foreach($providerimages as $proimage){
								?>
								<div id="filediv" ><div class="abcd" id="abcd<?php echo $imgcount ;?>">
								<img src="<?php echo $this->webroot;?>uploaded/userprofile/<?php echo $proimage['UserPicture']['picture'];?>" height="50" width="50">
								<img id="img" src="<?php echo $this->webroot;?>images/x.png" alt="delete" class="classImg" data-id="<?php echo $proimage['UserPicture']['id']; ?>" data-parentdivid="abcd<?php echo $imgcount ;?>" style="cursor: pointer;"></div></div>
								<?php $imgcount ++; } ?>
								<div id="filediv"  ><input name="file[]" type="file" class="fileUpld" id="file"/></div>
								<?php if(count($providerimages) <7){?>
								<input type="button" id="add_more" class="upload" value="Add More Files"/>
								<?php }?>
								<input type="hidden" value="<?php echo count($providerimages);?>" name="imageno" id="imageno" />
								<br/>
							</div>

							
						   <div class="box-footer">
							<button type="submit" class="btn btn-primary">Update</button>							
						  </div>
						  <?php echo $this->Form->end(); ?>
				  </div>
				  </div>
			</section>
		</div>
</div>

<script type="text/javascript"> 

function changestate(countryid)
{ //alert('asdasd');
	$.ajax({		
			type:'POST',
			url:base_url+'admin/providers/changestate/'+countryid,
			success:function(jData){
			  $("#statedivid").html(jData);	 
			  $("#citydivid").html('<select required="required" autofocus="1" id="city_id" class="form-control" name="city_id"><option value="">Select City</option></select>');
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
			$(".err").html("Some server error occoured.</div>");
			}
		});
}

function changecity(stateid)
{
	$.ajax({		
			type:'POST',
			url:base_url+'admin/providers/changecity/'+stateid,
			success:function(jData){
			  $("#citydivid").html(jData);	 
			  $("#citydivid2").html(jData);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
			$(".err").html("Some server error occoured.</div>");
			}
		});
}



// below code added for jquery multiple image upload section
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

$(".classImg").click(function(){

if (confirm('Are you sure you want to delete this Image?')) {
	var imageid = $(this).data('id');
	var parentdivid = $(this).data('parentdivid');
	
	$.ajax({		
			type:'POST',
			url:base_url+'admin/providers/deleteUserImage/'+imageid,
			success:function(jData){
			  if(jData =='T'){
				$("#"+parentdivid).hide();
				$("#imageno").val(parseInt($("#imageno").val())-1);
				if(parseInt($("#imageno").val()) >= 7){
					$("#add_more").css("display","none");
				}else{ $("#add_more").css("display","block");}
			  }
			  else{
				alert("Some error occoured.");
			  }
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
			$(".err").html("Some server error occoured.</div>");
			}
		});
	}
		
});

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file',class:'fileUpld'}),
                $("")
                ));
    });
//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {

            	var iSize = this.files[0].size;
            	var filesize = formatSizeUnits(iSize);
            	//alert(filesize);
            	if(filesize == true)
            	{
	                abc += 1; //increementing global variable by 1
					var z = abc - 1;
	                var x = $(this).parent().find('#previewimg' + z).remove();
	                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
					
	               	$("#imageno").val(parseInt($("#imageno").val()) +1);
					if(parseInt($("#imageno").val()) >= 7){
						$("#add_more").css("display","none");
					}else{ $("#add_more").css("display","block");}
				    var reader = new FileReader();
	                reader.onload = imageIsLoaded;
	                reader.readAsDataURL(this.files[0]);
	               
				    $(this).hide();
	                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '<?php echo $this->webroot;?>images/x.png', alt: 'delete'}).click(function() {
	                $(this).parent().parent().remove();
					$("#imageno").val(parseInt($("#imageno").val()) - 1);
					if(parseInt($("#imageno").val()) >= 7){
						$("#add_more").css("display","none");
					}else{ $("#add_more").css("display","block");}
	                }));
	            }
	            else
	            {
	            	alert("Maximum uploaded file size is 1MB.");
	            }
            }
        });

/// checking the file size
function formatSizeUnits(bytes){
     var bytes = (bytes / 1024);
            	
            	if (bytes / 1024 > 1)
	     		{
					if (((bytes / 1024) / 1024) > 1)
					{
						bytes = (Math.round(((bytes / 1024) / 1024) * 100) / 100);
						return false;
					}
					else
					{
						bytes = (Math.round((bytes / 1024) * 100) / 100)
						if(bytes > 1)
						{
							return false;
						}
						else
						{
							return true;
						}
					} 
	     		}
	     		else
	     		{
	     			bytes = (Math.round(bytes * 100) / 100)
	        		return true;
	     		}
}

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ;?>css/style_image.css">

<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  //document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  /* document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', '); */
  $('#latitude').val(latLng.lat());
  $('#longitude').val(latLng.lng());
}

function updateMarkerAddress(str) {
  //document.getElementById('address').innerHTML = str;
}

function initialize(lat,lon) {
  var latLng = new google.maps.LatLng(lat,lon);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 12,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: '',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
//google.maps.event.addDomListener(window, 'load', initialize);


//============================================================
$(function(){
	<?php
	$lat = $providerdata[0]['Provider']['latitude'];
	$lon = $providerdata[0]['Provider']['longitude'];
	if($lat == "" || $lon == ""){
	?>
	google_map();
	<?php
	}else{
	?>
	initialize(<?php echo $lat;?>,<?php echo $lon;?>);
	<?php
	}
	?>
	
	//google_map();
	$("#zipcode").focusout(google_map);
})

function google_map(){
		var country_id = $("#country_id").val();
		var state_id = $("#state_id").val();
		var citydivid = $("#citydivid").val();
		var address_line1 = $("#address_line1").val();
		var address_line2 = $("#address_line2").val();
		var zipcode = $("#zipcode").val();
		
		$.ajax({
			url: '../../get_location_from_google',
			type: 'POST',
			data: {'country_id':country_id,'state_id':state_id,'citydivid':citydivid,'address_line1':address_line1,'address_line2':address_line2,'zipcode':zipcode},
			dataType: 'json',
			success: function(data) {
				//called when successful
				//alert(data);
				lat = data.latitude;
				lon = data.longitude;
				initialize(lat,lon);
				$('#latitude').val(lat);
				$('#longitude').val(lon);
			  },
			  error: function(e) {
				//called when there is an error
				//console.log(e.message);
				alert(e.message);
			  }
		})
	}
</script>

<style>
  #mapCanvas {
    width: 100%;
    height: 300px;
    float: left;
  }
</style>