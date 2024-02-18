function message (){
    let name= document.getElementById("Nome").value;
    let ID= document.getElementById("ID").value;
    let Date= document.getElementById("Date").value;
    let File= document.getElementById("file").value;
    let URL= document.getElementById("message").value;
    let message= document.getElementById("Descrição").value;

    const webhookurl = "https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD";

    const contents = ["1172564178544885770","1158901413133434990"]

    const request = new XMLHttpRequest ();
    request.open("POST",webhook);
    request.setRequestHeader('Contente-type','application/json');
    const params = {
        content: contentes
    }

    request.send(JSON.stringify(params));

}  