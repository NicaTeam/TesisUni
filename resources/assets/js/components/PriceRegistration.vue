<script>

	export default{


		data(){

			return{

		    	DistribTypes: [],

		    	Products:[],

		    	customer_type_id: '',

		    	cigar_id:'',

		    	ProdDist: [],

		    	priceExist: false,

		    	cont: 0,

		    	price:'',

		    	name:'',

		    	validPeriod: '',

		    	cigar_id: '',

		    	customer_type_id: '',

		    	errors: []

				

			}
		},

	    created:function () {
	    	this.getDistribType();

	    	this.getProduct();

	    },


	    methods:{

	    	agregrarProd: function(){

	    		// this.ProdDist.push([this.DistribTypeId, this.ProdId]); alert(validateProduct());

	    		this.validateProduct();

	    		var ProdName = this.getProdName();

	    		var DistTypeName = this.getDistType();

	    		// console.log(ProdName); console.log(DistTypeName); console.log(this.Products);  console.log(this.DistribTypes);

	            if(this.validPeriod=='' || this.cigar_id =='' || this.customer_type_id=='' || this.price ==''){

	                toastr.warning('Favor llenar los campos requeridos!');

	            }else{

	                if(!this.priceExist){

	                    this.ProdDist.push([this.customer_type_id, DistTypeName, this.cigar_id, ProdName, this.price]);

	                    this.customer_type_id= '',

	                    this.cigar_id='',

	                    this.price =''

	                }else{

	                    toastr.error('El precio de producto ya fue agregado!');
	                }
	            }

	    	},


	    	getDistribType: function(){

	    		axios.get('/axiosdistribType').then(response => {

	    			this.DistribTypes = response.data;


	    		});
	    	},

	    	getProduct: function(){

	    		axios.get('/axiosproduct').then(response => {

	    			this.Products = response.data;

	    		});

	    	},

	    	validateProduct: function() {

	    		var arregloInterno = [this.customer_type_id, this.cigar_id];

	    		var match = [];

	    		this.ProdDist.forEach(function(precio){

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


	    		return this.Products.filter((item) => item.id == this.cigar_id).map((item) => item.name);
	    		
	    	},

	    	getDistType:function() {


	    		return this.DistribTypes.filter((item) => item.id == this.customer_type_id).map((item) => item.clienteTipo);
	    		
	    	},

	    	removeRow: function(item){

	    		console.log(item);

	    		var index = this.ProdDist.indexOf(item);
				if (index > -1) {
				  this.ProdDist.splice(index, 1);
				}


	    	},


	    	createPrice: function(){

	    		var url = 'price-registration';

	    		axios.post(url, {

	    			validPeriod: this.validPeriod,

	    			cigar_id: this.cigar_id,

	    			customer_type_id: this.customer_type_id,

	    			price: this.price,
	    		}).then(response => {

	    			this.validPeriod = '';
	    			this.cigar_id = '';
	    			this.customer_type_id ='';
	    			this.price ='';

	    			toastr.success('Registo de precios creado con exito!');
	    		}).catch(error => {

	    			this.errors =error.response.data
	    		});
	    	}


	    },

	    computed:{
	    	searchProduct: function(){
	    		return this.Products.filter((item) => item.name.toLowerCase().includes(this.name));
	    	}

	    }

	
	}
	


</script>