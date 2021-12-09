let add = document.querySelectorAll(".add").length;

for (let i = 0; i < add; i++) {
    document.querySelectorAll(".add")[i].addEventListener('click', addToOrder);
}

let selectedPizza;
function addToOrder() {
    let choices = document.querySelectorAll('input[type="radio"]');
        for (const choice of choices) {
            if (choice.checked) {
                selectedPizza = choice.value;
                alert(selectedPizza);
            }
        }
}