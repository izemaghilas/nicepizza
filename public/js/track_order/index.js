"use strict";

const orderStatus = {
    preparing: {
        code: 0,
        message: "préparation"
    },
    baking: {
        code: 1,
        message: "cuisson"
    },
    ready: {
        code: 2,
        message: "prête"
    }
};

const orderStatusElement = document.getElementById("order-status");

const sleep = (ms)=>{
    return new Promise(resolve=>setTimeout(resolve, ms));
}

const setOrderStatus = (status)=>{
    if(orderStatusElement.firstChild){
        orderStatusElement.removeChild(orderStatusElement.firstChild);
    }
    orderStatusElement.append(status.message.toUpperCase());
}

const greeting = ()=>{
    const message = "Merci pour votre visite !";
    const mainElement = document.getElementsByTagName("main")[0];
    while(mainElement.firstChild){
        mainElement.removeChild(mainElement.firstChild);
    }
    const container = document.createElement("div");
    container.style = `
        display: flex;
        flex-direction: column;
    `;

    const spanElement = document.createElement("span");
    spanElement.style = `
        font-size: xx-large;
        font-weight: bold;
        font-style: italic;
    `;

    spanElement.append(message);
    container.appendChild(spanElement);
    mainElement.appendChild(container);
}

// update order status
const update = async ()=>{
    await sleep(5000);
    setOrderStatus(orderStatus.baking);

    await sleep(5000);
    setOrderStatus(orderStatus.ready);

    await sleep(1000);
    greeting();
}
setOrderStatus(orderStatus.preparing);
update();
