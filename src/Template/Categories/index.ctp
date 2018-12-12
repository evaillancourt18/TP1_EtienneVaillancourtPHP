<?php
$urlToRestApi = $this->Url->build('/api/categories', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Categories/index', ['block' => 'scriptBottom']);
?>
<!DOCTYPE html>
	<html ng-app="app">
		<head>
			<meta charset="UTF-8">
			<title>Categories index</title>
		</head>
		
		<body>
		 <div ng-controller = "usersCtrl">

                <div id="logDiv" style="margin: 10px 0 20px 0;"><a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$('#loginForm').slideToggle();">Login</a></div>

                <div class="none formData" id="loginForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>Username</label>
                            <input ng-model="username" type="text" class="form-control" id="username" name="username" style="width: 250px" />
                            <label>Password</label>
                            <input ng-model="password" type="password" class="form-control" id="password" name="password"  style="width: 250px"/>
							<div id="example1"></div> 
							<p style="color:red;">{{ captcha_status }}</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#loginForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="login()">Submit</a>
                    </form>
                </div>

                <div class="panel-body none formData" id="changeForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>New password</label>
                            <input ng-model="newPassword" type="password" class="form-control" id="form-password" name="form-password" style="width: 250px" />
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#changeForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="changePassword()">Submit</a>
                        <a href="javascript:void(0);" class="btn btn-warning" ng-click="logout()">Logout</a>
                    </form>
                </div>
                <br>
                <div>
                    <p style="color: green;">{{messageLogin}}</p>
                    <p style="color: red;">{{errorLogin}}</p>
                </div>
                <br>

		 </div>
			<div ng-controller="CategoryCRUDController">
				<table>
					<tr>
						<td width="100">ID:</td>
						<td><input type="text" id="id" ng-model="category.id" /></td>
					</tr>
					<tr>
						<td width="100">Name:</td>
						<td><input type="text" id="name" ng-model="category.name" /></td>
					</tr>

				</table>
				<br /> <br /> 
				<a ng-click="updateCategory(category.id,category.name)">Update category</a> 
				<a ng-click="addCategory(category.name)">Add category</a> 
			<br /> <br />
			<p style="color: green">{{message}}</p>
			<p style="color: red">{{errorMessage}}</p>
			 
			<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
										<tr ng-repeat="category in categories">
											<td>{{category.id}}</td>
											<td>{{category.name}}</td>
											
											<td>
												<a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="getCategory(category.id)"></a>
												<a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteCategory(category.id)"></a>
											</td>
										</tr>
						</table>
					   
			</div>
		</body>
	</html>