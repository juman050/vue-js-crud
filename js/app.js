var app = new Vue({
	el: "#root",
	data: {
		errorMessage: '',
		successMessage: '',
		users:[],
		newUser: {name: "", email: "", address: ""},
		clickedUser: {}
	},
	mounted: function(){
		console.log('mounted')
		this.getAllUsers();
	},
	methods: {
		getAllUsers: function () {
			axios.get("http://localhost/vuejs_crud/api.php?action=read")
			.then(function (response) {
				if (response.errorMessage) {
					app.errorMessage = response.errorMessage;
				}else{
					app.users = response.data.users;
				}
			});
		},

		saveUser: function(){
			//console.log(app.newUser);
			var formData = app.toFormData(app.newUser);

			axios.post("http://localhost/vuejs_crud/api.php?action=create", formData)
			.then(function(response){
				
				app.newUser = {name: "", email: "", address: ""};

				if(response.data.error){
					app.errorMessage = response.data.message; 
				} else{
					app.getAllUsers();
				}
			});
		},
		updateUser: function(){
			//console.log(app.newUser);
			var formData = app.toFormData(app.clickedUser);

			axios.post("http://localhost/vuejs_crud/api.php?action=update", formData)
			.then(function(response){				
				app.clickedUser = {};
				if(response.data.error){
					app.errorMessage = response.data.message; 
				} else{
					app.successMessage = response.data.message; 
					app.getAllUsers();
				}
			});
		},

		deleteUser: function(){
			//console.log(app.newUser);
			var formData = app.toFormData(app.clickedUser);

			axios.post("http://localhost/vuejs_crud/api.php?action=delete", formData)
			.then(function(response){				
				app.clickedUser = {};
				if(response.data.error){
					app.errorMessage = response.data.message; 
				} else{
					app.successMessage = response.data.message; 
					
					app.getAllUsers();
				}
			});
		},

		selectUser(user){
			app.clickedUser = user;
		},

		toFormData: function(obj){
			var form_data = new FormData();
		      for ( var key in obj ) {
		          form_data.append(key, obj[key]);
		      } 
		      return form_data;
		},

		clearMessage: function(){
			app.errorMessage = "";
			app.successMessage = "";
		}
	}
});