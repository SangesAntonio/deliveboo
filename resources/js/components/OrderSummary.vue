<template>
    <div class="container justify-content-center d-flex flex-column align-items-center">
        <h1 class="order-form col-12">
            Riepilogo dell'ordine
        </h1>
        <div class="client-order d-flex justify-content-center col-12 flex-column  p-5">
            <div class="products col-12">
                <ProductSummary/>
            </div>
            <div class="delivery col-12">
                <DeliverySummary/>
            </div>
        </div>
    </div>
</template>

<script>
import ProductSummary from "./summary/ProductSummary.vue";
import DeliverySummary from "./summary/DeliverySummary.vue";
export default {
    name: 'OrderSummary',
    components: {
        ProductSummary,
        DeliverySummary,
    }
}
</script>

<style lang="scss" scoped>
.container{
    width: 40%;
}
.order-form{
    background-color: rgb(223, 219, 219);
    border-radius: 15px;
    margin-top: 200px;
    margin-bottom: 50px;
    font-family: 'Koulen', cursive;
    text-align: center;
    box-shadow: 10px 10px 4px 4px rgb(0, 0, 0, 0.5);
    font-size: 50px;
}
.client-order{
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 10px 10px 4px 4px rgb(0, 0, 0, 0.5);
}
</style>