<template>
	<div>
		<!-- Create An Account Container Start -->
		<section class="create-an-account-container">
			<!-- Container With Column Of 8 Start -->
			<div class="container col-8">
				<!-- Form Start -->
				<form @submit.prevent="createAnAccount">
					<!-- Firstname Input -->
					<div class="row form-group">
						<label>Firstname:</label>
						<input type="text" v-model="firstname" class="form-control">
					</div>
					<!-- Surname Input -->
					<div class="row form-group">
						<label>Surname:</label>
						<input type="text" v-model="surname" class="form-control">
					</div>
					<!-- Email -->
					<div class="row form-group">
						<label>Email:</label>
						<input type="text" v-model="email" class="form-control">
					</div>
					<!-- Gender Select/Option -->
					<div class="row form-group">
						<label>Gender:</label>
					  	<select v-model="gender" class="form-control">
					    	<option>Male</option>
					    	<option>Female</option>
					    	<option>Other</option>
					  	</select>
					</div>
					<!-- Date Of Birth -->
					<div class="row form-group">
						<label>Date Of Birth:</label>
						<div class="date-container">
							<!-- Year Input -->
							<div class="date-field">
								<input type="text" name="year" v-model="year" placeholder="Y-Y-Y-Y">
							</div>
							<!-- Month Input -->
							<div class="date-field">
								<input type="text" name="month" v-model="month" placeholder="M-M">
							</div>
							<!-- Day Input -->
							<div class="date-field">
								<input type="text" name="day" v-model="day" placeholder="D-D">
							</div>
						</div>	
					</div>
					<!-- Password Input -->
	                <div class="row form-group">
	                    <label>Password:</label>
	                    <input type="password" name="password" v-model="password" class="form-control">
	                </div>
	                <!-- Password Confirm Input -->
	                <div class="row form-group">
	                    <label>Password Confirm:</label>
	                    <input type="password" name="password_confirm" v-model="password_confirm" class="form-control">
	                </div>
	                <!-- Create An Account Button -->
	                <div class="row form-group">
	                    <button type="submit" class="btn"><i class="fas fa-user-plus"></i> Create An Account</button>
						<!-- Catch Errors -->
	                    <div class="catch-error">{{ catch_error }}</div>
	                </div>
				</form>
				<!-- Form End -->
			</div>
			<!-- Container With Column Of 8 End -->
		</section>
		<!-- Create An Account Container End -->
	</div>
</template>

