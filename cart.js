if(document.readyState == 'loading'){			//ensures everything is loaded before buttons are written to
	document.addEventListener('DOMContentLoaded', ready)
}								
else{
	ready()
}

function ready(){
	var addButtons = document.getElementsByClassName('addbtn')		//creates an "array" of all the buttons of specified type
	for (var i = 0; i < addButtons.length; i++) {
        var button = addButtons[i]
        button.addEventListener('click', add)		//writes functions to buttons
    }
	var removeButtons = document.getElementsByClassName('removeButton')
	for (var i = 0; i < removeButtons.length; i++) {
			var button = removeButtons[i]
			button.addEventListener('click', remove)		//ditto
    }
	var removeAllButtons = document.getElementsByClassName('removeAllButton')
	for (var i = 0; i < removeAllButtons.length; i++) {
        var button = removeAllButtons[i]
        button.addEventListener('click', removeall)		//ditto
	}
	var addNoteButtons = document.getElementsByClassName('notebtn')
	for (var i = 0; i < addNoteButtons.length; i++) {
        var button = addNoteButtons[i]
        button.addEventListener('click', addnote)		//ditto
    }
	var readButtons = document.getElementsByClassName('readbtn')
	for (var i = 0; i < readButtons.length; i++) {
        var button = readButtons[i]
        button.addEventListener('click', readnote)		//ditto
    }
}

function add(event){
	var button = event.target				
    var item = button.parentElement			//creates a pointer to the object where the button was clicked
    var dish = item.getElementsByClassName('dish')[0].innerText			//assigns elements to local variables
    var price = item.getElementsByClassName('price')[0].innerText
	var newtotal = (parseFloat(document.getElementsByClassName('totalc')[0].innerText.replace('$', '')) + parseFloat(price)).toFixed(2)		//finds the total then converts it to a double roudned to x.xx
	document.getElementsByClassName('totalc')[0].innerText = '$' + newtotal			//add the value
	add2(dish, price)			//dont know why this needs to be in a seperate function it doesnt work together, idfk
}		

function add2(dish, price){
	var toadd = document.createElement('div')
	var ordered = document.getElementsByClassName('ordered')[0]		//same thing as add
	var names = ordered.getElementsByClassName('dish')
	var nums = ordered.getElementsByClassName("amt")
	var temp = 0
	for(var i = 0; i < names.length; i++){			//checks for duplicate orders and counts if dupicate
		if(names[i].innerText == dish){
			temp = 1
			var quant = parseInt(nums[i].innerText) + 1
			nums[i].innerText = quant
			i = names.length
		}
	}
	if(temp == 1){}			//otherwise adds to order
	else{
		var content = `
			<div class="item">
				<span class="amt">1</span>
				<span class="dish">${dish}</span>
				<span class="price">${price}</span>
				<span class="description"></span>
				<button class="removeButton" type="button">-1</button>
				<button class="removeAllButton" type="button">-ALL</button>
				<button class="notebtn" type="button">Add Note</button>
				<button class="readbtn" type="button">Read Note</button>
			</div>`
		toadd.innerHTML = content 
		ordered.append(toadd)
	}		
	ready()	
}

function remove(event){
	var button = event.target
    var item = button.parentElement		//same as add
	var num = parseInt(item.getElementsByClassName('amt')[0].innerText)
	if(num > 1){
		item.getElementsByClassName('amt')[0].innerText = num - 1		//same as add except subtracts 
	}
	else{
		button.parentElement.remove()
	}
	var newtotal = (parseFloat(document.getElementsByClassName('totalc')[0].innerText.replace('$', '')) - parseFloat(item.getElementsByClassName('price')[0].innerText)).toFixed(2)
	document.getElementsByClassName('totalc')[0].innerText = '$' + newtotal			//just more total calculation
	ready()
	
}

function removeall(event){
	var button = event.target
	var item = button.parentElement			//same as remove except it needed a loop to keep track of the total change
	var newtotal = (parseFloat(document.getElementsByClassName('totalc')[0].innerText.replace('$', ''))).toFixed(2)
	for(var i = 0; i < parseInt(document.getElementsByClassName('amt')[0].innerText); i++){
		newtotal = (parseFloat(newtotal) - parseFloat(item.getElementsByClassName('price')[0].innerText)).toFixed(2)
	}
	document.getElementsByClassName('totalc')[0].innerText = '$' + newtotal
    button.parentElement.remove()
	ready()
}

function addnote(event){
	var button = event.target
	var item = button.parentElement
	var note = prompt("Please enter your note:", item.getElementsByClassName('description')[0].innerText)		//makes an alert that takes an input
	if(note == null || note == ""){	}
	else{
		item.getElementsByClassName('description')[0].innerText = note			//writes the input to its object
	}
}

function readnote(event){
	var button = event.target
	var item = button.parentElement
	var note = item.getElementsByClassName('description')[0].innerText			//reads the note in the object the outputs it
	if(note == null || note == ""){
		alert("No note.")				
	}
	else{
		alert(note)
	}
}

function printsend(){
	var ordered = document.getElementsByClassName('ordered')[0]
	var names = ordered.getElementsByClassName('dish')
	var nums = ordered.getElementsByClassName("amt")
	var descs = ordered.getElementsByClassName("description")				//getting info from objects
	var prices = ordered.getElementsByClassName("price")
	var total = document.getElementsByClassName('totalc')[0].innerText
	for(var i = 0; i < names.length; i++){												//"sends" the order to the chef
		console.log(nums[i].innerText + " order(s) of " + names[i].innerText + " at $" + prices[i].innerText + "          note: " + descs[i].innerText)		
	}
	console.log("Total: " + total)
	var content =`				
	<div class="ordered">
		</div>
		<div class="Total">
			<span class="totalc">$0.00</span>
		</div>
		`					//deletes the order by writing over it
	document.getElementById("orderC").innerHTML = content	
}




	
	
	