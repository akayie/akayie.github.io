var EventUtil = {
    addHandler:function (Element,type,handler)
    {
        if(element.addEventlistener){
            element.addEventlistener(type,handler,false);
        }
    }
}