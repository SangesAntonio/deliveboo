import Vue from "vue";

import "./plugin";


var gateway = braintree.connect({
    environment: braintree.Environment.Sandbox,
    merchantId: "q5k7r9z79n9kztxr",
    publicKey: "pzkscj374jvzphmf",
    privateKey: "e29e96117b51275a1931a732c72f8cdb",
});

gateway.clientToken.generate({}, function (err, response) {
    var clientToken = response.clientToken;
    console.log(clientToken);
});

Vue.config.productionTip = false;

new Vue({
    render: (h) => h(Payment),
}).$mount("#app");