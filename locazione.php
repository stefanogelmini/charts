<!DOCTYPE html>
<html lang="en">
<head>
	<title id='Description'>Analisi Sonde per Locazione</title>
	<?php include('resources.php'); ?>	
	<script type="text/javascript">
 		var idlocazione = getUrlParameter('IDLocazione');
		var source =
            {
                datatype: "json",
                datafields: [
					{ name: 'TimeStamp', type: 'date'},
					{ name: 'IDLocazione', type: 'integer' },
					{ name: 'Temperatura', type: 'number' },
					{ name: 'Umidita', type: 'number'},
					{ name: 'MinSogliaEstate_Temperatura', type: 'number'},
					{ name: 'MaxSogliaEstate_Temperatura', type: 'number'},
					{ name: 'MinSogliaEstate_Umidita', type: 'number'},
                    { name: 'MaxSogliaEstate_Umidita', type: 'number'}
					
                ],
               url: 'dataSondaLocazione.php?IDLocazione='+idlocazione
            };
			var sourceFuoriSogliaMax =
            {
                datatype: "json",
                datafields: [
					{ name: 'TimeStamp', type: 'date'},
					{ name: 'IDSonda', type: 'integer' },
					{ name: 'IDTipoSonda', type: 'number' },
					{ name: 'DescrizioneTipoSonda', type: 'string'},
				    { name: 'Soglia', type: 'string'},
				    { name: 'VALORE_D', type: 'number'}
                ],
               url: 'dataSondaLocazioneOverSoglia.php?IDLocazione='+idlocazione
            };	
		
		$(document).ready(function () {
	            var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
        	    var months = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Sep', 'Ott', 'Nov', 'Dic'];

            // prepare jqxChart1 settings
	            var settings1 = {
        	        title: "Temperature Sonda per locazione",
                	description: "Analisi Sonda per IDLocazione " + idlocazione,
	                enableAnimations: true,
	                showLegend: true,
	                padding: { left: 5, top: 5, right: 11, bottom: 5 },
	                titlePadding: { left: 10, top: 0, right: 0, bottom: 10 },
	                source: dataAdapter,
        	        xAxis:
		                {
                		    dataField: 'TimeStamp',
		                    type: 'date',
                		    baseUnit: 'day',
		                    valuesOnTicks: false,
                		    labels:
		                    {
                		        formatFunction: function (value) {
		                            return value.getDate();
                			        }
		                    },
                    toolTipFormatFunction: function (value) {
                        return value.getDate() + '-' + months[value.getMonth()] + '-' + value.getFullYear();
                    },
                    rangeSelector: {
                        // Uncomment the line below to render the selector in a separate container 
                        //renderTo: $('#selectorContainer'),
                        size: 80,
                        padding: { /*left: 0, right: 0,*/top: 0, bottom: 0 },
                        minValue: 'auto',
                        backgroundColor: 'white',
                        dataField: 'Temperatura',
                        gridLines: { visible: false },
                        serieType: 'area',
                        labels: {
                            formatFunction: function (value) {
                               return months[value.getMonth()] + '\'' + value.getFullYear().toString().substring(2);
                            }
                        }
                    }
                },
                valueAxis:
                {
                    unitInterval: 5,
                    minValue: 'auto',
                    maxValue: 'auto',
                    labels: {horizontalAlignment: 'right'},
		            axisSize: 'auto',
                    title: { text: '' }
                },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'spline',
                            series: [
								{ dataField: 'Temperatura', displayText: 'Temperatura' , lineWidth: 4, dashStyle: '1',
								    
								    // Modify this function to return desired colors.
                                    // jqxChart will call the function for each data point.
                                    // Sequential points that have the same color will be
                                    // grouped automatically in a line segment
                                    colorFunction: function (value, itemIndex, serie, group) {
                                        if (isNaN(itemIndex))
                                                    return '#00FF00';
                                      //source[itemIndex][MaxSogliaEstate_Temperatura]
                                       return (value > 25) ? '#CC1133' : '#55CC55';
                                               // }   
                                    }
								}
                                ]
                        },
			{
                            type: 'spline',
                            series: [
                                    { dataField: 'MinSogliaEstate_Temperatura', displayText: 'Min Soglia Temperatura', opacity: 1.0, lineWidth: 4, dashStyle: '1' },
                                    { dataField: 'MaxSogliaEstate_Temperatura', displayText: 'Max Soglia Temperatura', opacity: 1.0, lineWidth: 4, dashStyle: '1' }
                                ]
                        }
                    ]
            };
