	var selected = false;

	var array = [];


	$(function() {
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			minDate: 0,
			onClose: function( selectedDate ) {
				if( selectedDate != "")
				{
					$( "#to" ).datepicker( "option", "minDate", selectedDate);
					if ( selected == true ) 
					array.pop();
					array.push(selectedDate);
					selected = true;	
				}
			}
			,
			beforeShowDay: function(date){
			var string = jQuery.datepicker.formatDate('mm/dd/yy', date);
			return [ array.indexOf(string) == -1 ]
    }
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			minDate: 0,
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate);
				if ( selected == true ) 
					array.pop();
				array.push(selectedDate);
				selected = true;
			},
			beforeShowDay: function(date){
			var string = jQuery.datepicker.formatDate('mm/dd/yy', date);
			return [ array.indexOf(string) == -1 ]
    }
		});
	});
