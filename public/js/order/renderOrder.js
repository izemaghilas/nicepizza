"use strict";

/**
 * build a HTMLElement div block to contain the pizza details 
 * @param {*object {count: number, id: number, name: string, price: number, total: number} the selected pizza} pizza 
 * @param {*boolean if the pizza is the lastont on list} isLastElement 
 * @returns {*HTMLElement the container of pizza details } 
 */
 const buildPizzaElement = (pizza, isLastElement)=>{
    const containerElement = document.createElement("div");
    containerElement.setAttribute("class", "ordered-pizza");
    
    const orderedPizzaCounterElement = document.createElement("div");
    orderedPizzaCounterElement.setAttribute("class", "container-ordred-pizza-counter");

    const numberOfPizzasElement = document.createElement("span");
    numberOfPizzasElement.append(pizza.count+" x ");
    
    const pizzaNameElement = document.createElement("span");
    pizzaNameElement.setAttribute("class", "pizza-name")
    pizzaNameElement.append(pizza.name);

    const orderedPizzaTotalPrice = document.createElement("span");
    orderedPizzaTotalPrice.append(priceToString(pizza.total)+" €");
    orderedPizzaTotalPrice.setAttribute("class", "ordered-pizza-price");

    orderedPizzaCounterElement.appendChild(numberOfPizzasElement);
    orderedPizzaCounterElement.appendChild(pizzaNameElement);
    orderedPizzaCounterElement.appendChild(orderedPizzaTotalPrice);

    const removeOrdredPizzaBtn = document.createElement("button");
    removeOrdredPizzaBtn.setAttribute("id", "btn-remove-ordred-pizza")
    removeOrdredPizzaBtn.append("SUPPRIMER");
    removeOrdredPizzaBtn.addEventListener("click", (ev)=>{
        ev.stopPropagation();
        removePizza(pizza);
    })

    containerElement.appendChild(orderedPizzaCounterElement);
    containerElement.appendChild(removeOrdredPizzaBtn);

    if(isLastElement === false){
        containerElement.style.borderBottom = "1px dashed #000";
    }

    return containerElement;
}

/**
 * render the order object,
 * called each time the order object had been updated
 */
const renderOrder = ()=>{
    while(orderedPizzasContainer.firstChild){
        orderedPizzasContainer.removeChild(orderedPizzasContainer.firstChild);
    }
    
    for(let i=0; i<order.pizzas.length; i++){
        if(i === order.pizzas.length-1){
            orderedPizzasContainer.appendChild( buildPizzaElement(order.pizzas[i], true) );
        }
        else{
            orderedPizzasContainer.appendChild( buildPizzaElement(order.pizzas[i], false) );
        }
    }

    if(totalPriceElement.firstChild){
        totalPriceElement.removeChild(totalPriceElement.firstChild);
    }
    totalPriceElement.append(priceToString(order.totalPrice)+" €");
}