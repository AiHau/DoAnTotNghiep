<?php
if(Session::get('login_normal')){
	$name = Session::get('admin_name');
}else{
	$name = Auth::user()->admin_name;
}

if($name){
	echo $name;
	
}
?>