<script>
	export default{
		data(){
			return{//form data
				firstname: '',
				surname: '',
				email: '',
				gender: '',
				year: '',
				month: '',
				day: '',
				password: '',
				password_confirm: '',
				catch_error: ''
			}
		},
		methods:{
			createAnAccount(){
				//regex for a valid email
				const emailCheck = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				//regex for numbers only
				const fieldNum   = /^[0-9]+$/i;
				//regex for letters and numbers
				let fieldLettersNum      = /^[a-zA-Z0-9]+$/i;

				//validation
				if(this.firstname === "" && this.surname === "" && this.email === "" && this.gender === "" && this.year === "" && this.month === "" && this.day === "" && this.password === "" && this.password_confirm === ""){
					//checking if the form is empty
					this.catch_error = 'Please enter the required information.';
				}else if(this.firstname === ""){
					//checking this the firstname input is empty
					this.catch_error = 'Please enter your firstname';
				}else if(this.firstname.length > 25){
					//checking if the firstname character length is more than 25
					this.catch_error = 'Your firstname can\'t be more than 25 characters';
				}else if(this.surname === ""){
					//checking if the surname input is empty
					this.catch_error = 'Please enter your surname';
				}else if(this.surname.length > 20){
					//checking if the surname character length is more than 20
					this.catch_error = 'Your surname can\'t be more than 20 characters';
				}else if(this.email === ""){
					//checking if the email input is empty
					this.catch_error = 'Please enter your email';
				}else if(this.email > 255){
					//checking if the email character length is more than 255
					this.catch_error = 'Your email can\'t be more than 255 characters';
				}else if(!this.email.match(emailCheck)){
					//checking if the email is valid
					this.catch_error = 'Your the email "'+this.email+'" is not valid';
				}else if(this.gender === ""){
					//checking if the user has selected a gender
				}else if(this.year === ""){
					//checking if the year input is empty
					this.catch_error = 'Please enter the year of your birth';
				}else if(this.year.length != 4){
					//checking if there are 4 numbers in the year input
					this.catch_error = 'The year of your birth can only be 4 numbers';
				}else if(this.year < '1900'){
					//checking the year above 1900
					this.catch_error = 'If you were born before 1900 please contact us';
				}else if(!this.year.match(fieldNum)){
					//checking if year input only has numbers
					this.catch_error = 'Please only enter numbers for the year of your birth';
				}else if(this.month === ""){
					//checking if the month input is empty
					this.catch_error = 'Please enter the month of your birth';
				}else if(this.month < '01' || this.month > '12'){
					//checking if the month input is less than 01
					this.catch_error = 'Please enter a Month between 01-12';
				}else if(!this.month.match(fieldNum)){
					this.catch_error = 'Please only enter numbers for the month of your birth';
				}else if(this.day === ""){
					//checking if the day input is empty
					this.catch_error = 'Please enter your day of birth';
				}else if(this.day < '01' || this.day > '31'){
					this.catch_error = 'Please enter a day between 01-31';
				}else if(!this.day.match(fieldNum)){
					this.catch_error = 'Please only enter numbers for the day of your birth';
				}else if(this.month == '02' && this.day > '29'){
					this.catch_error = 'Nice Try! Please enter your real date of birth';
				}else if(this.password === ""){
					//checking if the password input is empty
					this.catch_error = 'Please enter your Password';
				}else if(this.password < 8){
					//checking if the password is less than 8 characters
					this.catch_error = 'Your password can\'t be less than 8 characters';
				}else if(this.password > 255){
					//checking if the password is more than 255 characters
					this.catch_error = 'Your password can\'t be more than 255 characters';
				}else if(!this.password.match(fieldLettersNum)){
					//checking if the password input has letters and numbers only
					this.catch_error = 'Your password can only contain letters and numbers';
				}else if(this.password_confirm != this.password){
					//checking if the passwords match
					this.catch_error = 'Your passwords do not match';
				}else{
					//clearing errors
					this.catch_error = '';

					//make a axios request to the register route
					axios.post('/register', {
						'firstname': this.firstname,
						'surname': this.surname,
						'email': this.email,
						'gender': this.gender,
						'year': this.year,
						'month': this.month,
						'day': this.day,
						'password': this.password,
						'password_confirmation': this.password_confirm
					}, {
						headers:{
							'Content-Type': 'application/json'
						}
					})
					.then(response => {
						console.log(response.data);
						//the users account has been created
						this.catch_error = 'You have now created an account. You can now login';
					})
					.catch(errors => {
						//check for any errors
						console.log(errors.response);
					})
				}
			}
		}
	}
</script>

<style scoped>
/* Create An Account Form Start */
	.create-an-account-container{
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

	.form-group select{
		background-color: transparent;
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		border-radius: 0;
		border: none;
		border-bottom: 2px solid #014678;
		font-size: 16px;
		color: #014678;
	}

	.form-group select:focus{
		background-color: transparent;
		box-shadow: none;
		outline: none;
		color: #014678;
	}

	.form-group select option{
		font-size: 16px;
		color: #014678;
	}

	.date-container{
		margin: 10px auto;
		width: 100%;
		text-align: center;
	}

	.date-field{
		margin: 0 10px;
		height: 60px;
		display: inline;
	}

	.date-field input{
		height: 60px;
		text-align: center;
		font-size: 16px;
		color: #014678;
		display: inline;	
	}

	.date-field input:focus{
		outline: none;
	}

	.date-field input::placeholder{
		text-align: center;
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
/* Create An Account Form End */

/* Responsive Start */
	@media screen and (max-width: 1000px){
		.date-field{
			width: 100%;
			display: inline;
		}

		.date-field input{
			margin: 10px 0;
			width: 100%;
			height: 40px;
		}
	}
/* Responsive End */
</style>