<?php
include "dash_common.php";
?>

<!-- form area starts -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">

					<div><?php echo $name; ?>'s Dashboard
						<div class="page-title-subheading">Welcome to Your DashBoard!!
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xl-12">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Total Doctors</div>
						</div>
						<div class="widget-content-right">
							<?php
							$totaldoctorcount = getThis("SELECT COUNT(`id`) AS tdc FROM `doctors` WHERE `hospitalID` = '$id' AND `enabled`= '1'");
							$totaldoctorcount = $totaldoctorcount[0]['tdc'];
							?>
							<div class="widget-numbers text-white"><span><?php echo $totaldoctorcount; ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<hr>
			</div>
			<?php
			$departments = getThis("SELECT `id`, `departmentName` FROM `departments` WHERE 1");
			$sizeofdepartments = sizeof($departments);
			for ($i = 0; $i < $sizeofdepartments; $i++) {
				$DL = $departments[$i];
				$departmentid = $DL['id'];
				$totaldoctorcountbydepartment = getThis("SELECT COUNT(`id`) AS tdcbd FROM `doctors` WHERE `hospitalID` = '$id' AND `departmentID` = '$departmentid'  AND  `enabled`= '1'");
				$totaldoctorcountbydepartment = $totaldoctorcountbydepartment[0]['tdcbd'];
				if ($totaldoctorcountbydepartment > 0) {
			?>
					<div class="col-md-6 col-xl-6">
						<div class="card mb-3 widget-content bg-arielle-smile">
							<div class="widget-content-wrapper text-white">
								<div class="widget-content-left">
									<div class="widget-heading"><?php echo $DL['departmentName']; ?></div>
								</div>
								<div class="widget-content-right">
									<div class="widget-numbers text-white"><span><?php echo $totaldoctorcountbydepartment; ?></span></div>
								</div>
							</div>
						</div>
					</div>
			<?php	}
			} ?>
			<div class="col-md-12">
				<hr>
			</div>
			<div class="col-md-12 col-xl-12">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Total Patients</div>
						</div>
						<div class="widget-content-right">
							<?php
							$totalpatientcount = getThis("SELECT COUNT(`id`) AS tdc FROM `doctors` WHERE `hospitalID` = '$id' AND `enabled`= '1'");
							$totalpatientcount = $totalpatientcount[0]['tdc'];
							?>
							<div class="widget-numbers text-white"><span><?php echo $totaldoctorcount; ?></span></div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>




</body>

</html>