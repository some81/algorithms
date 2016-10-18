class SheKnows {
    constructor(){
        /* Create a json variable
         */
        this.json = {
            "timestamp" : Date.now(),
            "title" : escape(document.title),
            "hostname" : window.location.hostname,
            "iframe" : this.iframe()
        };
        //if tag is inside iframe, get parent hostname
        this.parentHost();
        //Post data to api in JSON format
        this.post();
    }
    
    parentHost (){
        if(this.json.iframe == "Yes"){
            return parent.window.document.location.hostname + "," + window.location.hostname;
        }
    }
    
    iframe(){
        if(window.frameElement){
            return "Yes";
        }
        return "No";
    }
    
    post (){
        var json_upload = "data=" + JSON.stringify(this.json);
        var xmlhttp = new XMLHttpRequest();   
        xmlhttp.open("POST", "api.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(json_upload);
    }
}

sheknows = new SheKnows();
console.log(sheknows);
