<template>
	<div>
		<div class="container">
			<!-- No User Classes Start -->
			<div v-if="userClasses == '[]'">
				<div class="card">
					<div class="card-body">
						<h3>You Haven't Entered Any Classes</h3>
					</div>
				</div>
			</div>
			<!-- No User Classes End -->

			<!-- Display User Classes Start -->
			<div v-else class="card">
				<div class="card-body">
					<h2><b>All the Classes You Have Entered</b></h2>
				</div>
			</div>
			<div v-for="userClass in JSON.parse(userClasses)" :key="userClass.id">
				<div class="card">
					<div class="card-body">
						<!-- Title -->
						<h3>{{ userClass.title }}</h3>

						<!-- Info -->
						<p>{{ userClass.info }}</p>
					</div>
				</div>
			</div>
			<!-- Display User Classes End -->
		</div>
	</div>
</template>

<script>
	export default{
		props:{
			userClasses: String //user classes
		}
	}
</script>

<style scoped>
/* Container Start */
	.container{
		margin: 30px 0 10px 0;
	}
/* Container End */

/* User Class Card Start */
	.card{
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		-webkit-border-radius: 0;
		border: none;
		border-bottom: 2px solid #014678;
		z-index: 0;
	}
/* User Class End */
</style>