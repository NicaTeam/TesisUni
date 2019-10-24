


<script>
	
	export default{

		
		props:{


			companies:{},

			cigars:{},

			prices:[],
		},

		

		data(){


			return {

				company_id:'',

				cigar_id:'',

				cigar_barcode:[],

				brand_name:'',

				quantity:0,

				total_net_weight:0,

				total_boxes:0,

				total_packs:0,

				total_cigars:0,

				shipping_quote:0,

				final_freight_cost:0,

				amount_order_total:0.00,

				grand_total:0.00,

				amount_due:0,

				cliente:this.companies,

				productos:this.cigars,

				precios:this.prices,

				selectedCliente:{},

				selectedProducto:{},

				price:{},

				seletedAgent:{},

				companyPrice:{},

				detail:[],

				detailExist:false,

				noValue:'-',

				

	
			}
		},


		methods:{


			agregrarProd: function(){


	    		this.validateProduct();

	    		var cigar_barcode = this.getCigarBarcode();
	    		var brand_name = this.getBrandName();
	    		var cigar_name = this.getCigarName();
	    		var cigar_size_name = this.getCigarSizeName();
	    		var cigar_netWeight = this.getCigarNetWeight();
	    		var cigar_unitOfMeasurement_name = this.getUnitOfMeasurement();
	    		var cigar_unitsInPresentation = this.getUnitsInPresentation();



	    		//alert(brand_name);

	    		// var DistTypeName = this.getDistType();

	    		// console.log(ProdName); console.log(DistTypeName); console.log(this.Products);  console.log(this.DistribTypes);

	            if(this.cigar_id=='' || cigar_barcode[0] =='' || brand_name[0] =='' || cigar_name == '' || this.price ==''){

	                toastr.warning('Favor llenar los campos requeridos!');

	            }else{

	                if(!this.detailExist){

	                    this.detail.push([this.cigar_id, cigar_barcode[0], brand_name[0], cigar_name[0], cigar_size_name[0], cigar_netWeight[0], this.price[0].price, this.quantity, cigar_unitOfMeasurement_name[0], cigar_unitsInPresentation[0], this.quantity * cigar_unitsInPresentation, this.quantity * this.price[0].price ]);


		                var suma = 0;

		                var boxes = 0;

		                var packs = 0;

		                var totalCigars =0;

		                var amount_order_total =0;

		                var grand_total =0;

		                var selectedTerm = this.selectedCliente.map(function(item){

		                	return item.payment_term.id;


		                });

		                //alert(selectedTerm);

	                    for(let i=0; i< this.detail.length; i++){

	                    	suma = Math.round(suma + (this.detail[i][5] * this.detail[i][10]) * 100)/100;

	                    	if(this.detail[i][8] == 'box/caja'){

	                    		boxes = boxes + parseInt(this.detail[i][7]);


	                    	}

	                    	if(this.detail[i][8] == 'mazo/bundle'){

	                    		packs = packs + parseInt(this.detail[i][7]);


	                    	}

	                    	totalCigars = totalCigars + (this.detail[i][10]);

	                    	amount_order_total = amount_order_total + (this.detail[i][11]);

	                    	if(selectedTerm == 1){

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

	                    this.selectedProducto = {};


	                    // this.cigar_id='';

	                    // this.cigar_barcode= '';

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

	    		this.detail.forEach(function(detail){

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

	    	getCigarBarcode:function(){

	    		 return this.selectedProducto.map(function(producto){

	    		 	return producto.barcode;


	    		 });

	    		 //  var barcode = this.selectedProducto.map(function(producto){

	    		 // 	return producto.cigar_barcode;
	    		 // });


	    		 //  return barcode;


	    		//return this.cigar_barcode = barcode;

	    		 // this.cigar_barcode = this.selectedProducto.map(function(producto){

	    		 // 	return producto.cigar_barcode;
	    		 // });
	    	},

	    	getBrandName:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.brand_group.name;


	    		});

	    		// this.brand_name = this.selectedProducto.map(function(item){

	    		// 	return item.brand_group.name;


	    		// });
	    	},

	    	getCigarName:function(){


	    		return this.selectedProducto.map(function(item){

	    			return item.name;
	    		});
	    	},


	    	getCigarSizeName:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.cigar_size.name;
	    		});
	    	},


	    	getCigarNetWeight:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.netWeight;
	    		});


	    	},

	    	getUnitOfMeasurement:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.unit_of_measurement.name;
	    		});
	    	},


	    	getUnitsInPresentation:function(){

	    		return this.selectedProducto.map(function(item){

	    			return item.unitsInPresentation;
	    		});


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

			buscarPrecio:function(){


				// this.price = this.companyPrice.filter(function(object){

				// 	 return object.filter((item)=> item.cigar_id = this.cigar_id);
				// });

				this.price = this.companyPrice.filter((item) => item.cigar_id == this.cigar_id);

				this.selectedProducto = {},

				this.selectedProducto = this.productos.filter((item) => item.id == this.cigar_id);

				// this.getCigarBarcode();

				// this.getBrandName();


			},

		 	removeRow: function(item){

	    		console.log(item);

	    		var index = this.detail.indexOf(item);

	    		console.log(index);
				if (index > -1) {
				  this.detail.splice(index, 1);
				}


	    	},


			// buscarProducto:function(){

			// 	this.selectedProducto = {},

			// 	this.selectedProducto = this.productos.filter((item) => item.id == this.cigar_id);

			// }



		},


		computed:{

	    	searchCompany: function(){

	    		this.selectedCliente ={},


	    		this.selectedCliente = this.cliente.filter((item) => item.id == this.company_id);

	    		// this.companyPrice = this.prices.filter((item) => item.customer_type_id == this.selectedCliente.customer_type_id);

	    		 return this.selectedCliente;

	    	},

	    	// searchAgent:function(){

	    	// 	alert(clienteId);


	    	// 	this.seletedAgent = this.cliente.filter((item) =>item.id == this.);

	    	// 	alert(this.seletedAgent);

	    	// 	return this.seletedAgent;
	    	// }

	    }





	}

</script>