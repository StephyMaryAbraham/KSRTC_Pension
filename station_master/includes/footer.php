</div>
<!-- <div class="footer">
<div class="col-sm-12">

				

		</div> --><!--/.row-->
	</div>	<!--/.main-->
	</di-++v>  <!-- wraper -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery.form-validator.min.js"></script>
<script>
		$(document).ready(function(){
		 $.validate({
    lang: 'en',
    modules : 'location, date, security, file',
  });
		 });
	</script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/chart.min.js"></script>
	<script src="assets/js/chart-data.js"></script>
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	<script src="assets/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/jquery.fancybox.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/dataTables.buttons.js"></script>
	<script src="assets/js/buttons.bootstrap.min.js"></script>


	
	<script>
$('.datepicker').datepicker({
   
});


$(".fancybox").fancybox({
    width  : 600,
    height : 300,
    type   :'iframe'
});
		
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};



	</script>
	    
		
</body>
</html>