var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)), sURLVariables = sPageURL.split('&'), sParameterName,i;

		for (i = 0; i < sURLVariables.length; i++) {
		    sParameterName = sURLVariables[i].split('=');

		    if (sParameterName[0] === sParam) {
		        return sParameterName[1] === undefined ? true : sParameterName[1];
				}
			}
		};
          
            $(document).ready(function () {
                // Create a jqxMenu
                $("#jqxMenu").jqxMenu({ width: '670', height: '30px'});
                $("#jqxMenu").css('visibility', 'visible');
            });
     
