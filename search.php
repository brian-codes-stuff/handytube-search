<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#uns"><p>Search By UNS</p></a></li>
  
</ul>
 
<div class="tab-content">
  <div class="tab-pane active" id="uns">
  
	<form id="form1" method="post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row">
  <div class="span6">
	 
	   <label>
<select id="search" name="search" type="text" value="null">
 <option value="0">Please select one of the search criteria from below.</option>
  <option value="S30400/S30403">S30400/S30403</option>
  <option value="S31600/S31603">S31600/S31603</option>
  <option value="S31635">S31635</option>
  <option value="S31703">S31703</option>
  <option value="S34700">S34700</option>
  <option value="N08904">N08904</option>
  <option value="N02200">N02200</option>
  <option value="N04400">N04400</option>
  <option value="N06600">N06600</option>
  <option value="N06625">N06625</option>
  <option value="N08825">N08825</option>
  <option value="N10276">N10276</option>
  <option value="N06022">N06022</option>
</select>
</label>
		</div>
		<div class="span6">
			<label>
<input id="clickuns" type="submit" />
</label>
		</div>
		</div>

</form>
 <?php
$search= $_REQUEST['search'];
if ($search > ''){ $search = $search;} else { $search = '';}
?>

<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load('visualization', '1', {packages: ['table']});
</script>
<script type="text/javascript">
	
	
var visualization;


 function drawVisualization() {
document.getElementById("clickuns").addEventListener("click", drawVisualization);
	 
var query = new google.visualization.Query(
'https://spreadsheets.google.com/tq?key=1M1ZExBMFdUvV9XKiORJekZ9Esz4bx0XgGDKHiVoiRkw');

query.setQuery('SELECT * WHERE F = "<?php echo $search; ?>"');

query.send(handleQueryResponse);
}

function handleQueryResponse(response) {
if (response.isError()) {
alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
return;
}

var data = response.getDataTable();

visualization = new google.visualization.Table(document.getElementById('table'));
visualization.draw(data, {legend: 'bottom'});

}

google.setOnLoadCallback(drawVisualization);
</script>
  
  <div id="table"></div>
  
	  </div>
	  

 <div class="tab-pane" id="properties">
 <form id="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 <div class="row">
 	<div class="span4">
  	<select id="search2" name="search2" type="text">
		  										<option value="WHERE O">Please select one of the search criteria from below.</option>
          									  	<option value="WHERE H">C - Carbon</option>
												<option value="WHERE J">Ni - Nickel</option>
												<option value="WHERE I">Cr - Chrome</option>
												<option value="WHERE K">Mo - Molybdenum</option>
												<option value="WHERE P">Tensile Strength Rm</option>
												<option value="WHERE O">Yield Strength Rp</option>
												<option value="WHERE Q">Elongation %</option>
												<option value="WHERE R">Hardness</option>
								          	</select>
	 </div>
	 <div class="span2">
	 	<select id="search3" name="search3"  type="text">
													  
														  <option value=">=">Greater Than</option>
														  <option value="<=">Less Than</option>
													</select>
	 </div>
	 <div class="span3">
	 <input id="search4" name="search4"  type="number" value="0" step=".001">
	 </div>
	 <div class="span3">
	 	<input id="clickprop" type="submit" style="float:left;" />
	 </div>
	 </div>	
	 </form>
	 
	 <?php
	
	
$search2= $_REQUEST['search2'];
if ($search2 > ''){ $search2 = $search2;} else { $search2 = '';}
	
	$search3= $_REQUEST['search3'];
if ($search3 > ''){ $search3 = $search3;} else { $search3 = '';}
	
	$search4= $_REQUEST['search4'];
if ($search4 > ''){ $search4 = $search4;} else { $search4 = '';}
	
	
?>



<script type="text/javascript">
	
google.load('visualization', '1', {packages: ['table2']});
</script>

<script type="text/javascript">
var visualization;

 function drawVisualization2() {

var query = new google.visualization.Query(
'https://spreadsheets.google.com/tq?key=1M1ZExBMFdUvV9XKiORJekZ9Esz4bx0XgGDKHiVoiRkw');

query.setQuery('SELECT *  <?php echo $search2; ?> <?php echo $search3; ?> <?php echo $search4; ?> ');

query.send(handleQueryResponse);
}

function handleQueryResponse(response) {
if (response.isError()) {
alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
return;
}

var data2 = response.getDataTable();

visualization = new google.visualization.Table(document.getElementById('table2'));
visualization.draw(data2, {legend: 'bottom'});

}

google.setOnLoadCallback(drawVisualization2);
</script>


	 
	 <div id="table2"></div>
 </div>
</div>
 




</div>
   <script>
	$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})
	
	$('#myTab a[href="#properties"]').tab('show'); // Select tab by name
$('#myTab a:first').tab('show'); // Select first tab
$('#myTab a:last').tab('show'); // Select last tab
$('#myTab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
	
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
    <link href="css/custom.css" rel="stylesheet" media="screen">
</body>
</html>