"use strict";

/**
 * remove selected pizza from basket
 * @param {*object {count: number, id: number, name: string, price: number, total: number} the seelcted pizza} pizza 
 */
const removePizza = (pizza)=>{
    const filteredPizzas =  order.pizzas.filter((pizzaInOrder)=>pizzaInOrder.id !== pizza.id)
    order.pizzas = filteredPizzas;
    const totalPrice = order.totalPrice - pizza.total;
    order.totalPrice = totalPrice;
    renderOrder();
    if(order.totalPrice === 0){
        placeOrderBtn.disabled = true;
        placeOrderBtn.style.opacity = 0.5;
    }
}