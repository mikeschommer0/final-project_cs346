let add = document.querySelectorAll(".add").length;

for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

function addToOrder() {
    const addPizza = document.querySelectorAll('input[type="checkbox"]:checked');
    let selectedPizzas = [];
    addPizza.forEach((pizza) => {
        selectedPizzas.push(pizza.value);
    });
    alert(selectedPizzas);
}
