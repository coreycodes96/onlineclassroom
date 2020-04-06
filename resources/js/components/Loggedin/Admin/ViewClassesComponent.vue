<template>
	<div>
		<!-- No Classes Start -->
		<div v-if="fetchClasses == ''">
			<div class="card">
				<div class="card-body">
					<h3 style="text-align:center;">There are no classes...</h3>
				</div>
			</div>
		</div>
		<!-- No Classes End -->

		<!-- Display Classes Start -->
		<div v-else v-for="(classes, index) in fetchClasses" :key="classes.id">
			<div class="card">
				<div class="card-body">
					<i @click="removeClass(classes.id, index)" class="fas fa-trash"></i>
					<h3>{{ classes.title }}</h3>
					<p>{{ classes.info }}</p>
				</div>
			</div>
		</div>
		<!-- Display Classes End -->
	</div>
</template>

<script>
	//vuex
	import {mapGetters, mapActions} from 'vuex';
	export default{
		methods:{
			...mapActions('admin', ['getClasses', 'deleteClass']),
			removeClass(id, index){
				//create an object with the data
				const data = {
					id: id,
					index: index
				};

				//delete class
				this.deleteClass(data);
			}
		},
		computed:{
			...mapGetters('admin', ['fetchClasses'])
		},
		created(){
			this.getClasses()
		}
		
	}
</script>

<style scoped>
/* Classes Card Start */
	.card{
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		-webkit-border-radius: 0;
		border: none;
		border-bottom: 2px solid #014678;
		z-index: 0;
	}

	.card-body i{
		position: absolute;
		top: 30px;
		right: 20px;
		font-size: 15px;
		color: #DA1212;
		cursor: pointer;
	}
/* Classes Card End */
</style>