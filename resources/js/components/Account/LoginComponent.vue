<template>
	<div>
		<!-- Login Container Start -->
		<section class="login-container">
			<!-- Container With Column Of 8 Start -->
			<div class="container col-8">
				<!-- Form Start -->
				<form @submit.prevent="logUserIn">
					<!-- Email Input -->
					<div class="row form-group">
						<label>Email:</label>
						<input type="text" name="email" v-model="email" class="form-control">
					</div>
					<!-- Password Input -->
	                <div class="row form-group">
	                    <label>Password:</label>
	                    <input type="password" name="password" v-model="password" class="form-control">
	                </div>
	                <!-- Login Button -->
	                <div class="row form-group">
	                    <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Login</button>
						<!-- Catch Errors -->
	                    <div class="catch-error">{{ catch_error }}</div>
	                </div>
				</form>
				<!-- Form End -->
			</div>
			<!-- Container With Column Of 8 End -->
		</section>
		<!-- Login Container End -->
	</div>
</template>

<script>
	export default{
		data(){
			return{
				email: '',
				password: '',
				catch_error: ''
			}
		},
		methods:{
			logUserIn(){
				//validation
				if(this.email === "" && this.password === ""){
					//checking if the form is empty
					this.catch_error = 'Please enter the required information';
				}else if(this.email === ""){
					//checking if the email input is empty
					this.catch_error = 'Please enter your email';
				}else if(this.password === ""){
					//checking if the password is empty
					this.catch_error = 'Please enter your password';
				}else{
					//clearing errors
					this.catch_error = '';

					//making an axios request to the login route
					axios.post('/login', {
						'email': this.email,
						'password': this.password
					}, {
						headers: {
							'Content-Type': 'application/json'
						}
					})
					.then(response => {
						if(response.data != 'Information is incorrect'){
							if(response.data.admin == 0){
								window.location = '/profile/'+response.data.id;
							}else{
								window.location = '/admin';
							}
						}
					})
					.catch(errors => {
						console.log(errors.response);
					})
				}
			}
		}
	}
</script>

<style scoped>
/* Login Form End */
	.login-container{
		margin: 50px 0 10px 0;
		padding: 20px 0;
	}

	.form-group label{
		margin: 0 0 20px 0;
		font-size: 18px;
		color: #014678;
	}

	.form-group input{
		background-color: transparent;
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		border-radius: 0;
		border: none;
		border-bottom: 2px solid #014678;
		font-size: 18px;
	}

	.form-group input:focus{
		background-color: transparent;
		box-shadow: none;
		border-bottom: 2px solid #014678;
		color: #014678;
	}

	.form-group button{
		background-color: #014678;
		color: #FFF;
	}

	.form-group button:hover{
		background-color: #014678;
		color: #FFF;
	}

	.catch-error{
		margin: 10px 0 0 40px;
		font-size: 14px;
		color: #014678;
	}
/* Login Form End */
</style>