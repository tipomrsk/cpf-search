function searchOrders () {

    const cpf = $("#cpf").val();

    axios.get(`../api/receiver/orders?cpf=${cpf}`)
        .then(response => {
            console.log(response.data);
        })

}

