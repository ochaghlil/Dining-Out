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
	var ordered = document.getElementsByClassName('ordered')[0]
	var nums = ordered.getElementsByClassName("amto")
	var prices = ordered.getElementsByClassName("priceo")
	var total = 0
	for(var i = 0; i < nums.length; i++){												//"sends" the order to the chef
		total = total + nums[i].innerText * prices[i].innerText 
	}
	document.cookie="subtotal=" + total + ";";
	document.getElementsByClassName('totalc')[0].innerText = "$" + total.toFixed(2)
	

}

function add(event){
	var button = event.target				
    var item = button.parentElement			//creates a pointer to the object where the button was clicked
    var dish = item.getElementsByClassName('dish')[0].innerText			//assigns elements to local variables
    var price = item.getElementsByClassName('price')[0].innerText
	add2(dish, price)			//dont know why this needs to be in a seperate function it doesnt work together, idfk
}		

function add2(dish, price){
	var toadd = document.createElement('div')
	var ordered = document.getElementsByClassName('ordered')[0]		//same thing as add
	var names = ordered.getElementsByClassName('disho')
	var nums = ordered.getElementsByClassName("amto")
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
				<span class="amto">1</span>
				<span class="disho">${dish}</span>
				<span class="priceo">${price}</span>
				<span class="descriptiono"></span>
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
	var num = parseInt(item.getElementsByClassName('amto')[0].innerText)
	if(num > 1){
		item.getElementsByClassName('amto')[0].innerText = num - 1		//same as add except subtracts 
	}
	else{
		button.parentElement.remove()
	}
	ready()
	
}

function removeall(event){
	var button = event.target
	var item = button.parentElement			//same as remove except it needed a loop to keep track of the total change
    button.parentElement.remove()
	ready()
}

function addnote(event){
	var button = event.target
	var item = button.parentElement
	var note = prompt("Please enter your note:", item.getElementsByClassName('descriptiono')[0].innerText)		//makes an alert that takes an input
	if(note == null || note == ""){	}
	else{
		item.getElementsByClassName('descriptiono')[0].innerText = note			//writes the input to its object
	}
}

function readnote(event){
	var button = event.target
	var item = button.parentElement
	var note = item.getElementsByClassName('descriptiono')[0].innerText			//reads the note in the object the outputs it
	if(note == null || note == ""){
		alert("No note.")				
	}
	else{
		alert(note)
	}
}

function printsend(){
	alert(getCookie("subtotal"))
	var ordered = document.getElementsByClassName('ordered')[0]
	var names = ordered.getElementsByClassName('disho')
	var nums = ordered.getElementsByClassName("amto")
	var descs = ordered.getElementsByClassName("descriptiono")				//getting info from objects
	var prices = ordered.getElementsByClassName("priceo")
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
	window.location.href="payment.html"
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

//interface functions

///////////////////////////////Search
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var menu = ["burger","taco","lobster","blueberry lemonade","apple pie", "garlic soup", "2015 Opus One","Duckhorn Napa Valley"];

/*initiate the autocomplete function on the "myInput" element, and pass along the menu array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), menu);
