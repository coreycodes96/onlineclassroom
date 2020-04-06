<template>
	<div>
		<!-- Alerting User Start -->
		<div v-if="alertClassResponse" class="alert" role="alert">
			<button @click="closeAlert" class="btn"><i class="fas fa-times-circle"></i></button>
		  	<p>{{ alertClassResponse }}</p>
		</div>
		<!-- Alerting User End -->

		<!-- Enter Or Leave Button Start -->
		<div v-if="classEnterCount.find(e => e.user_id == userId) && status == 1">
			<!-- if the user has already entered the class -->
			<button @click="enterOrLeaveClass" class="btn">Enter Class({{ enterCount }}) <i :class="open_door"></i></button>
		</div>
		<div v-else>
			<!-- if the user hasn't entered a class -->
			<button @click="enterOrLeaveClass" class="btn">Enter Class({{ enterCount }}) <i :class="close_door"></i></button>
		</div>
		<!-- Enter Or Leave Button End -->
	</div>
</template>

<script>
	export default{
		props:{
			userId: String, //getting the users ID
			classId: Number, //getting the class ID
			classEnterCount: Array //getting the enter class array
		},
		data(){
			return{
				enterCount: this.classEnterCount.length, //getting the length of the enter class array
				status: 1, // setting the button status to 1 ( the user has already entered the class )
				open_door: 'fas fa-door-open', //open the door icon
				close_door: 'fas fa-door-closed', //close the door icon
				alertClassResponse: null //alerting the user if they enter or leave a class
			}
		},
		methods:{
			enterOrLeaveClass(){
				//making an axios request to the enterclass route
				axios.post('/enterclass', {
					'class_id': this.classId,
					'user_id': this.userId
				}, {
					headers:{
						ContentType: 'application/json'
					}
				})
				.then(response => {
					console.log(response.data);

					//if user is has already entered the class
					if(response.data == 'You have now left the class.' && this.status == 1){
						//removing user from class
						this.enterCount--;
						this.status = 0;
					}else{
						//entering user to class
						this.enterCount++;
						this.status = 1;
					}

					//if the user hasn't entered a class
					if(this.status ==  0){
						//close door
						this.open_door = 'fas fa-door-closed';
					}else{
						//open door
						this.open_door = 'fas fa-door-open';
					}

					//if the user has entered a class
					if(this.status ==  1){
						//open door
						this.close_door = 'fas fa-door-open';
					}else{
						//close door
						this.close_door = 'fas fa-door-closed';
					}

					//alerting the user
					this.alertClassResponse = response.data;
				})
				.catch(errors => {
					console.log(errors.response);
				})
			},
			closeAlert(){
				//hide the alert box
				this.alertClassResponse = null;
			}
		}
	}
</script>

<style scoped>
/* Alerts Start */
	.alert{
		position: relative;
		padding: 5px;
		width: 240px;
		background: #014678;
		color: #FFF;
	}

	.alert button{
		margin: 0;
		padding: 0;
		position: absolute;
		top: 5px;
		right: 10px;
		color: #FFF;
	}

	.alert button:hover{
		color: #FFF;
	}

	.alert p{
		padding: 0px 10px;
	}
/* Alerts End */

/* Button Start */
	button{
		position: absolute;
		top: 20px;
		right:20px;
		background-color: #014678;
		color: #FFF;
	}

	button:hover{
		background-color: #014678;
		color: #FFF;
	}
/* Button End */
</style>