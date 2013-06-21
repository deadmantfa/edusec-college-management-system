// Declare Dashboard object.
var Dashboard = Dashboard || {'settings': {}, 'behaviors': {}, 'fn': {}};

Dashboard.attachBehaviors = function(context) {
	context = context || document;
	$.each(Dashboard.behaviors, function() {
		this(context);
	});
}

// This used to auto bind behaviors after page loaded.
$(document).ready(function() {
	Dashboard.attachBehaviors(this);
});

// Init portlets toggler popup dialog, user use this toggler to add/remove a portlet. 
Dashboard.behaviors.initPortletsToggler = function() {
	$('#portlets-toggler').click(function() {
		$('#portlets-toggler-popup').dialog('open');
	});
}

Dashboard.fn.togglePortlets = function(params) {
	$('#portlets-toggler-popup').dialog('close');
	
	$('.portlets-toggle-item:checked').each(function() {
		$('#' + $(this).val()).removeClass("dashboard-portlet-invisible");
	});
	
	$('.portlets-toggle-item:not(.portlets-toggle-item:checked)').each(function() {
		$('#' + $(this).val()).addClass("dashboard-portlet-invisible");
	});
	
	var columns = $('#dashboard').find('>div.column');
	
	Dashboard.fn.savePortlets(params, columns);
}

// Use ajax to send user settings to backend.
Dashboard.fn.savePortlets = function(params, columns) {
	var portlets = {};
	
	// Collect portlets info in every column.
	columns.each(function(column) {
		var columnPortlets = $(this).sortable('toArray');
		
		$.each(columnPortlets, function(weight, portlet) {
			portlets[portlet] = {
			    column: column,
			    weight: weight,
			    portlet: portlet,
			    visible: $('#' + portlet).is(':visible')
			};
		});
	});
	
	portlets = JSON.stringify(portlets);
	
	$.ajax({
        url: params.baseUrl + 'save',
        type: "POST",
        cache: "false",
        dataType: 'json',
        data: {portlets: portlets},
        success: function(response) {
        	$.jGrowl(response.message, { life: 1000 });
        },
        error: function() {
        	$.jGrowl("Save failed, please refresh the page.", { life: 1000 });
        }
    });
}

// This is Jquery extention to create a sortable portlets dashboard page.
jQuery.extend({
    dashboard: function(params) {
		$dashboard = $('#dashboard:not(.dashboard-processed)').addClass('dashboard-processed');
	
		$columns = $dashboard.find('>div.column');
		
		// Disable the sortable portlets when the ajax call is processing. So user can not send multiple
		// request. This can reduce the server stress.
		$dashboard.ajaxStart(function() {
			$columns.sortable( "option", "disabled", true );
		});
		
		// Enable the sortable portlets after the ajax call.
		$dashboard.ajaxStop(function() {
			$columns.sortable( "option", "disabled", false );
		}); 

		$columns.sortable({
			items: '>div.dashboard-portlet',
		    handle: '>div.dashboard-portlet-header',
		    connectWith: $columns,
		    //placeholder: 'dashboard-placeholder ' + $('>div.widget', $columns).attr('class'),
		    forcePlaceholderSize: true,
		    distance: 5,
		    opacity: 0.8,
		    stop: function(event, ui) {
			    Dashboard.fn.savePortlets(params, $columns);
		    }
		});
		
		$( ".dashboard-portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".dashboard-portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".dashboard-portlet-content" );
	
		$( ".dashboard-portlet-header .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".dashboard-portlet:first" ).find( ".dashboard-portlet-content" ).toggle();
		});
	
		$columns.disableSelection();
	},
});
