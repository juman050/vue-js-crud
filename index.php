<!DOCTYPE html>
<html lang="en">
<head>
    <!--=== meta ===-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vue js - crud</title>

    <!--=== css fixed ===-->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap v3.3.7 -->
    <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- Font Awesome V4.7.0 -->

    <!--=== custom css ===-->
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

  <div class="container" id="root">

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        
        <h4>All User list <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#adduser">Create</button></h4>
        <p class="text-danger" v-if ="errorMessage">
          {{errorMessage}}
        </p>
        <p class="text-success" v-if ="successMessage">
          {{successMessage}}
        </p>
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>#</th>
              <th>Fullname</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users">
              <td>{{user.id}}</td>
              <td>{{user.name}}</td>
              <td>{{user.email}}</td>
              <td>{{user.address}}</td>
              <td><button type="button" @click="selectUser(user)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edituser">edit</button>
                <button type="button" @click="selectUser(user)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser">delete</button></td>
            </tr>
        
          </tbody>
        </table>
      </div>
     </div>

      <!-- add user Modal -->
      <div class="modal fade" id="adduser" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Create User</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <input type="text" name="" placeholder="Enter name" v-model="newUser.name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="" placeholder="Enter email" v-model="newUser.email" class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="" placeholder="Enter address" v-model="newUser.address" class="form-control"></textarea>
                </div>
                <button data-dismiss="modal" class="btn btn-success btn-sm" @click="saveUser();">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit user Modal -->
      <div class="modal fade" id="edituser" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <input type="text" name="" placeholder="Enter name" v-model="clickedUser.name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="" placeholder="Enter email" v-model="clickedUser.email" class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="" placeholder="Enter address" v-model="clickedUser.address" class="form-control"></textarea>
                </div>
                <button data-dismiss="modal" class="btn btn-success btn-sm" @click="updateUser();">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- deleteuser user Modal -->
      <div class="modal fade" id="deleteuser" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete User</h4>
            </div>
            <div class="modal-body">
                <p>You are going to delete '{{clickedUser.name}}'.</p>
                <button data-dismiss="modal" class="btn btn-danger btn-sm" @click="deleteUser();">Delete</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


    <!--=== fixed js ===-->
    <script src="js/jquery.min.js"></script> <!-- jQuery v3.1.1 -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- Bootstrap v3.3.7 -->
    <script src="js/axios.min.js"></script>
    <script src="js/vue.js"></script>
    <!--=== custom js ===-->
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>