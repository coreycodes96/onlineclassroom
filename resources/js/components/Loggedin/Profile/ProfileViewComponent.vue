<template>
	<div>
		<!-- Profile Container Start -->
		<div class="profile-container">
			<!-- Profile Button Container Start -->
			<div class="profile-btn-container">
				<button id="view-account-btn" class="btn">View Account <i class="fas fa-user-circle"></i></button>
				<button id="view-classes-btn" class="btn">View Classes <i class="fas fa-eye"></i></button>
			</div>
			<!-- Profile Button Container End -->

			<!-- Profile Box Start -->
			<div class="profile-box">
				<!-- View Account Container Start -->
				<div class="view-account-container">
					<view-account :user="user"></view-account>
				</div>
				<!-- View Account Container End -->

				<!-- View Classes Container Start -->
				<div class="view-classes-container">
					<view-user-classes :user-classes="userClasses"></view-user-classes>
				</div>
				<!-- View Classes Container End -->
			</div>
			<!-- Profile Box End -->
		</div>
		<!-- Profile Container End -->
	</div>
</template>

<script>
	import ViewAccount from './ViewAccountComponent.vue';
	import ViewUserClasses from './ViewUserClassesComponent.vue';
	export default{
		props:{
			user: String,
			userClasses: String
		},
		components:{
			'view-account': ViewAccount,
			'view-user-classes': ViewUserClasses
		},
		mounted(){
			//open and close view account container
			$('#view-account-btn').on('click', function(){
				$('.view-account-container').show();
				$('.view-classes-container').hide();
			});

			//open and close view classes container
			$('#view-classes-btn').on('click', function(){
				$('.view-classes-container').show();
				$('.view-account-container').hide();
			});
		}
	}
</script>

<style scoped>
/* Profile Container Start */
	.profile-container{
		width: 100%;
		height: 84.8vh;
		overflow: hidden;
	}
/* Profile Container End */

/* Profile Button Container Start */
	.profile-btn-container{
		margin: 0;
		padding: 50px 0;
		float: left;
		width: 30%;
		height: 100%;
		background-color: #02355A;
		text-align: center;
	}

	.profile-btn-container button{
		margin: 20px 0;
		padding: 10px 0;
		width: 80%;
	}
/* Profile Button Container End */

/* Profile Box Start */
	.profile-box{
		float: right;
		width: 70%;
		height: 100%;
		background-color: #FFF;
		overflow-y: scroll;
	}

	.view-account-container, .view-classes-container{
		width: 100%;
		
		background-color: #FFF;
		display: none;
	}
/* Profile Box End */

/* Responsive Start */
@media screen and (max-width: 750px){
	.profile-container{
		height: 100%;
		overflow: visible;
	}

	.profile-btn-container{
		padding: 25px 0;
		float: none;
		width: 100%;
		height: 100px;
		display: block;
	}

	.profile-btn-container button{
		margin: 0 10px;
		padding: 5px 0;
		display: inline;
		width: 75px;
	}

	.profile-box{
		float: none;
		width: 100%;
		height: 100%;
		display: block;
		overflow-y: visible;
	}
}
/* Responsive End */
</style>