<template>

	<div>

		<div class="content" >
		
			<canvas ref="canvas"  width="800" height="600"></canvas>

		</div>

		<div>
			
			<button  class="btn btn-primary" @click="showGraph">Mostrar</button>
		</div>

	</div>
</template>


<script>

	// import Chart from 'chart.js';

	export default{

		data(){

			return{

				show: false
			}
		},


		methods:{

			showGraph(){

					this.show = true;

		            // var canvas = document.getElementById('graph').getContext('2d');



		            var canvas = this.$refs.canvas.getContext('2d');
		            

				    new Chart(canvas, {
					    type: 'line',
					    data:{


					    	labels: ['January', 'February', 'March'],

			                datasets: [

			                    {
			                    	label:'Sales 2017',
			                        backgroundColor:"rgba(220, 220, 220, 0.2)",
			                        strokeColor:"rgba(220, 220,220,1)",
			                        pointColor:"rgba(220, 220,220,1)",
			                        pointStrokeColor:"#fff",
			                        pointHighlightFill:"#fff",
			                        pointHighlightStroke:"rgba(220, 220, 220, 1)",

			                        data: [ 30, 122, 80]
			                    },

			                    {
			                    	label:'Sales 2018',
			                        backgroundColor:"rgba(50, 220, 220, 10)",
			                        strokeColor:"rgba(220, 220,220,1)",
			                        pointColor:"rgba(220, 220,220,1)",
			                        pointStrokeColor:"#fff",
			                        pointHighlightFill:"#fff",
			                        pointHighlightStroke:"rgba(220, 220, 220, 1)",

			                        data: [ 10, 52, 5]
			                    }

			                ]
					    },
					   
					});    	

			}
		}


	}
	

</script>