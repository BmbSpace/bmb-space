function message (){
    let name= document.getElementById("Nome").value;
    let ID= document.getElementById("ID").value;
    let Date= document.getElementById("Date").value;
    let URL= document.getElementById("message").value;
    let message= document.getElementById("Descrição").value;

    const webhook = "https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD";

    const contents = `Name: ${name}\nMessage${Message}`;

    const request = new XMLHttpRequest ();
    request.open("POST",webhook);
    request.setRequestHeader('Contente-type','application/json');
    const params = {
        content: contentes
    }

    request.send(JSON.stringify(params));

}  