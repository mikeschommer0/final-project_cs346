let add = document.querySelectorAll(".add").length;

for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', getPizzas);
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

let selectedPizzas = [];
function getPizzas(e) {
    const addPizza = document.querySelectorAll('input[type="checkbox"]:checked');
    addPizza.forEach((pizza) => {
        selectedPizzas.push(pizza.value);
    });
    alert(selectedPizzas);
    e.preventDefault();
}
function addToOrder() {
let orderList = document.getElementById('order');
    for(let i = 0; i < selectedPizzas.length; i++) {
        listItem = document.createElement('li');
        listItem.innerHTML = selectedPizzas[i];
        orderList.appendChild(listItem);
    }
    selectedPizzas = [];
}
