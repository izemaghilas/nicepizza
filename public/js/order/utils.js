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