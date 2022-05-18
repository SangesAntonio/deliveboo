<template>
	<div class="container">
		<br />

		<h1>Inserisci i dati per il pagamento</h1>

		<v-braintree
			v-if="showDropIn"
			authorization="sandbox_4x2fxjmf_q5k7r9z79n9kztxr"
			:paypal="{ flow: 'vault' }"
			:three-d-secure="false"
			:three-d-secure-parameters="{
				amount: 100,
				email: 'francois@witify.io',
				billingAddress: {
					givenName: 'John',
					surname: 'Doe',

					locality: 'Laval',
					streetAddress: '485 boul. dagenais E',
				},
			}"
			@load="onLoad"
			@loadFail="onLoadFail"
			@success="onSuccess"
			@error="onError"
		>
			<template id="payment" v-slot:button="slotProps">
				<input
					type="submit"
					@click="slotProps.submit"
					class="btn btn-success"
					value="Paga ora"
					:formOrder="formOrder"
				/>
				<button @click="deleteInstance" class="btn btn-danger">
					Svuota i campi
				</button>
			</template>
		</v-braintree>

		<br />

		<h4 class="my-2 text-left">Riepilogo dati</h4>
		<div class="row">
			<div class="col-12 d-flex flex-column">
				<div class="client-name mb-3 text-left">
					<span
						><strong>Nome:</strong> {{ formOrder.client.name }}
						{{ formOrder.client.lastname }}</span
					>
				</div>
				<div class="client-address mb-3 text-left">
					<span
						><strong>Indirizzo:</strong> {{ formOrder.client.address }}</span
					>
				</div>
				<div class="client-email mb-3 text-left">
					<span><strong>Email:</strong> {{ formOrder.client.email }}</span>
				</div>
				<div class="total mb-3 text-left">
					<span><strong>Totale:</strong> {{ total }}&euro;</span>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from "axios";
import { add } from "@braintree/class-list";

export default {
	name: "payment",
	props: ["formOrder", "total", "cart"],
	data() {
		return {
			instance: null,
			showDropIn: true,
		};
	},
	computed: {},
	methods: {
		onLoad(instance) {
			this.instance = instance;
		},
		onLoadFail(instance) {
			console.error("Load fail", instance);
		},
		onSuccess(payload) {
			console.log("Success!", payload.nonce);
			this.modalSuccess();
			axios
				.post("http://127.0.0.1:8000/api/orders/storeorder", this.formOrder)
				.then((res) => {
					console.log("Sono in POST", res.data);
				})
				.catch(function (error) {
					console.log("Sono in error");
				});
			setTimeout(() => {
				this.$router.push({ name: "home" });
			}, 3100);
		},
		onError(error) {
			console.error("Error:", error);
			this.modalWrong();
		},
		clearPaymentSelection() {
			if (this.instance != null) {
				this.instance.clearSelectedPaymentMethod();
			}
		},
		deleteInstance() {
			this.showDropIn = false;
			setInterval(() => {
				this.showDropIn = true;
			}, 1000);
		},
		modalSuccess() {
			// Use sweetalert2
			this.$swal({
				title: "Complimenti!",
				text: "Pagamento effettuato con successo",
				imageUrl: "/img/pubb/clipp-delivery-kradac.gif",
				imageWidth: 500,
				imageHeight: 320,
				imageAlt: "Pagamento effettuato con successo",
				background: "#00CCBC",
				timer: 3000,
			});
		},
		modalWrong() {
			// Use sweetalert2
			this.$swal({
				icon: "error",
				title: "Oops...",
				text: "Qualcosa è andato storto",
				footer: '<a href="#">Perchè ho questo problema?</a>',
				background: "#00CCBC",
				timer: 3000,
			});
		},
	},
	mounted() {},
};
</script>

<style lang="scss" scoped>
</style>