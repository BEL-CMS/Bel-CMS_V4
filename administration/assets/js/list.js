
// >>---------------------------------------- //List  js Start// ---------------------------------------- <<
function addClassElementEvent(element,className,event){

    let elements = document.querySelectorAll(element);

    for(var i = 0; i<elements.length; i++) {
        elements[i].addEventListener(event, function(event) {
            [].forEach.call(elements, function(el) {
                el.classList.remove(className);
            });
            this.classList.add(className);
        });
    }
}

addClassElementEvent('.list-items-active','active','click');

// >> ---------------------------------------- /List js End// ---------------------------------------- <<
