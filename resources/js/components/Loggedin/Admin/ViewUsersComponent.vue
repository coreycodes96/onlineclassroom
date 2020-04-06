<template>
	<div>
		<!-- No Users Start -->
		<div v-if="fetchUsers == ''">
			<div class="card">
				<div class="card-body">
					<h3 style="text-align:center;">There are no users...</h3>
				</div>
			</div>
		</div>
		<!-- No Users End -->

		<!-- Display Users Start -->
		<div v-else v-for="(user, index) in fetchUsers" :key="user.id">
			<div class="card">
				<div class="card-body">
					<!-- Delete User Button Start -->
					<i @click="removeUser(user.id, index)" class="fas fa-trash"></i>
					<!-- Delete User Button End -->

					<!-- Users Name -->
					<h3>Name: {{ user.firstname }} {{ user.surname }}</h3>
					<!-- Users Email -->
					<p>Email: {{ user.email }}</p>
					<!-- Users Admin Status -->
					<p>Admin: {{ user.admin }}</p>
				</div>
			</div>
		</div>
		<!-- Display Users End -->
	</div>
</template>

<script>
	//vuex
	import {mapGetters, mapActions} from 'vuex';
	export default{
		methods:{
			...mapActions('admin', ['getUsers', 'deleteUser']),
			removeUser(id, index){
				//create an object with the data
				const data = {
					id: id,
					index: index
				};

				//delete user
				this.deleteUser(data);
			}
		},
		computed:{
			...mapGetters('admin', ['fetchUsers'])
		},
		created(){
			this.getUsers()
		}
		
	}
</script>

<style scoped>
/* Users Card Start */
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
/* Users Card End */
</style>