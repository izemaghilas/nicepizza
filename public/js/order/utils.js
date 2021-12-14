"use strict";

/**
 * get the float number from the price
 * as the price is stored as int in the database
 * @param {*number the pizza price} price 
 * @returns {*string float format of the price}
 */
const priceToString = (price)=>{
    let str = price.toString();
    // adding 0, if the length of str is less than 3
    // to have a nice rendered total price
    while(str.length < 3){
        str+="0";
    }

    const integerPart = str.substring(0, str.length-2);
    const decimalPart = str.substring(str.length-2);

    return integerPart+"."+decimalPart;
}


/**
 * create a notification container
 * @param {*string the message to display} message 
 * @returns {*HTMLDocument the notification container}
 */
 const notification = (message)=>{
    const container = document.createElement("div");
    container.style = 
        `
            display: flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px;
            background-color: #fff;
            opacity: 0.8;
            border-radius: 10px;
            border: 1px solid rgba(0,0,0,.12);
            height: 50px;
        `;

    const checkIcon = document.createElement("i");
    checkIcon.setAttribute("class", "bi bi-check-circle-fill");
    checkIcon.style = 
        `
            font-size: xx-large;
            color: #efd159;
        `;
    
    const messageSpan = document.createElement("span");
    messageSpan.style = 
        `
            margin-left: 20px;
            font-size: x-large;
            font-weight: 800;
            color: #000;
        `;
    messageSpan.append(message);

    container.appendChild(checkIcon);
    container.appendChild(messageSpan);

    return container;
}