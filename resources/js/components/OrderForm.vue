<template>
	<div v-if="!payment" class="container">
		<h1>Completa l'ordine</h1>

		<!-- errori nel form -->
		<ul v-if="hasErrors">
			<li v-for="(error, key) in errors" :key="key">{{ error }}</li>
		</ul>

		<div class="form">
			<form method="post" enctype="application/x-www-form-urlencoded">
				<div class="form-row align-items-center py-4">
					<div class="col-sm-4 my-1">
						<label class="sr-only" for="name">Nome</label>
						<input
							v-model.trim="formOrder.client.name"
							required
							min="2"
							type="text"
							class="form-control"
							id="name"
							name="name"
							placeholder="Nome"
						/>
					</div>
					<div class="col-sm-4 my-1">
						<label class="sr-only" for="lastname">Cognome</label>
						<input
							v-model.trim="formOrder.client.lastname"
							required
							min="2"
							type="text"
							class="form-control"
							id="lastname"
							name="lastname"
							placeholder="Cognome"
						/>
					</div>
				</div>
				<div class="col-sm-10 mb-4 p-0">
					<label for="email" class="sr-only">Email</label>
					<input
						required
						v-model.trim="formOrder.client.email"
						type="email"
						class="form-control"
						id="email"
						name="email"
						placeholder="Email"
					/>
				</div>
				<div class="form-row my-4">
					<div class="col-7">
						<input
							v-model.trim="formOrder.client.city"
							required
							type="text"
							class="form-control"
							placeholder="Citta'"
							name="city"
							id="city"
						/>
					</div>
					<div class="col">
						<input
							v-model.trim="formOrder.client.address"
							required
							type="text"
							class="form-control"
							placeholder="Via"
							name="address"
							id="address"
						/>
					</div>
				</div>
				<div class="col-12 d-flex justify-content-between">
					<div class="col-4 d-flex justify-content-end my-1">
						<div @click="gotToCart" class="btn btn-secondary">
							Torna al carrello
						</div>
					</div>
					<div class="col-4 d-flex justify-content-end my-1">
						<div @click="gotTopayment" class="btn btn-primary">
							Vai al Pagamento!
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<PaymentCheckout v-else :formOrder="formOrder" :cart="cart" :total="total" />
</template>

<script>
import PaymentCheckout from "./PaymentCheckout.vue";
import { isEmpty } from "lodash";
export default {
	name: "OrderForm",
	props: ["cart", "total"],
	components: {
		PaymentCheckout,
	},
	data() {
		return {
			checkout: true,
			payment: false,
			errors: {},
			formOrder: {
				client: {
					name: "",
					lastname: "",
					email: "",
					city: "",
					address: "",
				},
				products: [],
				total: 0,
			},
		};
	},
	methods: {
		validateForm() {
			// #validation
			const errors = {};
			if (!this.formOrder.client.email.trim())
				errors.email = "L'email è obbligatoria";
			if (!this.formOrder.client.address.trim())
				errors.address = "L'indirizzo è obbligatorio";
			if (!this.formOrder.client.name.trim())
				errors.message = "Il nome è obbligatorio";

			// controllo che sia una Mail valida
			if (
				this.formOrder.client.email.trim() &&
				!this.formOrder.client.email.match(
					/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/
				)
			)
				errors.email = "La mail non è valida.";
			this.errors = errors;
		},
		//bottone per tornare indietro al carrello dal form
		gotToCart() {
			this.checkout = false;
			return this.$emit("gotToCart", this.checkout);
		},

		//bottone per procedere al pagamento
		gotTopayment() {
			this.validateForm();
			if (!this.hasErrors) {
				this.payment = true;
			}
		},
	},
	computed: {
		hasErrors() {
			return !isEmpty(this.errors);
		},
	},
	mounted() {
		this.formOrder.total = this.total;
		this.formOrder.products = [...this.cart];
	},
};
</script>

<style lang="scss" scoped>
.container {
	h1,
	button {
		font-family: "Koulen", cursive;
	}
	button {
		font-size: 18px;
	}
	::placeholder {
		font-size: 16px;
		font-family: "Koulen", cursive;
	}
}
</style>