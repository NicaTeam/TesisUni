
<script>

	export default{


		props:{


			prices:{},

		},


		data(){

			return{

				price_registration_id:'',

				cigar_id:'',

				customer_type_id:'',

				price:'',

				precios:this.prices,

				priceExist:false,



			};
		},

		methods:{

			createPrice:function(){

	            this.validateProduct();

                if(this.priceExist){

                        toastr.warning('El precio para este producto y distribuidor ya existe!');

                }

	   
	        },


	        validateProduct: function() {

	            var arregloInterno = [this.customer_type_id, this.cigar_id];

	            var match = [];

	            this.precios.forEach(function(precio){

	                if((precio.customer_type_id == arregloInterno[0]) && (precio.cigar_id == arregloInterno[1])){

	                    match.push(arregloInterno);

	                }
	            });

	            if(match.length > 0){

	                return this.priceExist = true;
	            }else{

	                return this.priceExist = false;
	            }

	            arregloInterno = [];

	        },

		}
	}
	


</script>