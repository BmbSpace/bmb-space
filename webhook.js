document.getElementById("denunciaForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Impede o envio do formulário padrão

  const webhookURL = "https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD"; // Insira a URL do seu webhook aqui

  const cargoIds = ["1158901413133434990","1172564178544885770"];

  const formData = new FormData(this);

  const data = new Date(formData.get("data"));
  const formattedData = data.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-');

  const cargosMencionados = cargoIds.map(id => `<@&${id}>`).join(' ');

  const file = formData.get("anexo");
  if (file) {
    formData.append("file", file);
  }

  fetch(webhookURL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      content: `**Nome:** ${formData.get("nome")}
      \n**ID:**          ${formData.get("identificador")}
       \n**Data da Ocorrência:**       ${formattedData} 
       \n**URL:**        ${formData.get("url")}
       \n**Descrição:**  ${formData.get("descricao")}
       \n**Atenciosamente:** ${cargosMencionados}`
    }),
    files: formData
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