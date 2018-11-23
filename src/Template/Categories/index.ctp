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