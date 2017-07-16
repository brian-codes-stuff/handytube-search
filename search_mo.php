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

<div class="row">
<div class="span12">
 <form id="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 <div class="row">
 	
	 <div class="span4">
	 	<select id="search3" name="search3" value="null"  type="text">
													  
														  <option value="SELECT * WHERE H >=">Greater Than</option>
														  <option value="SELECT * WHERE H <=">Less Than</option>
													</select>
	 </div>
	 <div class="span4">
	 <input id="search4" name="search4"  type="number" value="0.00" step=".001">
	 </div>
	 <div class="span4">
	 	<input id="clickprop" type="submit" style="float:left;" />
	 </div>
	 </div>	
	 </form>
	</div>
	 <?php
	
	
	
	$search3= $_REQUEST['search3'];
if ($search3 > ''){ $search3 = $search3;} else { $search3 = '';}
	
	$search4= $_REQUEST['search4'];
if ($search4 > ''){ $search4 = $search4;} else { $search4 = '';}
	
	
?>


<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	
google.load('visualization', '1', {packages: ['table']});
</script>

<script type="text/javascript">
var visualization;

 function drawVisualization() {

var query = new google.visualization.Query(
'https://spreadsheets.google.com/tq?key=1M1ZExBMFdUvV9XKiORJekZ9Esz4bx0XgGDKHiVoiRkw');

query.setQuery('<?php echo $search3; ?> <?php echo $search4; ?> ');

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
 </div>
</div>
 




</div>
   <script>
	$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})
	
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