/**
 * render notification container
 * @param {*string the message to display} message 
 */
const renderNotification = (message)=>{
    const body = document.getElementsByTagName("body")[0];
    let container = document.getElementById("notification");
    if(container){
        if(container.firstChild){
            container.removeChild( container.firstChild );
        }
        container.appendChild( notification(message) );
    }
    else{
        container = document.createElement("div");
        container.setAttribute("id", "notification");
        container.setAttribute("class", "notification-container");
        container.appendChild( notification(message) );
        body.appendChild(container);
    }

}