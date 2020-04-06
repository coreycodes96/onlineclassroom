<template>
	<div>
		<!-- Admin Container Start -->
		<div class="admin-container">
			<!-- Admin Button Container Start -->
			<div class="admin-btn-container">
				<button id="create-class-btn" class="btn">Create A Class <i class="fas fa-plus"></i></button>
				<button id="view-classes-btn" class="btn">View Classes <i class="fas fa-eye"></i></button>
				<button id="view-users-btn" class="btn">View Users <i class="fas fa-users"></i></i></button>
			</div>
			<!-- Admin Button Container End -->

			<!-- Admin Box Start -->
			<div class="admin-box">
				<!-- Create A Class Container Start -->
				<div class="create-class-container">
					<create-class></create-class>
				</div>
				<!-- Create A Class Container End -->

				<!-- View Classes Container Start -->
				<div class="view-classes-container">
					<view-classes></view-classes>
				</div>
				<!-- View Classes Container End -->

				<!-- View Users Container Start -->
				<div class="view-users-container">
					<view-users></view-users>
				</div>
				<!-- View Users Container End -->
			</div>
			<!-- Admin Box End -->
		</div>
		<!-- Admin Container End -->
	</div>
</template>

<script>
	import CreateClass from './CreateClassComponent.vue'; //create a class component
	import ViewClasses from './ViewClassesComponent.vue'; //view classes component
	import ViewUsers from './ViewUsersComponent.vue'; //view users component
	
	export default{
		components:{
			'create-class': CreateClass, //create class component
			'view-classes': ViewClasses, //view classes component
			'view-users': ViewUsers //view users component
		},
		mounted(){
			//open and close create class container
			$('#create-class-btn').on('click', function(){
				$('.create-class-container').show();
				$('.view-classes-container').hide();
				$('.view-users-container').hide();
			});

			//open and close view classes container
			$('#view-classes-btn').on('click', function(){
				$('.view-classes-container').show();
				$('.create-class-container').hide();
				$('.view-users-container').hide();
			});

			//open and close view users container
			$('#view-users-btn').on('click', function(){
				$('.view-users-container').show();
				$('.create-class-container').hide();
				$('.view-classes-container').hide();
			});
		}
	}
</script>

<style scoped>
/* Admin Container Start */
	.admin-container{
		width: 100%;
		height: 84.8vh;
		overflow: hidden;
	}
/* Admin Container End */

/* Admin Button Container Start */
	.admin-btn-container{
		margin: 0;
		padding: 50px 0;
		float: left;
		width: 30%;
		height: 100%;
		background-color: #02355A;
		text-align: center;
	}

	.admin-btn-container button{
		margin: 20px 0;
		padding: 10px 0;
		width: 80%;
	}
/* Admin Button Container End */

/* Admin Box Start */
	.admin-box{
		float: right;
		width: 70%;
		height: 100%;
		background-color: #FFF;
		overflow-y: scroll;
	}

	.create-class-container, .view-classes-container, .view-users-container{
		width: 100%;
		/*height: 100%;*/
		background-color: #FFF;
		display: none;
	}

	.view-classes-container{
		height: 100%;
	}

	.view-users-container{
		height: 100%;
	}
/* Admin Box End */

/* Responsive Start */
@media screen and (max-width: 750px){
	.admin-container{
		height: 100%;
		overflow: visible;
	}

	.admin-btn-container{
		padding: 25px 0;
		float: none;
		width: 100%;
		height: 100px;
		display: block;
	}

	.admin-btn-container button{
		margin: 0 10px;
		padding: 5px 0;
		display: inline;
		width: 75px;
	}

	.admin-box{
		float: none;
		width: 100%;
		height: 100%;
		display: block;
		overflow-y: visible;
	}
}
/* Responsive End */
</style>