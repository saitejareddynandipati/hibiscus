<script>
	var SITE_URL = "<?php echo SITE_URL; ?>";
</script>
<?php
if(@$_SESSION['user_id']=='')
{
	echo "<script language='javascript'>";
	echo "window.location.href= SITE_URL + 'products'";
	echo "</script>"; 
}
else
{
	echo "<script language='javascript'>";
	echo "window.location.href= SITE_URL + 'products'";
	echo "</script>";
}	
?>