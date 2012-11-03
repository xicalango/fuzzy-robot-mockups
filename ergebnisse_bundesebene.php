<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content="jQuery Menu, Main Menu, Context Menu, Vertical Menu, Popup Menu, Menu, jqxMenu" /> 
    <meta name="description" content="The jqxMenu widget supports several built-in modes - horizontal, vertical and context menu. In this demo, the mode property is set to 'vertical'."/>
    <title id='Description'>The jqxMenu widget supports several built-in modes - horizontal, vertical and context menu. In this demo, the mode property is set to 'vertical'.
    </title>    	
		
	<link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="lib/scripts/gettheme.js"></script>
    <script type="text/javascript" src="lib/scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="lib/jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="lib/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="lib/jqwidgets/jqxchart.js"></script>
	<script type="text/javascript" src="lib/jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="lib/jqwidgets/jqxdockpanel.js"></script>
	
</head>
<body>
        <script type="text/javascript">
            $(document).ready(function () {
                var theme = getTheme();
				
							
				
				
            
				// Create the jqxDockPanel
				$("#jqxDockPanel").jqxDockPanel({ width: 900, height: 800});
				
				
				//Create the chart
				
				var sitzverteilungSource =
				{
					datatype: "csv",
					datafields: [
						{ name: 'Partei' },
						{ name: 'Sitze' }
					],
					url: 'data/sitzverteilung2009.csv'
				};
				
				var dataAdapter = new $.jqx.dataAdapter(sitzverteilungSource, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + sitzverteilungSource.url + '" : ' + error); } });
				$.jqx._jqxChart.prototype.colorSchemes.push({ name: 'myScheme', colors: ['#ff0000', '#aaaaaa', '#ffff00', '#ff00ff', '#00ff00', '#00ffff'] });
			  
				// prepare jqxChart settings
				var settings = {
					title: "Sitzverteilung 2009",
					description: "(source: bundeswahlleiter.de)",
					enableAnimations: true,
					showLegend: false,
					legendPosition: { left: 520, top: 140, width: 100, height: 100 },
					padding: { left: 5, top: 5, right: 5, bottom: 5 },
					titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
					source: dataAdapter,
					colorScheme: 'myScheme',
					seriesGroups:
						[
							{
								type: 'pie',
								showLabels: true,
								series:
									[
										{ 
											dataField: 'Sitze',
											displayText: 'Partei',
											labelRadius: 100,
											initialAngle: 15,
											radius: 130,
											centerOffset: 0,
											formatFunction: function(value) {
												return(value);
											}
										}
									]
							}
						]
				};

				// setup the chart
				$('#pieChartBundesebene').jqxChart(settings);				
            });
		
        </script>		

		<div id='jqxDockPanel' style="background: none; border: none;">	
		
				<?php include("menu_bundesebene.html"); 
				include("menu.html"); ?>		
			
			<div id='Sitzverteilung_Sitzverteilung' style="visibility: visible" dock="right">
				Bundesebene
				<div id='pieChartBundesebene' style="width: 680px; height: 400px; position: relative; left: 0px; top: 0px;"></div>
			</div>
		</div>
			
			
		
		
</body>
</html>
