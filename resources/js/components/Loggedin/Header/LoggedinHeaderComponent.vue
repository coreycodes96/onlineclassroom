<template>
	<div>
		<!-- Header Start -->
		<header>
			<!-- Container Start -->
			<div class="container">
				<!-- Title -->
				<h4><i class="fas fa-globe"></i>nline Classroom</h4>
				<!-- Menu Button -->
				<div class="menu-btn-container">
					<i class="show fas fa-ellipsis-h"></i>
					<i class="hide fas fa-ellipsis-v"></i>
				</div>
			</div>
			<!-- Container End -->
		</header>
		<!-- Header End -->

		<!-- Menu Start -->
		<section class="menu-container">
			<!-- Menu Box Start -->
			<div class="menu-box">
				<!-- Close Button -->
				<i class="close-btn fas fa-times-circle"></i>
				<div class="list-box">
					<!-- greeting user -->
					<h2>Hiya, {{ loggedInUsersName }}!</h2>
					<!-- if the user is an admin -->
					<li v-if="loggedInUsersAdminStatus == 1"><a href="/admin"><i class="fas fa-user-cog"></i> Admin Home</a></li>
					<!-- if the user is not an admin -->
					<li v-if="loggedInUsersAdminStatus == 0"><a :href="/profile/+loggedInUsersID"><i class="fas fa-address-card"></i> My Profile</a></li>
					<!-- if the user is not an admin -->
					<li v-if="loggedInUsersAdminStatus == 0"><a href="/classes"><i class="fas fa-chalkboard-teacher"></i> Classes</a></li>
					
					<!-- Logout Button Start -->
					<button @click="logoutUser" class="btn">Logout</button>
					<!-- Logout Button End -->
				</div>
			</div>
			<!-- Menu Box End -->
		</section>
		<!-- Menu End -->
	</div>
</template>

<script>
	export default{
		props:{
			//loggedin users data
			user: String
		},
		data(){
			return{
				//users admin status
				loggedInUsersAdminStatus: JSON.parse(this.user).admin,
				//get the users firstname and surname
				loggedInUsersName: JSON.parse(this.user).firstname+' '+JSON.parse(this.user).surname,
				//get the users ID
				loggedInUsersID: JSON.parse(this.user).id
			}
		},
		mounted(){
			//open menu
			$('.show').on('click', function(){
				$('.show').hide();
				$('.hide').show();
				$('.menu-container').slideDown();
			});

			//close menu
			$('.menu-container i').on('click', function(){
				$('.hide').hide();
				$('.show').show();
				$('.menu-container').slideUp();
			});
		},
		methods:{
			//log the user out and direct them to the login page
			logoutUser(){
				axios.post('/logout', {
					headers:{
						'Content-Type': 'application/json'
					}
				})
				.then(response => {
					window.location = '/login';
				})
				.catch(errors => {
					console.log(errors.response);
				})
			}
		}
	}
</script>

<style scoped>
/* Header Start */
	header{
		margin: 0;
		padding: 0;
		height: 100px;
		background-color: #014678;
		color: #FFF;
	}

	header h4{
		margin: 0;
		padding: 35px 0 0 0;
		display: inline-block;
		font-size: 30px;
	}

	.menu-btn-container{
		float: right;
	}

	.show, .hide{
		margin: 40px 0 0 0;
		float: right;
		font-size: 28px;
		color: #FFF;
		cursor: pointer;
	}

	.hide{
		display: none;
	}
/* Header End */

/* Menu Start */
	.menu-container{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		background-color: rgba(1, 70, 120, 0.8);
		overflow: hidden;
		display: none;
		z-index: 2;
	}

	.close-btn{
		margin: 15px 20px 0 0;
		float: right;
		font-size: 24px;
		color: #FFF;
		cursor: pointer;
	}

	.list-box{
    	margin: 100px 0 0 0;
    	float: left;
    	display: block;
    	width: 100%;
    	text-align: center;
	}

	.list-box h2{
		margin: 0 auto;
		padding-bottom: 10px;
		width: 50%;
		font-size: 40px;
		color: #FFF;
		border-bottom: 3px solid #FFF;
	}

	.list-box li{
		margin: 30px 0;
		list-style: none;
		text-align: center;
		font-size: 26px;
	}

	.list-box li a{
		color: #FFF;
	}

	.list-box .btn{
		margin: 10px 0;
		width: 200px;
		background-color: #DA1212;
		font-size: 16px;
		color: #FFF;
	}
/* Menu Start */
</style>