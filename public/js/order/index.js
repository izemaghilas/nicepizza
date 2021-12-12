"use strict";

// basket structure
// pizza: {count: number, id: number, name: string, price: number, total: number}
// {pizzas: array of pizza, orderedAt: Datetime, totalPrice: number}
const order = {
    pizzas: [],
    orderedAt: "",
    totalPrice: 0.00
};

const URL = "http://127.0.0.1:8000";

const addPizzaBtns = document.querySelectorAll("#btn-add-pizza");
const placeOrderBtn = document.getElementById("place-order-btn");
const orderedPizzasContainer = document.querySelector(".container-ordered-pizzas");
const totalPriceElement = document.getElementById("total-price");

addPizzaBtns.forEach(btn=>{
    btn.addEventListener('click', (ev)=>{
        ev.stopPropagation();
        const pizza = JSON.parse(btn.dataset.pizza);
        const numberOfPizzas = parseInt(document.getElementById("number-of-pizza"+pizza.id).value);
        addPizza(pizza, numberOfPizzas);
    })
})

placeOrderBtn.addEventListener('click', (ev)=>{
    ev.stopPropagation();

    let httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = ()=>{
        if(httpRequest.readyState === XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                console.log(httpRequest.responseText);
            }
        }
    }

    httpRequest.open("POST", URL+"/order");
    httpRequest.setRequestHeader('Content-Type', "application/json");
    order.orderedAt = new Date();
    httpRequest.send(JSON.stringify(order));
})