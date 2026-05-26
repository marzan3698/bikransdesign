<div class="row"><div class="col-lg-12 bottom35">
							<div class="col-lg-12">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<h5>Last 10 Users</h5>
										<div class="ibox-tools"> <a class="btn red btn-xs" href=""> 31-Jan-2017</a> </div>
									</div>
            <?php $query=$queryBuilder->table('member')->orderBy('id','desc')->limit('10')->get();
                $sl=1;
           ?>
									<div class="ibox-content collapse in">
										<div class="widgets-container">
											<div class="table table-hover">
												<table id="SalaryTable" class="display nowrap table  responsive nowrap table-bordered">
													
        <table style="color: black;" class="table table-bordered">
                <tr style="font-size: 18px;">
                    <td>SL</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Phone</td>
                    <td>Refer ID</td>
                    <td>Action</td>
                </tr>
                
                <?php
                foreach($query as  $row){
                 ?>
                <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><strong>Username :</strong> <?php echo $row->username; ?><br />
                        <strong>Fullname :</strong> <?php echo $row->name; ?>
                    </td>
                    <td><?php echo $row->show_password; ?></td>
                    <td><?php echo $row->phone; ?><br />
                    <?php echo $row->email; ?>
                    </td>
                    <td><?php $refer=$queryBuilder->table('member')->where('id',$row->refer_id)->first();
                        if($refer !== null){
                            echo $refer->username;
                        }else{
                            echo 'No Refer ID';
                        }
                     ?></td>
                    <td><a class="badge badge-danger"><i class="fas fa-edit"></i> Edit</a></td>
                </tr>
               <?php  } ?>
            </table>
                                            
                                                    
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>