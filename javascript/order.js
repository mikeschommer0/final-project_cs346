let add = document.querySelectorAll(".add").length;
let submit = document.getElementById('finish-order');
let orderList = document.getElementById('order');
let clear = document.getElementById('clear-order');

for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', getPizzas);
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

submit.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    let jsonString = JSON.stringify(allPizzas);
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "../source/thanks_order.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.status);
        }
    }
    xhr.send(jsonString);

    let a= document.createElement('a');
    a.target= '_blank';
    a.href= 'https://webdev.cs.uwosh.edu/students/schomm42/final-project_cs346/source/thanks_order.php';
    a.click();

    window.close('','_parent','');
});

let selectedPizzas = [];
let allPizzas = [];
let totalPrice = 0;
function getPizzas(e) {
    const addPizza = document.querySelectorAll('input[type="checkbox"]:checked');
    addPizza.forEach((pizza) => {
        let listing = pizza.value;
        let priceFourteen = listing.includes("14");
        let priceTwenty =  listing.includes("20");
        let priceKnots = listing.includes("W/");
        if(priceFourteen) {
            totalPrice += 18.75;
        }
        if(priceTwenty) {
            totalPrice += 24.50;
        }
        if(priceKnots) {
            totalPrice += 5.00;
        }
        selectedPizzas.push(listing);
    });
    addPizza.forEach((pizza) => {
        pizza.checked=false;
    });
    selectedPizzas.sort();
    e.preventDefault();
}
function addToOrder() {
let currentPrice = document.getElementById('current-price');
let price = totalPrice.toFixed(2);

    for(let i = 0; i < selectedPizzas.length; i++) {
        listItem = document.createElement('li');
        listItem.innerHTML = selectedPizzas[i];
        orderList.appendChild(listItem);
    }

let splitPizzas = [];
    for(let i = 0; i < selectedPizzas.length; i++) {
        let str = selectedPizzas[i];
        let splitListing = str.split("$");
        splitPizzas.push(splitListing[0]);
    }

    currentPrice.innerHTML = `Total: \$${price}`; 
    allPizzas.push(...splitPizzas);
    console.log(allPizzas);
    selectedPizzas = [];
}

clear.addEventListener('click', function(e) {

    while(orderList.firstChild && allPizzas.length) {
        orderList.removeChild(orderList.firstChild);
        allPizzas.pop();
    }
}); 
