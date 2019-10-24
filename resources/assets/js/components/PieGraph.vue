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

		props:['type','labels', 'values', 'values2', 'color', 'label1', 'label2', 'text'],

		props:{


			type:{},
			labels:{},
			values:{},
			values2:{},
			color:{

				default:'rgba(220, 220, 220, 0.2)'
			},

			label1:{},
			label2:{},
			text:{},


		},

		data(){

			return{

				show: false,

				backgroundColors:[],
			}
		},

		mounted(){

			this.createColors();

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
			                        // backgroundColor:"rgba(220, 220, 220, 0.2)",

			                        // backgroundColor:["#F5D0A9", "#0074D9", "#FF4136", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],

			                        backgroundColor:this.backgroundColors,
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

					    options: {
						    responsive: true,
						    legend: {
						      position: 'bottom',
						    },
						    title: {
						      display: false,
						      text: this.text,
						    },
						    animation: {
						      animateScale: true,
						      animateRotate: true
						    },
						    tooltips: {
						      callbacks: {
						        label: function(tooltipItem, data) {

						          var dataset = data.datasets[tooltipItem.datasetIndex];
						           console.log(dataset);

						           var labels = data.labels;
						           console.log(labels);
						           console.log(labels[tooltipItem.index]);
						          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
						            return previousValue + currentValue;
						          });

						          var currentLabel = labels[tooltipItem.index];
						          var currentValue = dataset.data[tooltipItem.index];
						          var precentage = Math.floor(((currentValue/total) * 100)+0.5);         
						          return currentLabel + ": " + "$ " + currentValue + " Percentage:" + precentage + "%";
						        }
						      }
						    }
						  }
					   
					});    	

			},



			createColors(){


				var arrayOfColors =[];





				this.values.forEach(function(item){

					var r = Math.floor(Math.random() * 250);
					var g = Math.floor(Math.random() * 250);
					var b = Math.floor(Math.random() * 250);
					var color = 'rgb(' + r + ', ' + g + ', ' + b + ')';


					// console.log('test');


					arrayOfColors.push(color);


				});


				return this.backgroundColors = arrayOfColors;



			}


		}


	}
	

</script>