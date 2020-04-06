<template>
	<div>
		<div class="container">
			<!-- Account Title Start -->
			<div class="card">
				<div class="card-body">
					<h2><b>Your Account Info</b></h2>
				</div>
			</div>
			<!-- Account Title Start -->

			<!-- Info ID Start -->
			<div class="card">
				<div class="card-body">
					<h5><b>ID:</b> {{ info.id }}</h5>
				</div>
			</div>
			<!-- Info ID End -->

			<!-- Info Name Start -->
			<div class="card">
				<div class="card-body">
					<h5><b>Name:</b> {{ info.firstname }} {{ info.surname }}</h5>
				</div>
			</div>
			<!-- Info Name End -->

			<!-- Info Gender Start -->
			<div class="card">
				<div class="card-body">
					<h5><b>Gender:</b> {{ info.gender }}</h5>
				</div>
			</div>
			<!-- Info Gender End -->

			<!-- Info Email Start -->
			<div class="card">
				<div class="card-body">
					<h5><b>Email:</b> {{ info.email }}</h5>
				</div>
			</div>
			<!-- Info Email End -->

			<!-- Info Classes Entered Start -->
			<div class="card">
				<div class="card-body">
					<h5><b>Classes Entered:</b> {{ info.enterclass.length }}</h5>
				</div>
			</div>
			<!-- Info Classes Entered End -->
		</div>
	</div>
</template>

<script>
	export default{
		props:{
			user: String //users info
		},
		data(){
			return{
				info: JSON.parse(this.user) //user info 
			}	
		}
	}
</script>

<style scoped>
/* Container Start */
	.container{
		margin: 30px 0 20px 0;
	}
/* Container End */

/* Info Card Start */
	.card{
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		-webkit-border-radius: 0;
		border: none;
		border-bottom: 2px solid #014678;
		z-index: 0;
	}
/* Info Card End */
</style>