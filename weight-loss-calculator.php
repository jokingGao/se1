<?php
/* This calculator is your for free by Calendarscripts.info. You have no obligations for anything - you can modify, redistribute, sell it or whatever you want to do.
We will appreciate if you don't remove the link at the bottom, but that's not required. */

/* Feel free to modify the CSS and the texts below. - no problem at all. Just don't touch the PHP code or the specual codes which are surrounded with %% unless you know what you are doing. */
error_reporting(E_ALL&(~E_NOTICE));
session_start();
?>
<style type="text/css">
.calculator_div label {
   color: #222;
   text-shadow: 0px 1px 1px #f2f2f2;
   font-size: 13px;
   font-weight: bold;
}

.age, .gen {
   /*height: 40px; */
   background-color: rgba(255, 255, 255, 0.5);
   padding: 5px;
   border: 1px dotted #999;
}

.age {float: left; width: 105px; }
.gen {float: right; width: 175px;}

.age input {
   width: 26px;
}

.row_ag {
   padding: 0px;
   margin: 0px 0 5px 0;
}

.row1 {
   background-color: #BCBCBC;
   padding: 5px;
   margin: 5px 0 5px 0;
   border: 1px dotted #666;
}

.row1 input {
   background-color: #666666;
   color: #FFB357;
   border: thin inset gray;
}

.row2 {
   background-color: #F1F1F1;
   padding: 5px;
   margin: 5px 0 5px 0;
   border: 1px dotted #999;
}

.row2 input, .age input, .gen input, .row1 select, .row2 select, .gen select {
   background-color: #666666;
   color: #ffcc00;
   border: thin inset #999999;
}

.calculator_div input[type="button"],input[type="submit"] {
   background: -webkit-gradient(linear, left top, left bottom, from(#ffcc00), to(#FB7600));
   padding: 5px 15px;
   font-weight: bold;
   color: #222222;
   text-shadow: 0px 1px 1px #ffcc00;
} 

#result {
   margin: 10px 0 10px 0;
   font-size: 11px;
   color: #222222;
}

.calculator_div a {
   color: #7A9D20;
   font-weight: bold;
}

.fc {
   border-top: 1px dotted #666666;
   padding: 5px 0 0 0;
   color: #666666;
   font-size: 11px;
   text-align: center;
}

.clear:after {
   content: ".";
   display: block;
   height: 0;
   clear: both;
   visibility: hidden;
}

.warning {color:red;font-weight:bold;}
</style>


<script language="javascript">
function validateCalculator(frm)
{
	var age=frm.age.value;
	if(isNaN(age) || age<6 || age > 125 || age=="")
	{
		alert("Please enter your age, numbers only.");
		frm.age.focus();
		return false;
	}
	
	var height_ft=frm.height_ft.value;
	if(isNaN(height_ft) || height_ft<0) height_ft="";
	var height_in=frm.height_in.value;
	if(isNaN(height_in) || height_in<0) height_in="";
	var height_cm=frm.height_cm.value;
	if(isNaN(height_cm) || height_cm<0) height_cm="";
	
	if(height_ft=="" && height_cm=="" && height_in=="")
	{
		alert("Please enter your height, numbers only");
		return false;
	}
	
	var weight_lb=frm.weight_lb.value;
	if(isNaN(weight_lb) || weight_lb<0) weight_lb="";
	var weight_kg=frm.weight_kg.value;
	if(isNaN(weight_kg) || weight_kg<0) weight_kg="";
	
	if(weight_kg=="" && weight_lb=="")
	{
		alert("Please enter your weight, numbers only.");		
		return false;
	}
	
	var lose_lb=frm.lose_lb.value;
	if(isNaN(lose_lb) || lose_lb<0) lose_lb="";
	var lose_kg=frm.lose_kg.value;
	if(isNaN(lose_kg) || lose_kg<0) lose_kg="";
	
	if(lose_kg=="" && lose_lb=="")
	{
		alert("Please enter how much weight you want to lose, numbers only.");		
		return false;
	}
	
	var days=frm.days.value;
	if(isNaN(days) || days<0 || days=="")
	{
		alert("Please enter how many days you have to reach the goal, numbers only.");
		frm.days.focus();
		return false;
	}
}

function calculateHeight(fld)
{
	if(fld.name=="height_in" || fld.name=="height_ft")
	{
		// calculate height in inches
		if(isNaN(fld.form.height_in.value) || fld.form.height_in.value=="") inches=0;
		else inches=fld.form.height_in.value;
		
		if(isNaN(fld.form.height_ft.value) || fld.form.height_ft.value=="") feet=0;
		else feet=fld.form.height_ft.value;
		
		inches=parseInt(parseInt(feet*12) + parseInt(inches));
		
		h=Math.round(inches*2.54);
		
		fld.form.height_cm.value=h;
	}
	else
	{
		// turn cm into feets and inches
		if(isNaN(fld.value) || fld.value=="") cm=0;
		else cm=fld.value;
		
		totalInches=Math.round(cm/2.54);
		inches=totalInches%12;		
		feet=(totalInches-inches)/12;
		
		fld.form.height_ft.value=feet;
		fld.form.height_in.value=inches;
	}
}

function calculateWeight(fld)
{
	if(fld.name=="weight_lb" || fld.name=="lose_lb")
	{
		// calculate in kg
		if(isNaN(fld.value) || fld.value=="") w=0;
		else w=fld.value;
		
		wKg=Math.round(w*0.453*10)/10;
		
		if(fld.name=="weight_lb") fld.form.weight_kg.value=wKg;
		else fld.form.lose_kg.value=wKg;
	}
	else
	{
		// calculate in lbs
		if(isNaN(fld.value) || fld.value=="") w=0;
		else w=fld.value;
		
		wP=Math.round(w*2.2);
		
		if(fld.name=='weight_kg') fld.form.weight_lb.value=wP;
		else fld.form.lose_lb.value=wP;
	}
}
</script>
