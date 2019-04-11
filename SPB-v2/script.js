
var	removes;
var	prices;
var	amounts;
var	totals;
var total;
var pp;



document.addEventListener('DOMContentLoaded', function() {
    removes = document.getElementsByClassName("remove");
	
	totals = document.getElementsByClassName("total");
	
	prices = document.getElementsByClassName("price");
	
	amounts = document.getElementsByClassName("amount");
	
	pp = document.getElementById('ppcont');
	
	UpdateTotal();
}, false);


document.addEventListener('click', function (event) {

	if (event.target.matches('.remove')) {
		event.target.parentElement.parentElement.style.display = 'none';
		UpdateTotal();
	}
	
	else if (event.target.matches('.amount')) {
		UpdateTotal();
	}

	else if (event.target.matches('.reset')) {
		
		for(var i = 0; i < removes.length; i++){
			amounts[i].value = 1;
			if(removes[i].parentElement.parentElement.style.display != 'table-row'){
				removes[i].parentElement.parentElement.style.display = 'table-row';
			}
		    UpdateTotal();
		}
	}
	
	else if (event.target.matches('#checkout')){
		
		if(total == 0){
			alert("You haven't choose anything yet!");
		}
		else{
			UpdateTotal();
			pp.style.display = 'block';
			var n = $(document).height();
    		$('html, body').animate({ scrollTop: n }, 500);
		}
	}
	
});


function UpdateTotal(){
	
	pp.style.display = 'none'; 
	
	total = 0;

    for(var a = 0; a < prices.length; a++){
        if(prices[a].parentElement.parentElement.style.display != 'none'){
           var price = prices[a].innerText;
           var amount = amounts[a].value; 
 
           total += (price * amount);
           
	   }
    }
	
	for(var x = 0; x < totals.length; x++){
	    totals[x].textContent = total.toFixed(2);
	}
}

