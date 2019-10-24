

<script>
	
	export default{

		
		props:{

			cigars:{},

			details:{},

			prices:[],

			order:[],

		},

		created:function(){

			this.loadDetails();

			this.getAmounts();
		},

		data(){


			return{

				detailProducts:[],

				detalle:this.details,

				cigar_id:'',

				companyPrice:{},

				precios:this.prices,

				orden:this.order,

				price:[],

				productos:this.cigars,

				selectedProducto:{},

				quantity:0,

				detailExist:false,

				total_net_weight:0,

				payment_term:this.order.payment_term_name,

				total_boxes:0,

				total_packs:0,

				total_cigars:0,

				shipping_quote:0,

				final_freight_cost:0,

				amount_order_total:0.00,

				grand_total:0.00,

				amount_due:0,

	
			}
		},

		


		methods:{


			agregrarProd: function(){


	    		this.validateProduct();


	    		var brand_name = this.getBrandName2();
	    		var cigar_name = this.getCigarName2();
	    		var cigar_size_name = this.getCigarSizeName2();
	    		var cigar_barcode = this.getCigarBarcode2();
	    		var cigar_unitOfMeasurement_name = this.getUnitOfMeasurement2();
	    		var cigar_unitsInPresentation = this.getUnitsInPresentation2();
	    		var cigar_netWeight = this.getCigarNetWeight2();

	            if(this.cigar_id=='' || cigar_barcode[0] =='' || brand_name[0] =='' || cigar_name == '' || cigar_name == '' || cigar_size_name == '' || cigar_unitOfMeasurement_name == '' || this.price ==''){

	                toastr.warning('Favor llenar los campos requeridos!');

	            }else{

	                if(!this.detailExist){

	                    this.detailProducts.push([this.cigar_id, cigar_barcode[0], brand_name[0], cigar_name[0], cigar_size_name[0], cigar_netWeight[0], this.quantity, cigar_unitOfMeasurement_name[0], cigar_unitsInPresentation[0], this.quantity * cigar_unitsInPresentation, this.price[0].price, this.quantity * this.price[0].price ]);

	                    this.getAmounts();


		              

	                    this.selectedProducto = {};

	                    this.quantity= '';

	                    this.price ='';

	                }else{

	                    toastr.error('Este producto ya fue agregado!');
	                }

                  	
	            }

	    	},

	    	validateProduct: function() {

	    		var arregloInterno = [this.cigar_id];

	    		var match = [];

	    		this.detailProducts.forEach(function(detail){

	    			if((detail[0] == arregloInterno[0])){

	    				match.push(arregloInterno);

	    			}
	    		});

	    		if(match.length > 0){

	    			return this.detailExist = true;
	    		}else{

	    			return this.detailExist = false;
	    		}

	    		arregloInterno = [];

	    	},

	    	getAmounts:function(){

	    		  var suma = 0;

		                var boxes = 0;

		                var packs = 0;

		                var totalCigars =0;

		                var amount_order_total =0;

		                var grand_total =0;

		          
	                    for(let i=0; i< this.detailProducts.length; i++){

	                    	suma = suma + (this.detailProducts[i][5] * this.detailProducts[i][9]);

	                    	if(this.detailProducts[i][7] == 'box/caja'){

	                    		boxes = boxes + parseInt(this.detailProducts[i][6]);

	                    	}

	                    	if(this.detailProducts[i][7] == 'mazo/bundle'){

	                    		packs = packs + parseInt(this.detailProducts[i][6]);

	                    	}

	                    	totalCigars = totalCigars + (this.detailProducts[i][9]);

	                    	amount_order_total = amount_order_total + (this.detailProducts[i][11]);

	                    	if(this.payment_term == 'Antes de envio'){

	                    		grand_total = amount_order_total + parseInt(this.shipping_quote);

	                    	}else {

	                    		grand_total = amount_order_total + parseInt(this.final_freight_cost);
	                    	}

	                    }

	                    this.total_net_weight = suma;

	                    this.total_boxes = boxes;

	                    this.total_packs = packs;

	                    this.total_cigars = totalCigars;

	                    this.amount_order_total = amount_order_total;

	                    this.grand_total = grand_total;

	                    this.amount_due = grand_total;
	    	},



	    	getBrandName2:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.brand_group.name;

	    		});

	    	},

	    	getCigarName2:function(){


	    		return this.selectedProducto.map(function(item){

	    			return item.name;
	    		});
	    	},

	    	getCigarSizeName2:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.cigar_size.name;
	    		});
	    	},

	    	getCigarBarcode2:function(){

	    		 return this.selectedProducto.map(function(producto){

	    		 	return producto.barcode;


	    		 });

	    	},

	    	getUnitOfMeasurement2:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.unit_of_measurement.name;
	    		});
	    	},

	    	getUnitsInPresentation2:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.unitsInPresentation;
	    		});

	    	},

	    	getCigarNetWeight2:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.netWeight;
	    		});


	    	},


			loadDetails:function(){

				var cigar_id = this.getCigarId();

				var cigar_barcode = this.getCigarBarcode();

				var brand_name = this.getBrandName();

				var cigar_name = this.getCigarName();

				var cigar_size_name = this.getCigarSizeName();

				var cigar_netWeight = this.getCigarNetWeight();

				var quantity = this.getQuantity();

				var cigar_unitOfMeasurement_name = this.getCigarUnitOfMeasurement();

				var cigar_unitsInPresentation = this.getCigarUnitsInPresentation();

				var cigar_price = this.getCigarPrice();

				console.log(cigar_id);

				for(let i=0; i<cigar_id.length; i++){

					// console.log(cigar_id[i]);

					this.detailProducts.push([cigar_id[i], cigar_barcode[i], brand_name[i], cigar_name[i], cigar_size_name[i], cigar_netWeight[i], quantity[i], cigar_unitOfMeasurement_name[i], cigar_unitsInPresentation[i], (quantity[i] * cigar_unitsInPresentation[i]), cigar_price[i], (quantity[i] * cigar_price[i])]);

				}


			},


			getCigarId:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_id;


				});

			},

			getCigarBarcode:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_barcode;


				});

			},

			getBrandName:function(){

				return this.detalle.map(function(detail){

					return detail.brand_name;


				});

			},

			getCigarName:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_name;


				});

			},

			getCigarSizeName:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_size_name;


				});

			},

			getCigarNetWeight:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_netWeight;


				});

			},

			getQuantity:function(){

				return this.detalle.map(function(detail){

					return detail.quantity;


				});

			},

			getCigarUnitOfMeasurement:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_unitOfMeasurement_name;


				});

			},

			getCigarUnitsInPresentation:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_unitsInPresentation;


				});

			},

			getCigarPrice:function(){

				return this.detalle.map(function(detail){

					return detail.cigar_price;


				});

			},

			removeRow2:function(elemento){

	    		console.log(elemento);

	    		// this.detailProducts.splice(elemento, 1);

	   //  		console.log(index);
				if (elemento > -1) {
				  this.detailProducts.splice(elemento, 1);
				}

				this.getAmounts();


	    	},

	    	buscarCompany:function(){

				this.selectedCliente ={};

				this.detail = [];

				this.total_net_weight = 0;

                this.total_boxes = 0;

                this.total_packs = 0;

                this.total_cigars = 0;

                this.amount_order_total = 0;

                this.grand_total = 0;

                this.amount_due = 0;


	    		this.selectedCliente = this.cliente.filter((item) => item.id == this.company_id);

	    		var id = this.selectedCliente.map(function(cliente){

	    			return cliente.customer_type_id;


	    		});

	    		// this.buscarPrice();

	    		this.companyPrice = this.precios.filter((item) => item.customer_type_id == id);

			},


			searchPrice:function(){

				this.price = this.precios.filter((item) => item.cigar_id == this.cigar_id);

				this.selectedProducto = {},

				this.selectedProducto = this.productos.filter((item) => item.id == this.cigar_id);

			},


 	
	    }





	}

</script>