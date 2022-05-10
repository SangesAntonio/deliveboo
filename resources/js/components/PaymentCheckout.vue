<template>
	<div class="container">
		<br />

		<h1>Braintree Demo</h1>

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
					class="btn btn-warning"
					value="Paga ora"
					:formOrder="formOrder"
				/>
			</template>
		</v-braintree>

		<br />

		<br />
		<div class="container">
			<h3 class="mb-3 mt-5">Riepilogo dati</h3>
			<div
				class="row d-flex flex-column justify-content-center align-items-center"
			>
				<div class="col-12">
					<div class="client name mb-3">
						<strong>Nome:</strong> {{ formOrder.client.name }}
						{{ formOrder.client.lastname }}
					</div>
				</div>
				<div class="col-12">
					<div class="client address mb-3">
						<strong>Indirizzo:</strong> {{ formOrder.client.address }}
					</div>
				</div>
				<div class="col-12">
					<div class="client address mb-3">
						<strong>Email:</strong> {{ formOrder.client.email }}
					</div>
				</div>
				<div class="col">
					<h3><strong>Totale ordine: </strong>{{ total }}&euro;</h3>
				</div>
			</div>
		</div>
		<br />

		<button @click="deleteInstance" class="btn btn-danger">
			Svuota i campi
		</button>
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
				this.$router.push("Home");
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
				title: "Deliveboo",
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
				text: "Something went wrong!",
				footer: '<a href="">Why do I have this issue?</a>',
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