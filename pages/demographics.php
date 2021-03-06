<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <title>Girl Demographics</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="">
        <meta name="author" content="" />

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800" type="text/css">
        <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" />		
        <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" />	
        <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />			

        <link rel="stylesheet" href="./js/plugins/icheck/skins/minimal/blue.css" type="text/css" />

        <link rel="stylesheet" href="./css/App.css" type="text/css" />

        <link rel="stylesheet" href="./css/custom.css" type="text/css" />

    </head>

    <body>

        <div id="wrapper">
            <?php include 'includes/headerone.php'; ?>


            <div id="sidebar-wrapper" class="collapse sidebar-collapse">
                <?php
                include 'includes/navigation.php';
                ?>

            </div> <!-- /#sidebar-wrapper -->



            <div id="content">		

                <div id="content-header">
                    <h1>Demographics</h1>
                </div> <!-- #content-header -->	


                <div id="content-container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="portlet">
                                <img src="img/excel.png" alt="excel"/> <a href="index.php?page=download_excel" target="_blank"><label class="label label-success">Download Excel</label></a>
                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-list"></i>
                                        List Mapped Girl Demographics
                                    </h3>

                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">						

                                    <div class="table-responsive">

                                        <table 
                                            class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                                            data-provide="datatable" 
                                            data-display-rows="10"
                                            data-info="true"
                                            data-search="true"
                                            data-length-change="true"
                                            data-paginate="true"
                                            >
                                            <thead>
                                                <tr>
                                                    <th data-filterable="true" data-sortable="true" data-direction="desc">Full Name</th>
                                                    <th data-direction="asc" data-filterable="true" data-sortable="true">DOB</th>
                                                    <th data-filterable="true" data-sortable="true">Phone-Girl</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">Phone-Holder</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">Girl Location</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">LMD</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">Marital Status</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">Education Level</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">EDD</th>
                                                    <th data-filterable="true" class="hidden-xs hidden-sm">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $get_id = Input::get("grp");
                                                $patient_list = DB::getInstance()->query("SELECT * FROM core_patients");
                                                foreach ($patient_list->results() as $patient_list) {
                                                    $age = calcAge($patient_list->dob, date('Y-m-d'));
                                                    if ($get_id == 1) {
                                                        if ($age >= 15 && $age <= 19) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $patient_list->given_name . " " . $patient_list->family_name; ?></td>
                                                                <td><?php echo streamline_date($patient_list->dob); ?></td>
                                                                <td><?php echo $patient_list->pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->holder_pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->location; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo streamline_date($patient_list->lmd); ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->marital_status; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->education_level; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo addMonthsToDate(9, $patient_list->lmd); ?></td>
                                                                <td><form action="index.php?page=demograhics_details" method="post">
                                                                    <input name="patient_id" value="<?php echo $patient_list->subject_ptr_id; ?>" type="hidden"/>
                                                                    <button class="btn btn-xs btn-success" type="submit">View Details</button>
                                                                </form></td>
                                                            </tr>   
                                                            <?php
                                                        }
                                                    } elseif ($get_id == 2) {
                                                        if ($age >= 20 && $age <= 24) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $patient_list->given_name . " " . $patient_list->family_name; ?></td>
                                                                <td><?php echo streamline_date($patient_list->dob); ?></td>
                                                                <td><?php echo $patient_list->pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->holder_pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->location; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo streamline_date($patient_list->lmd); ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->marital_status; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->education_level; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo addMonthsToDate(9, $patient_list->lmd); ?></td>
                                                                <td><form action="index.php?page=demograhics_details" method="post">
                                                                    <input name="patient_id" value="<?php echo $patient_list->subject_ptr_id; ?>" type="hidden"/>
                                                                    <button class="btn btn-xs btn-success" type="submit">View Details</button>
                                                                </form></td>
                                                            </tr> 
                                                            <?php
                                                        }
                                                    } elseif ($get_id == 3) {
                                                        if ($age >= 25 && $age <= 30) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $patient_list->given_name . " " . $patient_list->family_name; ?></td>
                                                                <td><?php echo streamline_date($patient_list->dob); ?></td>
                                                                <td><?php echo $patient_list->pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->holder_pnumber; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->location; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo streamline_date($patient_list->lmd); ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->marital_status; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo $patient_list->education_level; ?></td>
                                                                <td class="hidden-xs hidden-sm"><?php echo addMonthsToDate(9, $patient_list->lmd); ?></td>
                                                                <td>
                                                                    <form action="index.php?page=demograhics_details" method="post">
                                                                    <input name="patient_id" value="<?php echo $patient_list->subject_ptr_id; ?>" type="hidden"/>
                                                                    <button class="btn btn-xs btn-success" type="submit">View Details</button>
                                                                </form>
                                                                </td>
                                                            </tr> 
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $patient_list->given_name . " " . $patient_list->family_name; ?></td>
                                                            <td><?php echo streamline_date($patient_list->dob); ?></td>
                                                            <td><?php echo $patient_list->pnumber; ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo $patient_list->holder_pnumber; ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo $patient_list->location; ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo streamline_date($patient_list->lmd); ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo $patient_list->marital_status; ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo $patient_list->education_level; ?></td>
                                                            <td class="hidden-xs hidden-sm"><?php echo addMonthsToDate(9, $patient_list->lmd); ?></td>
                                                            <td><form action="index.php?page=demograhics_details" method="post">
                                                                    <input name="patient_id" value="<?php echo $patient_list->subject_ptr_id; ?>" type="hidden"/>
                                                                    <button class="btn btn-xs btn-success" type="submit">View Details</button>
                                                                </form></td>
                                                        </tr> 
                                                        <?php
                                                    }
                                                    ?>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->


                                </div> <!-- /.portlet-content -->

                            </div> <!-- /.portlet -->



                        </div> <!-- /.col -->

                    </div> <!-- /.row -->








                </div> <!-- /#content-container -->



            </div> <!-- #content -->


        </div> <!-- #wrapper -->

        <?php
        include 'includes/footer.php';
        ?>

        <script src="./js/libs/jquery-1.9.1.min.js"></script>
        <script src="./js/libs/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="./js/libs/bootstrap.min.js"></script>

        <script src="./js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="./js/plugins/datatables/DT_bootstrap.js"></script>
        <script src="./js/plugins/tableCheckable/jquery.tableCheckable.js"></script>

        <script src="./js/plugins/icheck/jquery.icheck.min.js"></script>

        <script src="./js/App.js"></script>


    </body>
</html>