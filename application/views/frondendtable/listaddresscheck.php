<style>
/* The container */
.container123 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container123 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container123:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container123 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container123 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container123 .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>


<?php if(!empty($res)) { 

$i=0;
foreach($res as $row)
{
	?>

<label class="container123" for="checkadres_rad<?php echo $row->addressprofile_id ?>"> <?php echo $row->addressprofile_fname." ".$row->addressprofile_lname.",".$row->addressprofile_mobile.",".$row->addressprofile_city.",".$row->addressprofile_street ?>...
<input type="radio" onclick="showproperadrs('<?php echo $row->addressprofile_id ?>');" value="<?php echo $row->addressprofile_id ?>" name="checkadres_rad" id="checkadres_rad<?php echo $row->addressprofile_id ?>" <?php if($i==0){ ?> checked <?php } ?>>
<span class="checkmark"></span>
</label>





<?php $i++; }  ?>

<button style="background-color: #9e090e;border-color: #9e090e;" class="btn btn-success" onclick="showaddressbar();">add new address</button>


<?php } ?>




