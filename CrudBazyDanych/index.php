<?php

	$search_firstName = $_POST['search_firstName'] ?? null;

  $pdo = new PDO("mysql:host=localhost;dbname=testowa;charset=utf8", 'root', '');

  $stmt = $pdo->query("SELECT *, date(start_datee) as date_without_hours FROM emp");
  
  $rows = $stmt->fetchAll();
 
  $dept = $pdo->query('SELECT dept.id, dept.name AS dept_name, region.name AS region_name from dept Right OUTER JOIN region ON dept.region_id = region.id');
  $deptDane = $dept->fetchAll();

  $title = $pdo->query('SELECT * FROM title');
  $titleDane = $title->fetchAll();

  $manager = $pdo->query('SELECT * FROM emp ;');
  $managerDane = $manager->fetchAll();

  $wynikSearch = $pdo->query("SELECT *, date(start_datee) as date_without_hours FROM emp WHERE first_name='$search_firstName'");
  $searchDane =  $wynikSearch->fetchAll();


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
				

				<div class="right">
					<div class="listIdentifyCard">
						<div class="headingCard">
							<form method="post">
								<input type="text" id="search" placeholder="Search by FirstName" name="search_firstName" />

								<button type="submit" name="wyslij">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>				
							</form>
						</div>
						<?php

						
						if(isset($_POST['wyslij'])){
							
							

							foreach ($searchDane as $row):
								$aktualneId = $row['id'];
								?>


							  <div class="miniInformationCard">
							  	<div class="rightPanel">
								  <div class="icons">
												  <button class="updateButton"  id="aktualizuj" name="aktualizuj"><i class="fa-solid fa-pen linkAktualizuj"></i></button>
												  <button><i class="fa-solid fa-xmark"></i></button>
											  </div>
								</div>
							  	<div class="sameWidth">
									  <fieldset class="daneFieldset">
										  <legend>Dane</legend>
										  <div class="topSmallCard">
											  <p class="firstName">Firstname: <span class="firstNameSearch"><?php echo $row['first_name'] ?></span></p>
											  <p class="lastName">Lastname: <span><?php echo $row['last_name'] ?></span></p>
											  
										  </div>
								  
												  <div class="downSmallCard">
											  <p class="userId">UserID: <span><?php if($row['userid'] === NULL){
												  echo "NULL";
												  }else{
													  echo $row['userid']; 
												  }?></span></p>
											 
										  </div>
										  <p class="start_date">start_date: 
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
							   <?php endforeach; 
							   

												}
						 foreach ($rows as $row):
							
							
						  ?>

							
						<div class="miniInformationCard">
							<div class="rightPanel">
							<div class="icons">
												  <button value="" id="aktualizuj" name="aktualizuj"><i class="fa-solid fa-pen linkAktualizuj"></i></button>

												  <?php if(isset($_POST['aktualizuj'])){$aktualneId = $row['id'];} ?>

												  <button><i class="fa-solid fa-xmark"></i></button>
											  </div>
						 </div>
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
										
									</div>
									<p class="start_date">start_date: 
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
						
						 <?php endforeach; 
						 $pickId = $pdo->query("SELECT * FROM emp WHERE id = '$aktualneId'");
						 $pickIdDane = $pickId->fetchAll();
						 ?>
						
						
					</div>

					<h4 class="author">Author: <span>Bartosz Ślusarczyk &copy;</span></h4>
				</div>

				<div class="leftCard">
					<div class="shadow"></div>
					<div class="insert">
						<form class="insertForm " action="script.php" method="get">
							
						
						<div class="headingCard">
								<h2 class="add">Dodaj pracownika</h2>
								<h2 class="update h2Update">Edytuj użytkownika</h2>
							</div>

							<div class="firstGroup">
								<div class="formItem firstItem">
									<input type="text" id="firstName" name="first_name" required />
									<label for="firstName">Podaj imię</label>
								</div>

								<div class="formItem secondItem">
									<input type="text" id="secondName" name="last_name" required />
									<label for="secondName">Podaj nazwisko</label>
								</div>
							</div>

							<div class="secondGroup">
								<div class="formItem userItem">
									<input type="number" id="userId" name="userId"/>
									<label for="userId">Podaj User ID</label>
								</div>
								<div class="formItem titleItem">
									<select name="title" id="title">
										<option value="">---------</option>
										<?php foreach($titleDane as $d): ?>
                    					<option value="<?= $d['name'] ?>" required ><?= $d['name'] ?></option>
                    					<?php endforeach ?>
									</select>
									<label for="title">Podaj title</label>
								</div>

								<div class="formItem dateItem">
									<input type="date" id="start_date" name="start_date" required />
									<label for="startDate">Podaj datę startu</label>
								</div>
							</div>

							<div class="thirdGroup">
								<div class="formItem salaryItem">
									<input type="number" id="salary" name="salary" required />
									<label for="salary">Podaj zarobki</label>
								</div>
								<div class="formItem managerItem">
									<select name="managerId" id="managerId">
										<option value="">-------</option>
										  	<?php foreach($managerDane as $d): ?> 
                    						<option value="<?= $d['id'] ?>" required ><?= $d['id'] ?> - <?= $d['last_name'] ?></option>
                    						<?php endforeach ?> 
									</select>
									<label for="managerId">Podaj managerId</label>
								</div>
							</div>
							<div class="fourthGroup">
								<div class="formItem deptItem">
									<select name="deptId" id="deptId">
										<option value="">---------</option>
										 <?php foreach($deptDane as $d): ?> 
                    					<option value="<?= $d['id'] ?>" required ><?= $d['region_name'] ?>-<?= $d['dept_name'] ?></option>
                    					<?php endforeach ?>
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

							<?php 
								foreach($pickIdDane as $pick):
									

?>
									<p><?php echo "Edytujesz: "; ?><span><?php echo $pick['last_name'];?></span></p>

									<input type="hidden" name="emp_id" value="<?php echo $pick['id']; ?>">
<?php	
										 endforeach;

?>

							<button type="submit" class="insertDataBase update" name="empUpdate">
								Zapisz Edycję
							</button>

							<button type="submit" class="insertDataBase add" name="empAdd">
								Dodaj Pracownika
							</button>

						</form>
					</div>
				</div>
			</div>
		</main>

		<script src="./js/script.js"></script>
	</body>
</html>
