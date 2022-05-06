<template>
    <div class="container">
        <h1>"Avrei bisogno di qualche informazione"</h1>
        <div class="form">
            <form>
                <div class="form-row align-items-center py-4">
                    <div class="col-sm-4 my-1">
                        <label class="sr-only" for="inlineFormInputName">Nome</label>
                        <input type="text" class="form-control" id="inlineFormInputName" placeholder="Nome">
                    </div>
                    <div class="col-sm-4 my-1">
                        <label class="sr-only" for="inlineFormInputLastName">Cognome</label>
                        <input type="text" class="form-control" id="inlineFormInputLastName" placeholder="Cognome">
                    </div>
                </div>
                <div class="col-sm-4 mb-4 p-0">
                        <label class="sr-only" for="inlineFormInputPhoneNumber">Numero di Telefono</label>
                        <input type="text" class="form-control" id="inlineFormInputPhoneNumber" placeholder="Numero di Telefono">
                </div>
                <div class="col-sm-10 mb-4 p-0">
                        <label for="inlineFormInputEmail" class="sr-only">Email</label>
                        <input type="email" class="form-control" id="inlineFormInputEmail" placeholder="Email">
                    </div>
                <div class="form-row my-4">
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Citta'">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Provincia">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="CAP">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <div class="col-4 d-flex justify-content-end my-1">
                        <button type="submit" class="btn btn-primary">Vai al Pagamento!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderForm"
}
</script>

<style lang="scss" scoped>
.container{
    margin-top: 150px;
    padding: 20px;
    width: 40%;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 10px 10px 8px 8px rgb(0, 0, 0, 0.3);
    h1, button{
        font-family: 'Koulen', cursive;
    }
    button{
        font-size: 25px;
    }
    ::placeholder{
        font-size: 22px;
        font-family: 'Koulen', cursive;
    }
}
</style>