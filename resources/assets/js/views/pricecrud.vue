<template>


	<div>

		 <!-- <div class="row"> -->
                <div class="col-xs-12">
                    <h1 class="page-header">CRUD Laravel and VUEjs</h1>
                </div>

                <div class="col-sm-7">

                	<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createTask" @click="showCreateModal = true">Nueva tarea</a>

                	<table class="table table-hover table-striped">

                		<thead>
                			
                			<tr>
                				<th>ID</th>
                				<th>Tarea</th>
                				<th colspan="2">&nbsp;</th>
                			</tr>
                		</thead>

                		<tbody>
                			
                			<tr v-for="tarea in tareas">
                				
                				<td width="10px"> {{tarea.id }}</td>
                				<td>{{ tarea.name }}</td>

                				<td width="10px"><a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editTarea(tarea)">Editar</a></td>

                				<td width="10px"><a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteTarea(tarea)">Eliminar</a></td>
                			</tr>
                		</tbody>
                		

                	</table>

                	<hr>

                	<nav class="pagination is-rounded" role="navigation" aria-label="pagination">
                		<ul class="pagination-list">
                			<li v-if="pagination.current_page >1">
                				<a href="#" class="pagination-previous" @click.prevent="changePage(pagination.current_page -1)">
                					Atras
                				</a>
                			</li>
                			<li v-for="page in pagesNumber">
                				<a href="#" @click.prevent="changePage(page)" class="pagination-link" v-bind:class="page == isActived ? 'pagination-link is-current' : '' " aria-label="Goto page 1">
                					
                					{{ page }}
                				</a>
                			</li>
                			<li v-if="pagination.current_page < pagination.last_page">
                				<a href="#" class="pagination-next" @click.prevent="changePage(pagination.current_page +1)">
                					
                					Siguiente
                				</a>
                			</li>
                		</ul>
                	</nav>
                	<hr>


                	<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li v-if="pagination.current_page >1">
					      <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page -1)">
					        <span aria-hidden="true">&laquo; Atras</span>
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





                	<form method="POST" v-on:submit.prevent="createTarea">

						<div v-if="showCreateModal" class="modal is-active" id="createTask">

							<div class="modal-background"></div>

							<div class="modal-dialog">

								<div class="modal-content">

									<div class="modal-header">
										
										<button type="button" class="close" data-dismiss="modal" @click="showCreateModal = false">
											
											<span>&times;</span>
										</button>

										<h4>Crear</h4>
									</div>
									<div class="modal-body">
										
										<label for="name"> Nueva tarea</label>

										<input type="" name="name" class="form-control" v-model="newTarea">

										<span v-for="error in errors" class="text-danger"> {{ error }}</span>
									</div>
									<div class="modal-footer">
										
										<input type="submit" class="btn btn-primary" value="Guardar" >
									</div>	

								</div>
	
							</div>

						</div>
					</form>




					<form method="PUT" v-on:submit.prevent="updateTarea(updatedTarea.id)">

						<div v-if="showUpdateModal" class="modal is-active" id="updateTask">

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
										
										<label for="name"> Actualizar tarea</label>

										<input type="" name="name" class="form-control" v-model="updatedTarea.name">

										<span v-for="error in errors" class="text-danger"> {{ error }}</span>

									</div>
									<div class="modal-footer">
										
										<input type="submit" class="btn btn-primary" value="Actualizar" >
									</div>	

								</div>
	
							</div>

						</div>

					</form>

					


                	

                </div>

         
                <div class="col-sm-5" >
                    
                    <h1>JSON</h1>

                    <pre>
                        
                        {{ $data }}
                    </pre>
                </div>
            <!-- </div> -->
		

	</div>
	


</template>

<script>

	export default{


		data(){

			return {

				tareas:[],

				pagination:{

					'total':0,        
	                'current_page':0,
	                'per_page':0,
	                'last_page':0,
	                'from':0,
	                'to':0,

				},

				showCreateModal: false,

				showUpdateModal: false,

				newTarea: '',

				updatedTarea: {'id': '', 'name': ''},

				errors: [],

				isDisable: false,

			}
		},

		created:function(){

			this.getTareas();
		},

		methods:{

			getTareas:function(page){

				var urlTareas = 'tasks?page=' +page;

				axios.get(urlTareas).then(response =>{

					this.tareas = response.data.tasks.data,
					this.pagination = response.data.pagination
				});
			},

			deleteTarea:function(tarea){

				var url = 'tasks/' + tarea.id;

				axios.delete(url).then(response =>{

					// alert("Tarea eliminada con exito!");

					this.getTareas();

					toastr.success('Eliminado correctamente!');

				});
			},

			createTarea:function(){

				var url= 'tasks';

				axios.post(url, {

					name: this.newTarea
				}).then(response =>{

					this.getTareas();

					this.newTarea='';

					this.errors =[];

					// $('#createTask').modal('hide');

					this.showCreateModal = false;

					toastr.success('Tarea guardada exitosamente');


				}).catch(error =>{

					this.errors = error.response.data
				});
			},

			editTarea:function(tarea){

				this.updatedTarea.id = tarea.id;

				this.updatedTarea.name = tarea.name;

				this.showUpdateModal = true;
			},

			updateTarea:function(updatedTarea){

				// alert(this.updatedTarea.name);

				var url = 'tasks/' + updatedTarea;
				axios.put(url, this.updatedTarea).then(response=>{

					this.getTareas();
					this.updatedTarea = {'id':'', 'name': ''};
					this.showUpdateModal = false;
					toastr.success('Tarea actualizada correctamente.');
				}).catch(error =>{

					this.errors = error.response.data;
				});


			},


			changePage:function(page){

				this.pagination.current_page =page;
				this.getTareas(page);
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
		}
	}
	


</script>