//
// prepare jqxChart2 settings
                    var settings2 = {
                        title: "Umidita Sonda per locazione",
                        description: "Analisi Sonda per IDLocazione " + idlocazione,
                        enableAnimations: true,
                        showLegend: true,
                        padding: { left: 5, top: 5, right: 11, bottom: 5 },
                        titlePadding: { left: 10, top: 0, right: 0, bottom: 10 },
                        source: dataAdapter,
                        xAxis:
                                {
                                    dataField: 'TimeStamp',
                                    type: 'date',
                                    baseUnit: 'day',
                                    valuesOnTicks: false,
                                    labels:
                                    {
                                        formatFunction: function (value) {
                                            return value.getDate();
                                                }
                                    },
                    toolTipFormatFunction: function (value) {
                        return value.getDate() + '-' + months[value.getMonth()] + '-' + value.getFullYear();
                    },
                    rangeSelector: {
                        // Uncomment the line below to render the selector in a separate container
                        //renderTo: $('#selectorContainer'),
                        size: 80,
                        padding: { /*left: 0, right: 0,*/top: 0, bottom: 0 },
                        minValue: 'auto',
                        backgroundColor: 'white',
                        dataField: 'Temperatura',
                        gridLines: { visible: false },
                        serieType: 'area',
                        labels: {
                            formatFunction: function (value) {
                               return months[value.getMonth()] + '\'' + value.getFullYear().toString().substring(2);
                            }
                        }
                    }
                },
                valueAxis:
                {
                    unitInterval: 5,
                    minValue: 'auto',
                    maxValue: 'auto',
                    labels: {horizontalAlignment: 'right'},
                    axisSize: 'auto',
                    title: { text: '' }
                },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'spline',
                            series: [
                                 { dataField: 'Umidita', displayText: 'Umidità', lineWidth: 4, dashStyle: '1' }
                                ]
                        },
                        {
                            type: 'spline',
                            series: [
                                    { dataField: 'MinSogliaEstate_Umidita', displayText: 'Min Soglia Estate Umidita', opacity: 1.0, lineWidth: 4, dashStyle: '1' },
                                    { dataField: 'MaxSogliaEstate_Umidita', displayText: 'Max Soglia Estate Umidita', opacity: 1.0, lineWidth: 4, dashStyle: '1' }
                                ]
                        }
                    ]
            };
//
            // setup the chart
		$('#chartContainer1').jqxChart(settings1).
                	on('rangeSelectionChanging', function (event) {
			var args = event.args;
			});

		$('#chartContainer2').jqxChart(settings2).
                	on('rangeSelectionChanging', function (event) {
			var args = event.args;
                	});
		
		$("#jqxgrid").jqxGrid({
		        source: sourceFuoriSogliaMax,
		        theme: 'classic',
		        columns:[
					{ text: 'Data e ora', datafield: 'TimeStamp', width: 220 },
					{ text: 'Valore', datafield: 'VALORE_D', width: 150 },
					{ text: 'TipoSonda', datafield: 'DescrizioneTipoSonda', width: 100 },
					{ text: 'Soglia', datafield: 'Soglia', width: 50 }
				],
                groupable: true,
                groups: ['DescrizioneTipoSonda']
                });
            });
		
		
		$(document).ready(function () {               
               
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'IDLocazione'},
                    { name: 'Locazione' }
                    ],
					url: 'dataComboLocazioni.php',
                    async: false,
                };
                var dataAdapter = new $.jqx.dataAdapter(source);

                // Create a jqxComboBox
                $("#jqxCombo").jqxComboBox({ source: dataAdapter, displayMember: "Locazione", valueMember: "IDLocazione", width: 400, height: 20 });
                $("#jqxCombo").val(idlocazione);
              //  $("#jqxCombo").jqxComboBox('selectedIndex', idlocazione);
                // trigger the select event.
                $("#jqxCombo").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
							window.location='locazione.php?IDLocazione=' + item.value
                        }
                    }
                });
               
            });
           
		
		
    </script>
</head>
<body class='default'>
	<?php include('menu.php'); ?>
	 <div style="font-size: 12px; font-family: Verdana;" id="labelLocazione">Scegli una locazione</div>
	 <div id='jqxCombo'></div>
	 
	 <div id="landing-container">       
		<div id='chartContainer1' style="width:800px; height:500px;float: left; "></div>
		<div id='chartContainer2' style="width:800px; height:500px;float: left;"></div>
	 </div>
	 
 	 <div id="jqxgrid"></div>
 	 
</body>
</html>

