<template>

	<div>

		<div class="content" >
		
			<canvas ref="canvas"  width="800" height="600"></canvas>

		</div>

		<!-- <div>
			
			<button  class="btn btn-primary" @click="showGraph">Mostrar</button>
		</div> -->

	</div>
</template>


<script>

	// import Chart from 'chart.js';

	export default{

		props:['type','labels', 'values', 'values2', 'color', 'label1', 'label2'],

		props:{


			type:{},
			labels:{},
			values:{},
			values2:{},
			color:{

				default:'rgba(220, 220, 220, 0.2)'
			},

			label1:{},
			label2:{}


		},

		data(){

			return{

				show: false
			}
		},

		mounted(){

			this.showGraph();
		},


		methods:{

			showGraph(){

					this.show = true;

		            // var canvas = document.getElementById('graph').getContext('2d');



		            var canvas = this.$refs.canvas.getContext('2d');
		            

				    new Chart(canvas, {
					    type: this.type,
					    data:{


					    	// labels: ['January', 'February', 'March'],

					    	labels: this.labels,

			                datasets: [

			                    {
			                    	label:'Ventas 2017',
			                        backgroundColor:"rgba(220, 220, 220, 0.2)",

			                        // backgroundColor:"#F5D0A9",
			                        strokeColor:"rgba(220, 220,220,1)",
			                        pointColor:"rgba(220, 220,220,1)",
			                        pointStrokeColor:"#fff",
			                        pointHighlightFill:"#fff",
			                        pointHighlightStroke:"rgba(220, 220, 220, 1)",

			                        // data: [ 30, 122, 80]
			                        data:this.values
			                    },

			                    {
			                    	label:'Ventas 2016',
			                        backgroundColor:"rgba(50, 220, 220, 10)",
			                        strokeColor:"rgba(220, 220,220,1)",
			                        pointColor:"rgba(220, 220,220,1)",
			                        pointStrokeColor:"#fff",
			                        pointHighlightFill:"#fff",
			                        pointHighlightStroke:"rgba(220, 220, 220, 1)",

			                        // data: [ 10, 52, 5]

			                        data:this.values2
			                    }

			                ]
					    },
					   
					});    	

			}
		}


	}
	

</script>