
<script>

	export default{


		props:{


			orders:{},
		},

		data(){


			return{


				ordenes:this.orders,

				order_id:'',

				selectedOrder:{},

				amount_due:0,

				net_amount_paid:0,

				external_bank_commission:0,

				internal_bank_commission:0,

				new_amount_due:0,

				payment_not_complete:false,

			}
		},

		methods:{


			buscarAmountDue:function(){

				this.selectedOrder = this.ordenes.filter((item) => item.id == this.order_id);

				this.amount_due = this.selectedOrder.map(function(item){

					return item.amount_due;
				});


			},

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

				return this.new_amount_due = Math.round((net_amount_paid + external_bank_commission + internal_bank_commission - amount_due) *100)/100 ;

				// suma = Math.round(suma + (this.detail[i][5] * this.detail[i][10]) * 100)/100;


				


			},


			


			calcular:function(){

				return this.new_amount_due = this.net_amount_paid + this.external_bank_commission + this.internal_bank_commission - this.amount_due;


			}
		},

		computed:{






		}




	}
	



</script>