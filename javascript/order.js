let add = document.querySelectorAll(".add").length;
let submit = document.getElementById('finish-order');
let orderList = document.getElementById('order');
let clear = document.getElementById('clear-order');

for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', getPizzas);
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

submit.addEventListener('click', function(e) {
    e.preventDefault(); //stop submit from refreshing page
    e.stopPropagation();
    let jsonString = JSON.stringify(allPizzas); //put order list into json string
    let xhr = new XMLHttpRequest(); 

    xhr.open("POST", "../source/thanks_order.php", true); //set up connection
    xhr.setRequestHeader("Content-type", "application/json"); 
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.status);
        }
    }
    xhr.send(jsonString); //send list back to server

    let a= document.createElement('a'); //click to order confirmation page
    a.target= '_blank';
    a.href= 'https://webdev.cs.uwosh.edu/students/schomm42/final-project_cs346/source/thanks_order.php';
    a.click();

    window.close('','_parent',''); //close page
});

let selectedPizzas = []; //the list of checkboxes
let allPizzas = []; //total pizzas
let totalPrice = 0; //running total
function getPizzas(e) {
    const addPizza = document.querySelectorAll('input[type="checkbox"]:checked');
    addPizza.forEach((pizza) => {
        let listing = pizza.value; //for every checked checkbox, check to see what is checked
        //you can tell what is checked by the string
        let priceFourteen = listing.includes("14"); //14" pizza
        let priceTwenty =  listing.includes("20"); //20" pizza
        let priceKnots = listing.includes("W/");  //garlic knots
        if(priceFourteen) {
            totalPrice += 18.75;
        }
        if(priceTwenty) {
            totalPrice += 24.50;
        }
        if(priceKnots) {
            totalPrice += 5.00; //calculate total price from whatever is checked
        }
        selectedPizzas.push(listing); //push checked pizzas onto display list
    });
    addPizza.forEach((pizza) => {
        pizza.checked = false; //uncheck all currently checked. (for ordering more pizzas before submitting)
    });
    selectedPizzas.sort();//sort list
    e.preventDefault();
}
function addToOrder() {
let currentPrice = document.getElementById('current-price'); //get price list item
let price = totalPrice.toFixed(2);

    for(let i = 0; i < selectedPizzas.length; i++) {
        listItem = document.createElement('li');
        listItem.innerHTML = selectedPizzas[i];
        orderList.appendChild(listItem); //dynamically fill order list from selected pizzas
    }

let splitPizzas = [];
    for(let i = 0; i < selectedPizzas.length; i++) {
        let str = selectedPizzas[i];
        let splitListing = str.split("$");
        splitPizzas.push(splitListing[0]); //separate price from pizza
    }

    currentPrice.innerHTML = `Total: \$${price}`; //display price
    allPizzas.push(...splitPizzas); //save all the selected pizzas into a total pizza list. (for multiple adds)
    console.log(allPizzas);
    selectedPizzas = [];
}

clear.addEventListener('click', function(e) {

    while(orderList.firstChild && allPizzas.length) {
        orderList.removeChild(orderList.firstChild); //clear the pizza list
        allPizzas.pop();
    }
}); 
