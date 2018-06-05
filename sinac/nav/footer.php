    <footer class="body">
    </footer>
    <div id="dropDownSelect1"></div>
    <script src="/sinac/js/jquery-3.3.1.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="/sinac/jquery.form-validator.min.js"></script>
    <script src="/sinac/js/jquery-3.3.1-ajax-gets.js" integrity=""></script>
	<script src="/sinac/js/bootstrap.min.js" integrity=""></script>  
    <script src="/sinac/js/jquery-3.3.1-ajax.js" integrity=""></script>
    <script src="/sinac/js/jquery-3.3.1-ajax-delete.js" integrity=""></script>
    <script src="/sinac/js/jquery-3.3.1-ajax-update.js" integrity=""></script>
    <script src="/sinac/vendor/select2/select2.min.js"></script>
    <script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
        });
	</script>
    <script src="/sinac/js/main.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var number1 = parseInt(document.getElementById('idSectorInst1').value);
        var number2 = parseInt(document.getElementById('idSectorInst2').value);
        var number3 = parseInt(document.getElementById('idSectorInst3').value);

        var data = google.visualization.arrayToDataTable([
          ['Sector', 'Instituciones'],
          ['Instituciones públicas presentes en el área',     number1],
          ['Municipalidades',      number2],
          ['Organizaciones no gubernamentales y comunales del estado',  number3]
        ]);

        var options1 = {
          title: '',
          is3D: true,
          colors: ['#0000cc', '#00e600', '#ff8c1a'],
          'width':700,
          'height':400 
        };
        
        //if(getElementById("piechart")){
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options1);
        //}
      
        var total1 = parseInt(document.getElementById('idSectorMiembro1').value);
        var total2 = parseInt(document.getElementById('idSectorMiembro2').value);
        var total3 = parseInt(document.getElementById('idSectorMiembro3').value);

        var data2 = google.visualization.arrayToDataTable([
          ['ID',   'Actores','Instituciones', 'Sector'],
          ['IPPA',    total1, number1,        'Instituciones pública presentes en el área'],
          ['MUNI',    total2, number2,        'Municipalidades'],
          ['ONGs',    total3, number3,        'Organizaciones no gubernamentales y comunales del estado'],
        ]);

        var options2 = {
          title: '',
          colors: ['#0000cc', '#00e600', '#ff8c1a'],
          'width':700,
          'height':400,
          hAxis: {title: 'Actores'},
          vAxis: {title: 'Instituciónes'},
          bubble: {textStyle: {fontSize: 11}} 
        };
        
        //if(getElementById("bubblechart")){
          var chart = new google.visualization.BubbleChart(document.getElementById('bubblechart'));
          chart.draw(data2, options2);
        //}

      }
    </script>           
</body>
</html>