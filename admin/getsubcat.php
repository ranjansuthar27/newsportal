<?php
include 'includes/config.php';
if (isset($_POST)) {
	$catId = $_POST['catId'];
	/*$query = "";*/
}

?>

<!-- <option>Select Category</option> -->
<?php
	echo $queryCat = "SELECT * FROM tblsubcategory WHERE cat_id = '$catId'";
	$resultCatGet = mysqli_query($conn,$queryCat);
	while ($resCat = mysqli_fetch_assoc($resultCatGet)) {
		?>

		<option value="<?php  echo $resCat['id']; ?>"><?php  echo $resCat['subcat_name']; ?></option>

<?php		
	}
?>