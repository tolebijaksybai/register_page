<?php
session_start();
require_once "functions.php";

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$edit_user_id = (int)$_GET["status"];

if (!autorization($email, $password)) {
	redirect_to('page_login.php');
	exit();
}

$logger_user_id = (int)get_id_by_email($email);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="description" content="Chartist.html">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
	<link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
	<link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
	<link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
	<link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
</head>

<body>
	<?php include 'include/navbar.php'; ?>
	<main id="js-page-content" role="main" class="page-content mt-3">
		<div class="subheader">
			<h1 class="subheader-title">
				<i class='subheader-icon fal fa-sun'></i> Установить статус
			</h1>

		</div>

		<?php echo display_flash_message('danger'); ?>
		<?php echo display_flash_message('success'); ?>

		<form action="status_information.php" method="POST">
			<div class="row">
				<div class="col-xl-6">
					<div id="panel-1" class="panel">
						<div class="panel-container">
							<div class="panel-hdr">
								<h2>Установка текущего статуса</h2>
							</div>
							<div class="panel-content">
								<div class="row">
									<div class="col-md-4">
										<?php
										$statuses = [
											'online' => 'Онлайн',
											'offline' => 'Отошел',
											'dnd' => 'Не беспокоить',
										];
										?>
										<?php $user = get_user_by_id($edit_user_id); ?>
										<!-- status -->
										<?php if (is_admin($email) || $_SESSION['user'] === $user['username']) : ?>

											<div class="form-group">
												<input type="hidden" name="id" value="<?= $user['id'] ?>">
												<label class="form-label" for="example-select">Выберите статус</label>
												<select class="form-control" id="example-select" name="status">
													<?php foreach ($statuses as $key => $value) : ?>
														<option <?php if ($key == $user['status']) {
																	echo "selected";
																} ?> value="<?= $key ?>"><?= $value ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<?php else : ?>
											<?php
											set_flash_message("danger", "Можно редактировать только свой профиль");
											redirect_to("users.php");
											exit();
											?>
										<?php endif; ?>

									</div>
									<div class="col-md-12 mt-3 d-flex flex-row-reverse">
										<button class="btn btn-warning">Set Status</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</form>

	</main>

	<script src="js/vendors.bundle.js"></script>
	<script src="js/app.bundle.js"></script>
	<script>
		$(document).ready(function() {

			$('input[type=radio][name=contactview]').change(function() {
				if (this.value == 'grid') {
					$('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
					$('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
					$('#js-contacts .js-expand-btn').addClass('d-none');
					$('#js-contacts .card-body + .card-body').addClass('show');

				} else if (this.value == 'table') {
					$('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
					$('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
					$('#js-contacts .js-expand-btn').removeClass('d-none');
					$('#js-contacts .card-body + .card-body').removeClass('show');
				}

			});

			//initialize filter
			initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
		});
	</script>
</body>

</html>