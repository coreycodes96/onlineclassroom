const admin = {
	namespaced: true,
	state:{
		users: {}, //all users stored here
		classes: [] //all classes stored here
	},
	getters:{
		fetchUsers: state => state.users, //fetching the users
		fetchClasses: state => state.classes //fetching the classes
	},
	actions:{
		getUsers({commit}){
			//getting all the users
			axios.get('admin/users')
			.then(response => {
				commit('STORE_USERS', response.data);
			})
		},
		getClasses({commit}){
			//getting all the classes
			axios.get('admin/classes')
			.then(response => {
				commit('STORE_CLASSES', response.data);
			})
		},
		addClass({commit}, data){
			//making an axios request to the admin/create route
			axios.post('admin/create', {
				'title': data.title,
				'info': data.info
			}, {
				headers:{
					'Content-Type': 'application/json'
				}
			})
			.then(response => {
				console.log(response.data);
				commit('PUSH_CLASS', response.data);
			})
			.catch(errors => {
				console.log(errors.response);
			})
		},
		//delete a class
		deleteClass({commit}, data){
			axios(`admin/delete/class/${data.id}`, {
				method: 'delete'
			})
			.then(response => {
				console.log(response.data);
				commit('DESTROY_CLASS', data.index);
			})
			.catch(errors => {
				console.log(errors.response);
			})
		},
		//delete a users account
		deleteUser({commit}, data){
			axios(`admin/delete/user/${data.id}`, {
				method: 'delete'
			})
			.then(response => {
				console.log(response.data);
				commit('DESTROY_USER', data.index);
			})
			.catch(errors => {
				console.log(errors.response);
			})
		}
	},
	mutations:{
		//store the users in state
		STORE_USERS(state, users){
			state.users = users;
		},
		//store the classes in the state
		STORE_CLASSES(state, classes){
			state.classes = classes;
		},
		//push new class to state
		PUSH_CLASS(state, classes){
			state.classes.unshift(classes);
		},
		//remove class from state
		DESTROY_CLASS(state, index){
			state.classes.splice(index, 1);
		},
		//remove user from state
		DESTROY_USER(state, index){
			state.users.splice(index, 1);
		}
	}
}

export default admin