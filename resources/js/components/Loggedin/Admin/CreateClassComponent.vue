<template>
	<div>
		<!-- Login Container Start -->
		<section class="create-a-class-container">
			<!-- Container With Column Of 8 Start -->
			<div class="container col-8">
				<!-- Form Start -->
				<form @submit.prevent="createClass">
					<!-- Email Input -->
					<div class="row form-group">
						<label>Title:</label>
						<input type="text" name="title" v-model="title" class="form-control">
					</div>
					<!-- Password Input -->
	                <div class="row form-group">
	                    <label>Info:</label>
	                    <textarea type="text" name="info" v-model="info" class="form-control"></textarea>
	                </div>
	                <!-- Login Button -->
	                <div class="row form-group">
	                    <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Create Class <i class="fas fa-plus"></i></button>
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
	//vuex
	import {mapActions} from 'vuex';
	export default{
		data(){
			return{//form data
				title: '',
				info: '',
				catch_error: ''
			}
		},
		methods:{
			//getting createClass actions
			...mapActions('admin', ['getClasses', 'addClass']),
			createClass(){
				//validation
				if(this.title === "" && this.info === ""){
					//if the form is empty
					this.catch_error = 'Please enter the required information';
				}else if(this.title === ""){
					//if the title input is empty
					this.catch_error = 'Please enter a title';
				}else if(this.info === ""){
					//if the info input is empty
					this.catch_error = 'Please enter some info';
				}else{
					//clearing errors
					this.catch_error = '';

					//putting all the data in an object
					const data = {
						title: this.title,
						info: this.info
					};

					//creating a new class
					this.addClass(data);

					//call the classes
					this.getClasses();

					//display success message
					this.catch_error = 'Class created!';
				}
			}
		}
	}
</script>

<style scoped>
/* Create A Class Form End */
	.create-a-class-container{
		margin: 50px 0 0 0;
		padding: 5px 0;
	}

	.form-group label{
		margin: 10px 0;
		font-size: 18px;
		color: #014678;
	}

	.form-group input{
		margin: 0 0 20px 0;
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

	.form-group textarea{
		height: 150px;
		background-color: transparent;
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		-o-border-radius: 0;
		border-radius: 0;
		border: none;
		border-top: 2px solid #014678;
		border-bottom: 2px solid #014678;
		font-size: 18px;
		resize: none;
	}

	.form-group textarea:focus{
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
/* Create A Class Form End */
</style>