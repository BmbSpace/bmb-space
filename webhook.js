document.getElementById("denunciaForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
  
    const webhookURL = "https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD"; // Insira a URL do seu webhook aqui
  
    const formData = new FormData(this);
  
    fetch(webhookURL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        content: `**Nome:** ${formData.get("nome")}\n**ID:** ${formData.get("identificador")}\n**Data:** ${formData.get("data")}\n**URL:** ${formData.get("url")}\n**Descrição:** ${formData.get("descricao")}`
      })
    })
    .then(response => {
      if (!response.ok) {
        throw new Error("Erro ao enviar mensagem para o Discord");
      }
      alert("Formulário enviado com sucesso para a Corregedoria !!!");
      document.getElementById("denunciaForm").reset(); // Limpa o formulário
    })
    .catch(error => {
      console.error(error);
      alert("Erro ao enviar mensagem para Corregedoria, por favor tente mais tarde.");
    });
  });