


<script>

	export default{


		props:{

			details:{},

			distributortype:{},

			cigars:{},
		},

		created:function(){

			this.loadDetails();

			// this.getAmounts();
		},

		data(){

			return{

				detalle:this.details,

				cigar_id:'',

				customer_type_id:'',

				price:'',

				ProdDist2: [],

				tipoDistribuidor:this.distributortype,

				puros:this.cigars,

				priceExist:false,


			}


		},

		methods:{

			agregrarProd:function(){

				this.validateProduct();

	    		var ProdName = this.getProdName();

	    		// console.log(ProdName);

	    		var DistTypeName = this.getDistType();

	    		// console.log(ProdName); console.log(DistTypeName); console.log(this.Products);  console.log(this.DistribTypes);

	            if(this.validPeriod=='' || this.cigar_id =='' || this.customer_type_id=='' || this.price ==''){

	                toastr.warning('Favor llenar los campos requeridos!');

	            }else{

	                if(!this.priceExist){

	                    this.ProdDist2.push([this.customer_type_id, DistTypeName, this.cigar_id, ProdName, this.price]);

	                    this.customer_type_id= '',

	                    this.cigar_id='',

	                    this.price =''

	                }else{

	                    toastr.error('El precio de producto ya fue agregado!');
	                }
	            }


			},

			validateProduct: function() {

	    		var arregloInterno = [this.customer_type_id, this.cigar_id];

	    		var match = [];

	    		this.ProdDist2.forEach(function(precio){

	    			if((precio[0] == arregloInterno[0]) && (precio[2] == arregloInterno[1])){

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

	    	getProdName:function() {


	    		return this.puros.filter((item) => item.id == this.cigar_id).map((item) => item.name);

	    		// return this.puros.filter((item) => item.id == this.cigar_id);
	    		
	    	},

	    	getDistType:function() {


	    		return this.tipoDistribuidor.filter((item) => item.id == this.customer_type_id).map((item) => item.clienteTipo);

	    		// return this.tipoDistribuidor.filter((item) => item.id == this.customer_type_id);
	    		
	    	},


			loadDetails:function(){

				var cigar_id = this.getCigarId();

				var cigarName = this.getCigarName();

				var customer_type_id = this.getCustomerTypeId();

				var DistTypeName = this.getDistTypeName();

				console.log(DistTypeName);

				var price = this.getPrice();

				for (var i = 0; i < cigar_id.length; i++) {


					this.ProdDist2.push([customer_type_id[i], DistTypeName[i], cigar_id[i], cigarName[i], price[i]]);
				}

				// var price = this.getPrice();

				// for (var i = 0; i < cigar_id.length; i++) {


				// 	this.ProdDist2.push([customer_type_id[i], DistTypeName[i][0].clienteTipo, cigar_id[i], cigarName[i][0].name, price[i]]);
				// }

			},


			getCigarId:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_id;


				});

			},

			getCustomerTypeId:function(){

				return this.detalle.map(function(detail){

					return detail.customer_type_id;
				});
			},

			getPrice:function(){

				return this.detalle.map(function(detail){

					return detail.price;
				});
			},

			getDistTypeName:function(){

				var distribuidor = this.tipoDistribuidor;


				// return this.detalle.map(function(detalle){

				// 	return distribuidor.filter(function(distribuidor, index){

				// 		if(detalle.customer_type_id == distribuidor.id){

				// 			// return distribuidor.clienteTipo;

				// 			return distribuidor;


				// 		}	

				// 	});


				// });

				return this.detalle.map(function(detalle){

					return distribuidor.filter((distribuidor) => detalle.customer_type_id == distribuidor.id).map((item) => item.clienteTipo);


				});


			},


			getCigarName:function(){

				var cigars = this.puros;


				// return this.detalle.map(function(detalle){

				// 	return cigars.filter(function(cigar, index){

				// 		if(detalle.cigar_id == cigar.id){

				// 			return cigar.name;


				// 		}	

				// 	});


				// });


				return this.detalle.map(function(detalle){

					return cigars.filter((cigar) => detalle.cigar_id == cigar.id).map((item) =>item.name);


				});


			},

			removeRow3:function(elemento){

	    		console.log(elemento);

	   			var index = this.ProdDist2.indexOf(elemento);

	   			console.log(index);

	   			if(index > -1){

	   				this.ProdDist2.splice(index, 1);
	   			}


	    	},

		}
	}
	



</script>