let add = document.querySelectorAll(".add").length;
let submit = document.getElementById('finish-order');
for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', getPizzas);
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

submit.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    let jsonString = JSON.stringify(allPizzas);
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "../source/order.php");
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(jsonString);

    let a= document.createElement('a');
    a.target= '_blank';
    a.href= 'https://webdev.cs.uwosh.edu/students/schomm42/final-project_cs346/source/thanks_order.php';
    a.click();
});

let selectedPizzas = [];
let allPizzas = [];
function getPizzas(e) {
    const addPizza = document.querySelectorAll('input[type="checkbox"]:checked');
    addPizza.forEach((pizza) => {
        selectedPizzas.push(pizza.value);
    });
    addPizza.forEach((pizza) => {
        pizza.checked=false;
    });
    selectedPizzas.sort();
    e.preventDefault();
}
function addToOrder() {
let orderList = document.getElementById('order');
    for(let i = 0; i < selectedPizzas.length; i++) {
        listItem = document.createElement('li');
        listItem.innerHTML = selectedPizzas[i];
        orderList.appendChild(listItem);
    }
    allPizzas.push(...selectedPizzas);
    console.log(allPizzas);
    selectedPizzas = [];
}
