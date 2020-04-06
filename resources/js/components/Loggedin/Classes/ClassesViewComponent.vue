<template>
	<div>
		<div class="container">
			<!-- No Classes Start -->
			<div v-if="classes == '[]'">
				<div>
					<div class="card">
						<div class="card-body">
							<h3 style="text-align: center;">There are no classes available at the moment.</h3>
						</div>
					</div>
				</div>			
			</div>
			<!-- No Classes End -->

			<!-- Display Classes Start -->
			<div v-else v-for="lesson in JSON.parse(classes)" :key="lesson.id">
				<div class="card">
					<div class="card-body">
						<!-- Enter A Class Button Start -->
						<span v-if="userAdmin != 1">
							<enter-class-button :user-id="userId" :class-id="lesson.id" :class-enter-count="lesson.enterclass"></enter-class-button>
						</span>
						<!-- Enter A Class Button End -->

						<!-- Title -->
						<h3>{{ lesson.title }}</h3>
						<!-- Info -->
						<p>{{ lesson.info }}</p>
					</div>
				</div>
			</div>
			<!-- Display Classes End -->
		</div>
	</div>
</template>

<script>
//importing the enter class button component
import EnterClassButton from './EnterClassButtonComponent.vue';
	export default{
		props:{
			userId: String, //users ID
			userAdmin: String, //users admin statuss
			classes: String //all the classes
		},
		components:{
			'enter-class-button': EnterClassButton //Enter Class Button Component
		}
	}
</script>

<style scoped>
/* Container End */
	.container{
		margin: 40px auto 10px auto;
	}
/* Container End */

/* Card Start */
	.card{
		margin: 30px 0;
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		-webkit-border-radius: 0;
		border: none;
		border: 2px solid #014678;
		z-index: 0;
		color: #014678;
	}
/* Card End */
</style>