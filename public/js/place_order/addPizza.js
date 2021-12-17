"use strict";

/**
 * add the selected pizza to basket
 * @param {*object {count: number, id: number, name: string, price: number, total: number} the selected pizza} pizza 
 * @param {*number how many of the selected pizza} numberOfPizzas 
 */
const addPizza = (pizza, numberOfPizzas)=>{
    let index = order.pizzas.findIndex((pizzaInOrder)=>pizzaInOrder.id === pizza.id);
    if(index === -1){
        order.pizzas.push({
            count: numberOfPizzas,
            id: pizza.id,
            name: pizza.name,
            price: pizza.price,
            total: pizza.price * numberOfPizzas
        });
        let orderTotalPrice = order.totalPrice + (pizza.price * numberOfPizzas);
        order.totalPrice = orderTotalPrice
    }
    else{
        const pizzaInOrder = order.pizzas[index];
        const count = pizzaInOrder.count + numberOfPizzas;
        const total = count * pizza.price;
        pizzaInOrder.count = count;
        pizzaInOrder.total = total;
        let orderTotalPrice = order.totalPrice + (pizza.price * numberOfPizzas);
        order.totalPrice = orderTotalPrice
    }
    renderOrder();
    placeOrderBtn.disabled = false;
    placeOrderBtn.style.opacity = 1;

    renderNotification("Ajouté au panier");
    setTimeout(()=>{
        const notification = document.getElementById("notification");
        if(notification.firstChild){
            notification.removeChild(notification.firstChild);
        }
    }, 1000);
}