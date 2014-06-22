


function createSelectedRoomsString(){
	var selectedRooms=" ";
	var totalPrice = 0;

	$('input:checkbox.singleRoomCheckbox').each(function () {
    	if(this.checked) {
    		selectedRooms= selectedRooms +" "+this.id.replace("room","");
    		
    	}
  });
	$('input:checkbox.doubleRoomCheckbox').each(function () {
    	if(this.checked) {
    			selectedRooms= selectedRooms +" "+this.id.replace("room","");
    		
    	}
  });
	$('input:checkbox.tripleRoomCheckbox').each(function () {
    	if(this.checked) {
    			selectedRooms= selectedRooms +" "+this.id.replace("room","");
    		
    }
  });
	$("#selectedRooms").val(selectedRooms);


	
}


var selectedRooms = new Array();
var totalPrice = 0;
function updateSelectedRooms(rowNumber,type,element,roomId,numberOfDays){

updateTotalCost(type,rowNumber,element,numberOfDays);

}

function updateTotalCost(type,rowNumber,element,numberOfDays){
	var roomType;
	if(type==1)
		roomType = "single";
	else
		if(type==2)
			roomType="double";
		else
			if(type==3)
				roomType="triple";
	var roomName = roomType+"RoomPrice"+rowNumber;
	var totalRoomCost = parseInt($("#"+roomName).html());

	var totalCost = parseInt($("#totalReservationCost").val());

	if(element.checked){
		totalCost = totalCost + (totalRoomCost * parseInt(numberOfDays));
	}
	else{
		totalCost = totalCost - (totalRoomCost * parseInt(numberOfDays));
	}
	$("#totalReservationCost").val(totalCost);
}

function updateSum(amount,number,type,element,roomId,numberOfDays){

var rowNumber = number;
var roomType;
if(type==1)
	roomType = "single";
else
	if(type==2)
		roomType="double";
	else
		if(type==3)
			roomType="triple";

var priceElement = roomType+"RoomPrice"+rowNumber;
var totalAmount = parseInt($("#"+priceElement).html());
if(element.checked){
	totalAmount = totalAmount + amount;
}
else{
	totalAmount = totalAmount - amount;
}
$("#"+priceElement).html(totalAmount);

//update global cost
var totalCost = parseInt($("#totalReservationCost").val());
if(document.getElementById("room"+roomId).checked){
		if(element.checked){
			totalCost = totalCost + (amount * parseInt(numberOfDays));
		}
		else{
			totalCost = totalCost - (amount * parseInt(numberOfDays));
		}
		$("#totalReservationCost").val(totalCost);
	}
}