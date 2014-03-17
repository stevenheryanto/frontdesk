<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="refresh" content="45;url=frontdeskRead.php" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Frontdesk Read</title>
	<script type="text/javascript">
		function allowDrop(ev){
		ev.preventDefault();
		}

		function drag(ev){
		ev.dataTransfer.effectAllowed='move';
		ev.dataTransfer.setData("Text",ev.target.id);
		}

		function drop(ev){
			ev.preventDefault();
			var id=ev.dataTransfer.getData("Text");
			ev.target.appendChild(document.getElementById(id));
			
			$.ajax({
				type: "POST",
				url: "frontdeskDelete.php",
				data: {"id": id},
				dataType: "text",
				success:function(data) {
					if(data) {
						alert("Ticket has been deleted");
					} else {
						alert("Delete fail, please try again later");
					}}
			});	
		}
	</script>
</head>
<body>
	<?php
		$tan = $_POST['tanggal'];
		$kri = $_POST['kriteria'];
	?>
	<form action="frontdeskRead2.php" method="post">
		<input type="date" name="tanggal" value='<?= $tan ?>'>
		<input type="text" name="kriteria" value='<?= $kri ?>'>
		<input class="button" name="submit" type="submit" value="Search">
		
	</form>
	<?php
		require_once 'meekrodb.2.1.class.php';
		$where = new WhereClause('and');

		if ($tan != null){
			$where->add('DAY(start)=%s', substr($tan,8,2));
			$where->add('MONTH(start)=%s', substr($tan,5,2));
			$where->add('YEAR(start)=%s', substr($tan,0,4));
		}
		$subclause = $where->addClause('or');
		if ($kri != null){
			$subclause->add('idlog LIKE %i', $kri);
			$subclause->add('notes LIKE %i', "%".$kri."%");
		}
		
		$view = DB::query("SELECT * FROM log WHERE %l ORDER BY start DESC", $where);
		echo "<ul id='fl_table'>";
		echo "<li>".
		"<div class=lo>No</div>
		<div class=hi>Date</div>
		<div>Customer</div>
		<div>Product</div>
		<div>Service</div>
		<div class=hi>Notes</div>
		<div>Officer</div>
		<div class=lo>Paid</div>
		<div class=lo>Taken</div>
		<div class=lo>Files</div>
		</li>";
		foreach($view as $row ){
			echo "<li class='drag' draggable='true' id=".$row['idlog']." ondragstart=drag(event)>".
			"<div class=lo><a href='frontdeskUpdate.php?id=".$row['idlog']."'>" . $row['query'] . "</div>".
			"<div class=hi>" . $row['start'] . "</div>".
			"<div>" . $row['customer'] . "</div>";
			
			echo "<div>"; 
				switch ($row['product']){
				case 1:
					echo "Document";
					break;
				case 2:
					echo "Desktop";
					break;
				case 3:
					echo "Laptop";
					break;
				case 4:
					echo "Monitor";	
					break;
				case 5:
					echo "Printer";
					break;
				case 6:
					echo "Scanner";
					break;
				case 7:
					echo "Speaker";
					break;
				case 8:
					echo "UPS";
					break;
				case 9:
					echo "Other";
					break;
				}				
			echo "</div>";			
			echo "<div>"; 
				switch ($row['service']){
				case 1:
					echo "Type & Print";
					break;
				/*case 2:
					echo "Print";
					break;
				case 3:
					echo "Jilid";
					break;*/
				case 4:
					echo "Install";	
					break;
				case 5:
					echo "Update";
					break;
				case 6:
					echo "Maintenance";
					break;
				case 7:
					echo "Repair";
					break;
				case 8:
					echo "Part replacement";	
					break;
				}				
			echo "</div>";
			
			echo "<div class=hi>" . $row['notes'] . "</div>";
			echo "<div>"; 
			switch ($row['employee']){
				case 1:
					echo "Chris";
					break;
				case 2:
					echo "Ali";
					break;
				case 3:
					echo "Anes";
					break;
				case 4:
					echo "Indah";
					break;
				case 5:
					echo "Vina";
					break;
				case 6:
					echo "Ruslan";
					break;
				case 7:
					echo "Ansori";
					break;
			} 
			echo "</div>";
			echo "<div class=lo>";
				switch ($row['ispaid']){
				case 0:
					echo "<i class='icon-check-empty'></i>";
					break;
				case 1:
					echo "<i class='icon-check'></i>";
					break;
				} 
			echo "</div>";
			echo "<div class=lo>";
				switch ($row['istaken']){
				case 0:
					echo "<i class='icon-check-empty'></i>";
					break;
				case 1:
					echo "<i class='icon-check'></i>";
					break;				
				} 
			echo "</a></div><div class=lo><a href=".$row['location']."><i class='icon-file'></i></a></div>";
			//echo "<div class='low'><a href='frontdeskUpdate.php?id=".$row['idlog']."'>" . edit. "</a></div>";
			//echo "<div class='low'><a href='frontdeskDelete.php?id=".$row['idlog']."'>" . delete. "</a></div>";
			echo "</li>\n";
		} 
		echo "</ul>\n";		
	?>
	<li id="bottom">
	<i class="icon-trash icon-4x" ondrop="drop(event)" ondragover="allowDrop(event)"></i>
	<a href=frontdeskCreate.php><i class="icon-plus-sign icon-4x"></i></a>	
	<a href=frontdeskOperator.php><i class="icon-bar-chart icon-4x"></i></a>	
	
	</li>
</body>
</html>
