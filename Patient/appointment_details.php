<?php
include "dash_common.php";

 ?>

 <div class="app-main__outer">
     <div class="app-main__inner">

       <div class="col-lg-12">
           <div class="main-card mb-3 card">
               <div class="card-body"><h5 class="card-title">Upcoming Appointment Summary</h5>
                   <table class="mb-0 table table-striped">
                       <thead>
                       <tr>
                           <th>#</th>
                           <th>Doctor Name</th>
                           <th>Hospital Name</th>
                           <th>Date & Time</th>
                           <th>Action</th>

                       </tr>
                       </thead>
                       <tbody>
                         <?php
                          $details = getThis("SELECT `id`,`hospitalID`, `doctorID`, `appointmentAt` FROM `patienttoken` WHERE `patientID` = '$id' AND `enabled` = '1' ORDER BY `appointmentAt` ASC");

                          for($i=0;$i<sizeof($details);$i++){
                            $temp = $details[$i];
                            ?>
                       <tr>
                           <th scope="row"><?php echo $i+1; ?></th>
                           <td><?php
                           $doctorid = $temp['doctorID'];
                           $docName = getThis("SELECT `fullName` from `doctors` WHERE `id` = '$doctorid'");
                           $docName = e_d('d',$docName[0]['fullName']);
                           echo $docName;
                            ?></td>
                           <td><?php
                           $hospid = $temp['hospitalID'];
                           $hospName = getThis("SELECT `hospitalName` from `hospitals` WHERE `id` = '$hospid'");
                           $hospName = e_d('d',$hospName[0]['hospitalName']);
                           echo $hospName;
                            ?></td>
                            <?php
                            $date = date('<b>d M</b> Y <b>h.i.s A</b>',strtotime($temp['appointmentAt']));
                             ?>
                           <td><?php echo $date; ?></td>
                           <td><a href="functionality/appointment_cancel.php?id=<?php echo e_d('e',$temp['id']); ?>" class="mb-2 mr-2 btn btn-primary" >Cancel Appointment</a></td>
                       </tr>
                     <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>


</div>
</div>
</body>
</html>
