<template>
    <!-- <div class="container"> -->
    <div>
        <!-- <div class="row justify-content-center"> -->
        <div class="row">    

            <div class="col-sm-7">

                    <a href="#" class="btn btn-success btn-sm" title="Agregar un producto" data-toggle="modal" data-target="#createProduct" @click="showCreateModal = true"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo Producto

                    </a>
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de productos</div>

                       <!--  <div class="level"> -->


                            <!-- <div class="flex"> -->
                                
                            



                            <!-- </div>  -->

                        <!-- </div> -->
                    <div class="panel-body">
                        <input type="text" v-on:keyup.prevent="search" placeholder="Buscar...." v-model="busqueda">

                        <div v-for="cigar in cigars" class="panel panel-default">

                            <div class="panel-heading">{{ cigar.name }}</div>

                            <div class="panel-body">

                                <img :src="'/imagenes/cigars/' + cigar.image"  height="300px" width="300px" class="img-thumbnail"><br>

                                <label>Código de barra: </label> {{ cigar.barcode }} <br>

                                <label>Nombre: </label> {{ cigar.name }} <br>
                                <label>Vitóla: </label> {{ cigar.cigar_size.name }} <br>
                                <label>Peso neto: </label> {{ cigar.netWeight }} <br>
                                <label>Presentación: </label> {{ cigar.unitsInPresentation }} <br>
                                <label>Linea: </label> {{ cigar.brand_group.name }} <br>
                                <label>Unidad: </label> {{ cigar.unit_of_measurement.name }} <br>

                            </div>

                            <div class="panel-footer">

                                <a v-bind:href="'/cigars/'+ cigar.id" title="Ver Producto">

                                    <button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>

                                </a> 

                                <a href="#" class="btn btn-warning btn-xs" title="Editar producto" v-on:click.prevent="editCigar(cigar)">


                                  <!-- <button <i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Editar</button> -->Editar

                                </a>

                                <a v-bind:href="'/cigars/' + cigar.id + '/edit'" title="Edit customerType">

                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cambiar imagen</button>

                                </a>

                                <a href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteCigar(cigar)">Deshabilitar</a>

                                <!-- <a href="#" title="Change the picture" class="btn btn-primary btn-xs" v-on:click.prevent="editPhoto(cigar)">

                                    <button class="btn btn-primary btn-xs">

                                        <i class="fa fa-pencil-square-o" aria-hidden="true" v-on:click.prevent="editPhoto(cigar)">
                                            
                                        </i> -->
                                    <!-- Cambiar imagen -->

                                <!-- </button> -->

                                <!-- </a> -->

                            </div>

                        </div>

                    </div>
                </div>


                <nav role="navigation" aria-label="Page navigation">
                  <ul class="pagination">
                    <li v-if="pagination.current_page >1">
                      <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page -1)">
                        <span aria-hidden="true">&laquo; Atrás</span>
                      </a>
                    </li>
                    <li v-for="page in pagesNumber" v-bind:class="page == isActived ? 'active' : ''">

                        <a href="#" @click.prevent="changePage(page)">{{ page }}</a>

                    </li>
                    
                    <li v-if="pagination.current_page < pagination.last_page">
                      <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page +1)">
                        <span aria-hidden="true"> Siguiente &raquo; </span>
                      </a>
                    </li>
                  </ul>
                </nav>





                <form method="POST" v-on:submit.prevent="createCigar">

                        <div v-if="showCreateModal" class="modal is-active" id="createProduct">

                            <div class="modal-background"></div>

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">
                                        
                                        <button type="button" class="close" data-dismiss="modal" @click="showCreateModal = false">
                                            
                                            <span>&times;</span>

                                        </button>

                                        <h4>Crear producto</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">

                                            <label for="brand_groups_id">Linea</label>

                                            <select  v-model="brand_groups_id" id="brand_groups_id" name ='brand_groups_id' class ="form-control" required>

                                                    <option disabled value="">Seleccione un linea o marca</option>
                                                
                                                    <option v-for="brand in brandGroups" v-bind:value="brand.id">

                                                         {{brand.name}}

                                                    </option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="unit_of_measurements_id">Unidad</label>

                                             <select  v-model="unit_of_measurements_id" id="unit_of_measurements_id" name ='unit_of_measurements_id' class ="form-control" required>

                                                    <option disabled value="">Seleccione una presentación</option>
                                                
                                                    <option v-for="unit in unitOfMeasurements" v-bind:value="unit.id">

                                                         {{unit.name}}

                                                    </option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="cigar_sizes_id">Vitóla</label>

                                             <select  v-model="cigar_sizes_id" id="cigar_sizes_id" name ='cigar_sizes_id' class ="form-control" required>

                                                    <option disabled value="">Seleccione una vitóla</option>
                                                
                                                    <option v-for="size in cigarSizes" v-bind:value="size.id">

                                                         {{size.name}}

                                                    </option>

                                            </select>

                                        </div>

                                         <div class="form-group">

                                            <label for="category_products_id">Categoría</label>

                                             <select  v-model="category_products_id" id="category_products_id" name ='category_products_id' class ="form-control" required>

                                                    <option disabled value="">Seleccione una categoría</option>
                                                
                                                    <option v-for="category in categoryProducts" v-bind:value="category.id">

                                                         {{category.categoria}}

                                                    </option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="barcode">Código de barras</label>

                                            <input type="" v-on:keyup.prevent="validateProduct" name="barcode" class="form-control" v-model="barcode" required>
                                            
                                        </div>

                                        <div class="form-group">

                                            <label for="name">Nombre</label>

                                            <input type="" name="name" class="form-control" v-model="name" required>
                                            
                                        </div>


                                        <div class="form-group">

                                            <label for="netWeight">Peso neto en gr</label>

                                            <input type="number" name="netWeight" class="form-control" step="0.01" v-model="netWeight" required>
                                            
                                        </div>

                                        <div class="form-group">

                                            <label for="unitsInPresentation">Unidades en presentación</label>

                                            <input type="number" v-on:keyup.prevent="validateProduct" name="unitsInPresentation" class="form-control" v-model="unitsInPresentation" required>
                                            
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-3" v-if="image">
                                                  <img :src="image" class="img-responsive" height="70" width="90">
                                            </div>
                                            <div class="col-md-6">

                                                <label for="image">Imagen</label>
                                                <input type="file" name="image" id="image" v-on:change="onImageChange" class="form-control" required>
                                            </div>

                                        </div>

                                       

                                        <span v-for="error in errors" class="text-danger"> {{ error }}</span>
                                    </div>


                                    <div class="modal-footer">
                                        
                                        <input type="submit" class="btn btn-primary" value="Guardar" >

                                       <!--  <div class="col-sm-6" >
            
                                            <h1>JSON</h1>

                                            <pre>
                                                
                                                {{ $data }}
                                            </pre>
                                        </div> -->
                                    </div>  

                                   

                                </div>
    
                            </div>

                        </div>
                    </form>




                    <form method="PUT" v-on:submit.prevent="updateCigar(updatedCigar.id)">

                        <div v-if="showUpdateModal" class="modal is-active" id="updateCigar">

                            <div class="modal-background"></div>

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">
                                        
                                        <button type="button" class="close" data-dismiss="modal" @click="showUpdateModal = false">
                                            
                                            <span>&times;</span>
                                        </button>

                                        <h4>Editar</h4>
                                    </div>
                                    <div class="modal-body">

                                         <div class="form-group">

                                            <label for="brand_groups_id">Linea</label>

                                            <select  v-model="updatedCigar.brand_groups_id" id="brand_groups_id" name ='brand_groups_id' class ="form-control">

                                                    <option disabled value="">Seleccione un linea o marca</option>
                                                
                                                    <option v-for="brand in brandGroups" v-bind:value="brand.id">

                                                         {{brand.name}}

                                                    </option>

                                            </select>

                                        </div>

                                         <div class="form-group">

                                            <label for="unit_of_measurements_id">Unidad</label>

                                             <select  v-model="updatedCigar.unit_of_measurements_id" id="unit_of_measurements_id" name ='unit_of_measurements_id' class ="form-control">

                                                    <option disabled value="">Seleccione una presentación</option>
                                                
                                                    <option v-for="unit in unitOfMeasurements" v-bind:value="unit.id">

                                                         {{unit.name}}

                                                    </option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="cigar_sizes_id">Vitóla</label>

                                             <select  v-model="updatedCigar.cigar_sizes_id" id="cigar_sizes_id" name ='cigar_sizes_id' class ="form-control">

                                                    <option disabled value="">Seleccione una vitóla</option>
                                                
                                                    <option v-for="size in cigarSizes" v-bind:value="size.id">

                                                         {{size.name}}

                                                    </option>

                                            </select>

                                        </div>

                                         <div class="form-group">

                                            <label for="category_products_id">Categoría</label>

                                             <select  v-model="updatedCigar.category_products_id" id="category_products_id" name ='category_products_id' class ="form-control">

                                                    <option disabled value="">Seleccione una categoría</option>
                                                
                                                    <option v-for="category in categoryProducts" v-bind:value="category.id">

                                                         {{category.categoria}}

                                                    </option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="barcode">Código de barras</label>

                                            <input type="" v-on:keyup.prevent="validateProduct" name="barcode" class="form-control" v-model="updatedCigar.barcode">
                                            
                                        </div>
                                        
                                        <div class="form-group">

                                            <label for="name">Nombre</label>

                                            <input type="" name="name" class="form-control" v-model="updatedCigar.name">
                                            
                                        </div>


                                        <div class="form-group">

                                            <label for="netWeight">Peso neto en gr</label>

                                            <input type="number" step="0.01" name="netWeight" class="form-control" v-model="updatedCigar.netWeight">
                                            
                                        </div>

                                        <div class="form-group">

                                            <label for="unitsInPresentation">Unidades en presentación</label>

                                            <input type="number" v-on:keyup.prevent="validateProduct" name="unitsInPresentation" class="form-control" v-model="updatedCigar.unitsInPresentation" required>
                                            
                                        </div>

                                        <span v-for="error in errors" class="text-danger"> {{ error }}</span>

                                    </div>
                                    <div class="modal-footer">
                                        
                                        <input type="submit" class="btn btn-primary" value="Actualizar" >
                                    </div>  

                                </div>
    
                            </div>

                        </div>

                    </form>


                     <!-- <form method="PUT" v-on:submit.prevent="updatePhoto(updatedCigar.id)">

                        <div class="modal is-active" id="updateCigarPhoto">

                            <div class="modal-background"></div>

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">
                                        
                                        <button type="button" class="close" data-dismiss="modal" @click="showUpdatePhotoModal = false">
                                            
                                            <span>&times;</span>
                                        </button>

                                        <h4>Editar</h4>
                                    </div>
                                    <div class="modal-body">

                                         <div class="form-group">
                                            
                                            <div class="col-md-6">
                                                <img   height="300px" width="300px" class="img-thumbnail"><br>
                                                <input class="form-control" name="imageActual" type="text" id="imageActual" value="{{ $cigar['image'] or ''}}" >
                                                {!! $errors->first('imageActual', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="image" class="col-md-4 control-label">{{ 'Imagen' }}</label>
                                            <div class="col-md-6">
                                                
                                                <input class="form-control" name="image" type="file" id="image" v-on:change="image" >
                                                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}

                                            </div>
                                        </div>

    

                                        <span v-for="error in errors" class="text-danger"> {{ error }}</span>

                                    </div>
                                    <div class="modal-footer">
                                        
                                        <input type="submit" class="btn btn-primary" value="Actualizar" >
                                    </div>  

                                </div>
    
                            </div>

                        </div> -->

                    <!-- </form> -->





            </div>



        </div>


        <!-- <div class="row">
            
            <div class="col-sm-7" >
                    
                    <h1>JSON</h1>

                    <pre>
                        
                        {{ $data }}
                    </pre>
            </div>
        </div> -->

           
          





        <!-- </div> -->

    </div>
</template>

<script>
    export default {

         data(){
            return {

                cigars:[],

                products:[],

                brandGroups:[],

                unitOfMeasurements:[],

                cigarSizes:[],

                categoryProducts:[],

                pagination:{

                    'total':0,        
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0,

                },

                showCreateModal:false,

                showUpdateModal:false,

                showUpdatePhotoModal: false,

                brand_groups_id:'',

                unit_of_measurements_id:'',

                cigar_sizes_id:'',

                category_products_id:'',

                barcode:'',

                name:'',

                netWeight:'',

                unitsInPresentation:'',

                image: '',

                // image_src: 'imagenes/cigars/' + this.updatedCigar.image,

                errors:[],

                productExist:false,

                busqueda:'',

                updatedCigar:{'id': '', 'brand_groups_id': '', 'unit_of_measurements_id': '', 'cigar_sizes_id':'', 'category_products_id': '', 'barcode': '', 'name': '', 'netWeight':'', 'unitsInPresentation':'', 'image': ''}

                
            }
        },

        created:function(){

            this.getCigars();

            this.getBrandGroups();

            this.getUnitOfMeasurements();

            this.getCigarSizes();

            this.getCategoryProducts();


        },

        methods: {

            getCigars:function(filter, parameter){

                // var urlCigars = '/axioscigars';

                var urlCigars= 'axioscigars?' + filter + '=' + parameter; 

                // var urlCigars = 'axioscigars?page=' +page;

                axios.get(urlCigars).then(response =>{

                    this.cigars = response.data.data,
                    this.pagination = response.data
                
                });

            },

            getProducts:function(filter, parameter){

                 var urlProducts = '/axiosproduct';

            

                axios.get(urlProducts).then(response =>{

                    this.products = response.data
                
                });

            },
 

            getBrandGroups:function(){

                // var urlCigars = '/axioscigars';

                var urlCigars = 'axiosbrandgroups';

                axios.get(urlCigars).then(response =>{

                    this.brandGroups = response.data
                
                });
            },

             getUnitOfMeasurements:function(){

                // var urlCigars = '/axioscigars';

                var urlCigars = 'axiosunitofmeasurements';

                axios.get(urlCigars).then(response =>{

                    this.unitOfMeasurements = response.data
                
                });
            },

            getCigarSizes:function(){

                // var urlCigars = '/axioscigars';

                var urlCigars = 'axioscigarsizes';

                axios.get(urlCigars).then(response =>{

                    this.cigarSizes = response.data
                
                });
            },

            getCategoryProducts:function(){

                // var urlCigars = '/axioscigars';

                var urlCigars = 'axioscategoryproducts';

                axios.get(urlCigars).then(response =>{

                    this.categoryProducts = response.data
                
                });
            },



            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createCigar(){

                // this.validateProduct();

                if(this.brand_groups_id=='' || this.unit_of_measurements_id =='' || this.cigar_sizes_id=='' || this.category_products_id =='' || this.barcode =='' || this.unitsInPresentation ==''){

                        toastr.warning('Favor llenar los campos requeridos!');


                    }else if(this.productExist){

                        toastr.error('Producto ya existe en la base de datos!');

                    }else{

                        // if(!this.productExist){

                            var url ='cigars'

                            // var url = 'cigars/';
                            axios.post(url, {

                                brand_groups_id: this.brand_groups_id,

                                unit_of_measurements_id: this.unit_of_measurements_id,

                                cigar_sizes_id: this.cigar_sizes_id,

                                category_products_id: this.category_products_id,

                                barcode: this.barcode,

                                name: this.name,

                                netWeight: this.netWeight,

                                unitsInPresentation: this.unitsInPresentation,

                                image: this.image,

                        
                            }).then(response => {

                                this.getCigars();

                                this.brand_groups_id= '';

                                this.unit_of_measurements_id='';

                                this.cigar_sizes_id= '';

                                this.category_products_id ='';

                                this.barcode ='';

                                this.name ='';

                                this.netWeight ='';

                                this.unitsInPresentation= '';

                                this.image= '';

                                // this.showCreateModal = false;

                                // $('#createProduct').modal('hide');

                                $('#createProduct').modal('toggle');

                                toastr.success('Producto creado con exito!');
                            }).catch(error => {

                                this.errors =error.response.data
                            });

                        // }

                    }

            },

            validateProduct: function() {

                    var arregloInterno = [{brand_groups_id: this.brand_groups_id, unit_of_measurements_id: this.unit_of_measurements_id, cigar_sizes_id: this.cigar_sizes_id,  barcode:this.barcode, unitsInPresentation:this.unitsInPresentation }];

                    var match = [];

                    this.getProducts();

                    this.products.forEach(function(cigar){


                        return arregloInterno.forEach(function(item){

                            if(cigar.brand_groups_id == item.brand_groups_id && cigar.unit_of_measurements_id == item.unit_of_measurements_id && cigar.cigar_sizes_id == item.cigar_sizes_id && cigar.barcode == item.barcode){

                                match.push(cigar.name);

                            }
                        });
                    });

                    // console.log(match);

                    if(match.length > 0){

                        return this.productExist = true;
                    }else{

                        return this.productExist = false;
                    }

                    arregloInterno = [];

            },

            editCigar:function(cigar){

                this.updatedCigar.id = cigar.id;

                this.updatedCigar.brand_groups_id = cigar.brand_groups_id;

                this.updatedCigar.unit_of_measurements_id = cigar.unit_of_measurements_id;

                this.updatedCigar.cigar_sizes_id = cigar.cigar_sizes_id;

                this.updatedCigar.category_products_id = cigar.category_products_id;

                this.updatedCigar.barcode = cigar.barcode;

                this.updatedCigar.name = cigar.name;

                this.updatedCigar.netWeight = cigar.netWeight;

                this.updatedCigar.unitsInPresentation = cigar.unitsInPresentation;

                this.updatedCigar.image = cigar.image;

                this.showUpdateModal = true;

                $('#updateCigar').modal();
            },

            updateCigar:function(updatedCigar){

                // alert(this.updatedTarea.name);

                var url = 'cigars/' + updatedCigar;
                axios.put(url, this.updatedCigar).then(response=>{

                    this.getCigars();
                    // this.updatedCigar = {'id':'', 'name': ''};
                    this.updatedCigar={'id': '', 'brand_groups_id': '', 'unit_of_measurements_id': '', 'cigar_sizes_id':'', 'category_products_id': '', 'barcode': '', 'name': '', 'netWeight':'', 'unitsInPresentation':'', 'image': ''};
                    this.showUpdateModal = false;

                    $('#updateCigar').modal('hide');
                    toastr.success('Producto fue editado correctamente.');
                }).catch(error =>{

                    this.errors = error.response.data;
                });



            },


            editPhoto:function(cigar){

                this.updatedCigar2.id = cigar.id;

                this.updatedCigar2.image = cigar.image;

                this.showUpdatePhotoModal = true;

                $('#updateCigarPhoto').modal();
            },


            updatePhoto:function(updatedCigar){

                // alert(this.updatedTarea.name);

                var url = 'axioscigars/' + updatedCigar;
                axios.put(url, this.image).then(response=>{

                    this.getCigars();
                    // this.updatedCigar = {'id':'', 'name': ''};
                    
                    this.showUpdatePhotoModal = false;

                    $('#updatePhoto').modal('hide');
                    toastr.success('Imagen fue actulizada correctamente.');
                }).catch(error =>{

                    this.errors = error.response.data;
                });



            },

            deleteCigar:function(cigar){

                var eliminar = confirm('Esta seguro de elminar este producto?');

                if(eliminar){

                    var url = 'cigars/' + cigar.id;

                    axios.delete(url).then(response =>{

                        // alert("Tarea eliminada con exito!");

                        this.getCigars();

                        toastr.success('Eliminado correctamente!');

                    });

                }else{

                    toastr.warning('El producto no fue eliminado!')
                }
                
            },




            changePage:function(page){

                var filter = 'page';

                this.pagination.current_page =page;
                this.getCigars(filter, page);
            },

            search:function(){

                var filter = 'search';

                this.getCigars(filter, this.busqueda);
            }
        },

        computed:{

            isActived:function(){

                return this.pagination.current_page;


            },

            isDisabled:function(){

                if(this.pagination.current_page >1){

                    this.isDisable = true;


                }
            },

            pagesNumber:function(){

                if(!this.pagination.to){

                    return [];
                }


                var from =this.pagination.current_page -2;

                if(from < 1){

                    from =1;
                }

                var to = from + (2 * 2);

                if(to >= this.pagination.last_page){

                    to = this.pagination.last_page;
                }

                var pagesArray =[];

                while(from <= to){

                    pagesArray.push(from);

                    from++;
                }

                // alert(pagesArray);

                return pagesArray;


            }

            // searchCigars:function(){

            //     return this.cigars.filter((cigar) => cigar.name.includes(this.busqueda));
            // }

            
        }


        
    }
</script>

 <style>
        
        body { padding-botton: 100px;}

        .level{ display:flex; align-items:center;}

        .flex{ flex:1; }

</style>