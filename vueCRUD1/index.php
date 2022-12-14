<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vue CRUD</title>
	<link rel="stylesheet" href="css/style.css">
	
	<style>
		#errorMassage{
			margin-top: 3px;
			height: 20px;
			background: #fd7a7a;
			color: #af1212;
			padding: 10px;
			border-left: 5px solid red;
			font-weight: bold;
		}
		#successMassage{
			margin-top: 3px;
			height: 20px;
			background: #84c384;
			color: #178817;
			padding: 10px;
			border-left: 5px solid green;
			font-weight: bold;
		}
		.fade-enter-active,
		.fade-leave-active {
		  transition: margin-top 0.8s;
		}
		.fade-enter,
		.fade-leave-to {
		  margin-top: -600px;
		}
	</style>
</head>
<body>
	<!-- root div for vue -->
	<?php
	//include 'db.php';


?>
	<div id="root">
		<!-- Main Content -->
		<div class="container">
			<div class="header">
				<div class="hl">
					<h1>List CRUD Vue</h1>
				</div>
				<div class="hr">
					<button class="btn-gray" @click="showingAddModal=true">ADD NEW</button>
				</div>
			</div>
			<hr>
			<p id="errorMassage" v-if="errorMessage">
				{{ errorMessage }}
			</p>
			<p id="successMassage" v-if="successMessage">
				{{ successMessage }}
			</p>
			<div class="body">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Roll</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="user in users">
							<td>{{ user.id }}</td>
							<td>{{ user.name }}</td>
							<td>{{ user.roll }}</td>
							<td>
								<button class="btn-gray mr-2" @click="showingEditModal=true; selectUser(user)">Edit</button>
								<button class="btn-gray" @click="showingDeleteModal=true; selectUser(user)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Add Model -->
		<transition name="fade">
			<div id="model" v-if="showingAddModal">
				<div class="mainModel">
					<div class="modelHead">
						<h3>Model</h3>
						<button type="button" @click="showingAddModal=false">X</button>
					</div>
					<div class="modelBody">
						<div class="modelForm">
							<table>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td><input type="text" name="" v-model="newUser.name"></td>
								</tr>
								<tr>
									<td>Roll</td>
									<td>:</td>
									<td><input type="text"  name="" v-model="newUser.roll"></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<button class="btn-pink" style="margin-top: 30px;" @click="showingAddModal=false; saveUser()">ADD NEW</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</transition>

		<!-- Edit Model -->
		<transition name="fade">
			<div id="model" v-if="showingEditModal">
				<div class="mainModel">
					<div class="modelHead">
						<h3>Model</h3>
						<button type="button" @click="showingEditModal=false">X</button>
					</div>
					<div class="modelBody">
						<div class="modelForm">
							<table>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td><input type="text" name="" v-model="clickedUser.name"></td>
								</tr>
								<tr>
									<td>Roll</td>
									<td>:</td>
									<td><input type="text" name="" v-model="clickedUser.roll"></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<button class="btn-pink" style="margin-top: 30px;" @click="showingEditModal=false; updateUser()">Update</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</transition>

		<!-- Delete Model -->
		<transition name="fade">
			<div id="model" v-if="showingDeleteModal">
				<div class="mainModel">
					<div class="modelHead">
						<h3>Model</h3>
						<button type="button" @click="showingDeleteModal=false">X</button>
					</div>
					<div class="modelBody">
						<div class="modelForm">
							<table>
								<tr>
									<td>Are you sure to delete {{ clickedUser.name }} </td>
								</tr>
								
								<tr>
									
									<td>
										<button class="btn-pink" style="margin-top: 30px;" @click="showingDeleteModal=false; deleteUser()">Yes</button>
										<button class="btn-pink" style="margin-top: 30px;" @click="showingDeleteModal=false">No</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</transition>
	</div>

<script src="js/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>  
<script src="js/app.js"></script>	
</body>
</html>