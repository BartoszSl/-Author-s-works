<?php
$host = 'localhost';
$dbname = 'testowa';
$user = 'root';
$password = '';


  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

  $stmt = $pdo->query("SELECT *, date(start_date) as date_without_hours FROM emp");
  
  $rows = $stmt->fetchAll();
 



?>



<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title>CrudzikBudzik</title>

		<script
			src="https://kit.fontawesome.com/9b9dc6ab19.js"
			crossorigin="anonymous"
		></script>

		<link rel="stylesheet" href="./css/style.css" />

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body>
		<div class="backgroundImageShadow"></div>
		<main>
			<div class="rightSideCard leftSideCard">
				<div class="leftCard">
					<div class="shadow"></div>
					<div class="insert">
						<form class="insertForm" action="">
							<div class="headingCard">
								<h2>Dodaj pracownika</h2>
							</div>
							<div class="firstGroup">
								<div class="formItem firstItem">
									<input type="text" id="firstName" />
									<label for="firstName">Podaj imię</label>
								</div>

								<div class="formItem secondItem">
									<input type="text" id="secondName" />
									<label for="secondName">Podaj nazwisko</label>
								</div>
							</div>

							<div class="secondGroup">
								<div class="formItem userItem">
									<input type="number" id="userId" />
									<label for="userId">Podaj User ID</label>
								</div>
								<div class="formItem titleItem">
									<select name="title" id="title">
										<option value="">---------</option>
									</select>
									<label for="title">Podaj title</label>
								</div>

								<div class="formItem dateItem">
									<input type="date" id="startDate" />
									<label for="startDate">Podaj datę startu</label>
								</div>
							</div>

							<div class="thirdGroup">
								<div class="formItem salaryItem">
									<input type="number" id="salary" />
									<label for="salary">Podaj zarobki</label>
								</div>
								<div class="formItem managerItem">
									<select name="managerId" id="managerId">
										<option value="">-------</option>
									</select>
									<label for="managerId">Podaj managerId</label>
								</div>
							</div>
							<div class="fourthGroup">
								<div class="formItem deptItem">
									<select name="deptId" id="deptId">
										<option value="">---------</option>
									</select>
									<label for="deptId">Podaj departament </label>
								</div>
								<div class="formItem">
									<textarea
										class="inputsStyles commentsInput"
										name="comments"
										id="comments"
										cols="30"
										rows="10"
										style="resize: none"
										required
									></textarea>
									<label for="commnets">Komentarz</label>
								</div>
							</div>

							<button type="submit" class="insertDataBase">
								Dodaj Pracownika
							</button>
						</form>
					</div>
				</div>

				<div class="right">
					<div class="listIdentifyCard">
						<div class="headingCard">
							<form action="">
								<input type="text" id="search" placeholder="Search" />

								<button type="submit">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>
							</form>
						</div>
						<?php
						 foreach ($rows as $row) {
							
						  ?>
						<div class="miniInformationCard">
							<div class="sameWidth leftBigInformationCard">
								<fieldset class="daneFieldset">
									<legend>Dane</legend>
									<div class="topSmallCard">
										<p class="firstName">Firstname: <span><?php echo $row['first_name'] ?></span></p>
										<p class="lastName">Lastname: <span><?php echo $row['last_name'] ?></span></p>
									</div>
							
											<div class="downSmallCard">
										<p class="userId">UserID: <span><?php if($row['userid'] === NULL){
											echo "NULL";
											}else{
												echo $row['userid']; 
											}?></span></p>
										<div class="icons">
											<button><i class="fa-solid fa-pen"></i></button>
											<button><i class="fa-solid fa-xmark "></i></button>
										</div>
									</div>
									<p class="startDate">start_date: 
									<span>
									<?php if($row['date_without_hours'] === NULL){
											echo "NULL";
											}else{
												echo $row['date_without_hours']; 
											}?>
									</span></p>
									<p class="managerId">Managerid: <span>
										<?php if($row['manager_id'] === NULL){
											echo "NULL";
											}else{
												echo $row['manager_id'];
												} ?></span></p>


									<p class="title">Title: <span>
									<?php if($row['title'] === NULL){
											echo "NULL";
											}else{
												echo $row['title']; 
											}?>		
								</span></p>
								</fieldset>
							</div>

							<div class="sameWidth rightBigInformationCard">
								<fieldset class="salaryFieldset">
									<legend>Salary</legend>
									<p class="deptId">Deptid: <span>
									<?php if($row['dept_id'] === NULL){
											echo "NULL";
											}else{
												echo $row['dept_id']; 
											}?>	
								</span></p>
									<p class="salary">Salary: <span>
									<?php if($row['salary'] === NULL){
											echo "NULL";
											}else{
												echo $row['salary']; 
											}?>	
								</span></p>
								</fieldset>
								<fieldset class="commentsFieldset">
									<legend>Comments</legend>
									<p class="comments">
										<?php echo $row['comments'] ?>
									</p>
								</fieldset>
							</div>
						</div>
						 <?php }?>
						
						
					</div>

					<h4 class="author">Author: <span>Bartosz Ślusarczyk &copy;</span></h4>
				</div>
			</div>
		</main>

		<script src="./js/script.js"></script>
	</body>
</html>
