

<script>

	export default{


		props:{


			payment:{},
		},

		data(){


			return{


				// ordenes:this.orders,

				order_id:this.payment.order_id,

				// selectedOrder:{},

				amount_due:this.payment.amount_due,

				net_amount_paid:this.payment.net_amount_paid,

				external_bank_commission:this.payment.external_bank_commission,

				internal_bank_commission:this.payment.internal_bank_commission,

				new_amount_due:0,

				payment_not_complete:false,

			}
		},

		methods:{



			calcularNuevoMontoAdeudado:function(){

				// var new_amount_due = this.calcular();

				// this.new_amount_due = new_amount_due;

				var net_amount_paid = parseFloat(this.net_amount_paid);

				var external_bank_commission = parseFloat(this.external_bank_commission);

				var internal_bank_commission = parseFloat(this.internal_bank_commission);

				var amount_due = parseFloat(this.amount_due);

				var new_amount_due = net_amount_paid + external_bank_commission + internal_bank_commission - amount_due;


				if(new_amount_due < 0 ){


					toastr.warning('El pago no esta completo!');

					this.payment_not_complete = true;

				}

				return this.new_amount_due = net_amount_paid + external_bank_commission + internal_bank_commission - amount_due;

			},


			calcular:function(){

				return this.new_amount_due = this.net_amount_paid + this.external_bank_commission + this.internal_bank_commission - this.amount_due;


			}
		},

		computed:{






		}




	}
	



</script>