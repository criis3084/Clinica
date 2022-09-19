<!DOCTYPE html>
<html lang="en" <?php if ($this->db->get('settings')->row()->language == 'arabic' || $this->db->get('settings')->row()->language == 'persian') { ?> dir="rtl" <?php } ?>>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">
        <?php
        $class_name = $this->router->fetch_class();
        $class_name_lang = lang($class_name);
        if (empty($class_name_lang)) {
            $class_name_lang = $class_name;
        }
        ?>

        <title><?php echo $class_name_lang; ?> | <?php echo $this->db->get('settings')->row()->system_vendor; ?> </title>
        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/fontawesome5pro/css/all.min.css" rel="stylesheet" />
        <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
        <!-- <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
        <!-- Custom styles for this template -->
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/bootstrap-datepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
        <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
        <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
        <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css"/>
        <link rel="stylesheet" type="text/css" href="common/css/lightbox.css"/>
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

        <link rel="stylesheet" type="text/css" href="common/assets/DataTables/DataTables-1.10.16/custom/css/datatable-responsive-cdn-version-1-0-7.css" />


        <!-- Google Fonts -->

        <style>
            @import url('https://fonts.googleapis.com/css?family=Ubuntu&display=swap');
        </style>





        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->


        <?php if ($this->db->get('settings')->row()->language == 'arabic' || $this->db->get('settings')->row()->language == 'persian') { ?>
            <style>

                #main-content {
                    margin-right: 211px;
                    margin-left: 0px; 
                }

                body {
                    background: #f1f1f1;

                }

            </style>

        <?php } ?>

    </head>

    <body>
        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-dedent fa-bars fa-angle-double-left tooltips"></div>
                </div>
                <!--logo start-->
                <?php
                $settings_title = $this->db->get('settings')->row()->title;
                $settings_title = explode(' ', $settings_title);
                ?>

                <a href="home" class="logo">
                    <strong>
                        <?php echo $settings_title[0]; ?>

                        <span>
                            <?php
                            if (!empty($settings_title[1])) {
                                echo $settings_title[1];
                            }
                            ?>
                        </span>


                        <?php
                        if (!empty($settings_title[2])) {
                            echo $settings_title[2];
                        }
                        ?>

                    </strong>
                </a>

                <!--logo end-->
                         <div class="top-nav ">

                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="uploads/favicon.png" width="21" height="23">
                                <span class="username">
                                    <?php
                                    $username = $this->ion_auth->user()->row()->username;
                                    if (!empty($username)) {
                                        $username = explode(' ', $username);
                                        $first_name = $username[0];
                                        echo $first_name;
                                    }
                                    ?> 
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href=""><i class="fa fa-home"></i> <?php echo lang('dashboard'); ?></a></li>
                                <?php } ?>
                                <li><a href="profile"><i class=" fa fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href="settings"><i class="fa fa-cog"></i> <?php echo lang('settings'); ?></a></li>
                                <?php } ?>

                                <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                                <li><a href="auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <code class="flashmessage pull-right"> <?php echo $message; ?></code>
                    <?php } ?> 
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="home"> 
                                <i class="fa fa-home"></i>
                                <span><?php echo lang('dashboard'); ?></span>
                            </a>
                        </li>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-user-md"></i>
                                    <span><?php echo lang('doctor'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="doctor"><i class="fa fa-user"></i><?php echo lang('list_of_doctors'); ?></a></li>
                                    <li><a href="appointment/treatmentReport"><i class="fa fa-history"></i><?php echo lang('treatment_history'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>

                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-users-medical"></i> 
                                    <span><?php echo lang('patient'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="patient"><i class="fa fa-user"></i><?php echo lang('patient_list'); ?></a></li>

                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                                        <li><a href="patient/patientPayments"><i class="fa fa-money-check"></i><?php echo lang('payments'); ?></a></li>
                                    <?php } ?>
                                    <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                        <li><a href="patient/caseList"><i class="fa fa-book"></i><?php echo lang('case'); ?> <?php echo lang('manager'); ?></a></li>
                                        <li><a href="patient/documents"><i class="fa fa-file"></i><?php echo lang('documents'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-clock"></i> 
                                    <span><?php echo lang('schedule'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="schedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                    <li><a href="schedule/allHolidays"><i class="fa fa-list-alt"></i><?php echo lang('holidays'); ?></a></li> 
                                </ul>
                            </li>
                        <?php } ?>

                        <?php
                        if ($this->ion_auth->in_group(array('Doctor'))) {
                            ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-clock"></i> 
                                    <span><?php echo lang('schedule'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="schedule/timeSchedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                    <li><a href="schedule/holidays"><i class="fa fa-list-alt"></i><?php echo lang('holidays'); ?></a></li> 
                                </ul>
                            </li>
                        <?php } ?>

                        

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-calendar-check"></i> 
                                    <span><?php echo lang('appointment'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="appointment"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?></a></li>
                                    <li><a href="appointment/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('add'); ?></a></li>
                                    <li><a href="appointment/todays"><i class="fa fa-list-alt"></i><?php echo lang('todays'); ?></a></li>
                                    <li><a href="appointment/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?></a></li>
                                    <li><a href="appointment/calendar"><i class="fa fa-list-alt"></i><?php echo lang('calendar'); ?></a></li>
                                    <li><a href="appointment/request"><i class="fa fa-list-alt"></i><?php echo lang('request'); ?></a></li>                                   
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array(''))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-headphones"></i> 
                                    <span><?php echo lang('live'); ?> <?php echo lang('meetings'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <li><a href="meeting/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('create'); ?> <?php echo lang('meeting'); ?></a></li>
                                    <?php } ?>
                                    <li><a href="meeting"><i class="fa fa-video"></i><?php echo lang('live'); ?> <?php echo lang('now'); ?></a></li>
                                    <li><a href="meeting/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?> <?php echo lang('meetings'); ?></a></li>
                                    <li><a href="meeting/previous"><i class="fa fa-list-alt"></i><?php echo lang('previous'); ?> <?php echo lang('meetings'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?> 



                        <?php if ($this->ion_auth->in_group(array(''))) { ?>
                            <li><a href="meeting"><i class="fa fa-headphones"></i><?php echo lang('join_live'); ?></a></li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                            <li><a href="appointment/myTodays"><i class="fa fa-headphones"></i><?php echo lang('todays'); ?> <?php echo lang('appointment'); ?></a></li>
                        <?php } ?>







                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-users"></i>
                                    <span><?php echo lang('human_resources'); ?></span>
                                </a>
                                <ul class="sub">
                                   
                                    <li><a href="pharmacist"><i class="fa fa-user"></i><?php echo lang('pharmacist'); ?></a></li>
                                    <li><a href="laboratorist"><i class="fa fa-user"></i><?php echo lang('laboratorist'); ?></a></li>
                                    <li><a href="receptionist"><i class="fa fa-user"></i><?php echo lang('receptionist'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>




                     

                        <?php if ($this->ion_auth->in_group('Receptionist')) { ?>
                            <li>
                                <a href="appointment/calendar" >
                                    <i class="fa fa-calendar"></i>
                                    <span> <?php echo lang('calendar'); ?> </span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-money-check"></i>
                                    <span><?php echo lang('financial_activities'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="finance/payment"><i class="fa fa-money-check"></i> <?php echo lang('payments'); ?></a></li>
                                    <li><a  href="finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                </ul>
                            </li> 
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <li>
                                <a href="prescription/all" >
                                    <i class="fas fa-prescription"></i>
                                    <span> <?php echo lang('prescription'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>

                        
                        <?php
                        if ($this->ion_auth->in_group(array('Receptionist'))) {
                            ?>
                            <li>
                                <a href="lab/lab1">
                                    <i class="fas fa-file-medical"></i>
                                    <span><?php echo lang('lab_reports'); ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                        <?php
                        if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                            ?>
                            <li>
                                <a href="finance/UserActivityReport">
                                    <i class="fa fa-file-user"></i>
                                    <span><?php echo lang('user_activity_report'); ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>








                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <li>
                                <a href="prescription">
                                    <i class="fa fa-prescription"></i>
                                    <span><?php echo lang('prescription'); ?></span>
                                </a>
                            </li>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa  fa-flask"></i>
                                    <span><?php echo lang('labs'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="lab"><i class="fa fa-file-medical"></i><?php echo lang('lab_reports'); ?></a></li>
                                    <li><a  href="lab/addLabView"><i class="fa fa-plus-circle"></i><?php echo lang('add_lab_report'); ?></a></li>
                                    <li><a  href="lab/template"><i class="fa fa-plus-circle"></i><?php echo lang('template'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa  fa-medkit"></i>
                                    <span><?php echo lang('medicine'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="medicine"><i class="fa fa-medkit"></i><?php echo lang('medicine_list'); ?></a></li>
                                  
                                    <li><a  href="medicine/medicineCategory"><i class="fa fa-edit"></i><?php echo lang('medicine_category'); ?></a></li>
                                   
                                    <li><a  href="medicine/medicineStockAlert"><i class="fa fa-plus-circle"></i><?php echo lang('medicine_stock_alert'); ?></a></li>
                                <!--     <li><a  href="medicine/medicineExpireAlert"><i class="fa fa-plus-circle"></i><?php echo lang('alert_expire_list'); ?></a></li>-->

                                </ul>
                            </li>
                        <?php } ?>








                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fas fa-capsules"></i>
                                    <span><?php echo lang('pharmacy'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                                        <li><a  href="finance/pharmacy/home"><i class="fa fa-home"></i> <?php echo lang('dashboard'); ?></a></li>
                                    <?php } ?>
                                    <li><a  href="finance/pharmacy/payment"><i class="fa fa-money-check"></i> <?php echo lang('sales'); ?></a></li>
                                    <li><a  href="finance/pharmacy/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_new_sale'); ?></a></li>
                                    <li><a  href="finance/pharmacy/expense"><i class="fa fa-money-check"></i><?php echo lang('expense'); ?></a></li>
                                    <li><a  href="finance/pharmacy/addExpenseView"><i class="fa fa-plus-circle"></i><?php echo lang('add_expense'); ?></a></li>
                                    <li><a  href="finance/pharmacy/expenseCategory"><i class="fa fa-edit"></i><?php echo lang('expense_categories'); ?> </a></li>


                                    <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                                        <li class="sub-menu">
                                            <a href="javascript:;" >
                                                <i class="fas fa-file-medical-alt"></i>
                                                <span><?php echo lang(''); ?> <?php echo lang('report'); ?></span>
                                            </a>
                                            <ul class="sub">
                                                <li><a  href="finance/pharmacy/financialReport"><i class="fa fa-book"></i><?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?> </a></li>
                                                <li><a  href="finance/pharmacy/monthly"><i class="fa fa-chart-bar"></i> <?php echo lang('monthly_sales'); ?> </a></li>
                                                <li><a  href="finance/pharmacy/daily"><i class="fa fa-chart-bar"></i> <?php echo lang('daily_sales'); ?> </a></li>
                                                <li><a  href="finance/pharmacy/monthlyExpense"><i class="fa fa-chart-area"></i> <?php echo lang('monthly_expense'); ?> </a></li>
                                                <li><a  href="finance/pharmacy/dailyExpense"><i class="fa fa-chart-area"></i> <?php echo lang('daily_expense'); ?> </a></li>                              
                                            </ul>
                                        </li> 
                                    <?php } ?>



                                </ul>
                            </li> 
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Laboratorist', 'Doctor'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fas fa-file-medical-alt"></i>
                                    <span><?php echo lang('report'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a  href="finance/financialReport"><i class="fa fa-book"></i><?php echo lang('financial_report'); ?></a></li>
                                        <li> <a href="finance/AllUserActivityReport">  <i class="fa fa-home"></i>   <span><?php echo lang('user_activity_report'); ?></span> </a></li>
                                    <?php } ?>

                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a  href="finance/doctorsCommission"><i class="fa fa-edit"></i><?php echo lang('doctors_commission'); ?> </a></li>
                                        <li><a  href="finance/monthly"><i class="fa fa-chart-bar"></i> <?php echo lang('monthly_sales'); ?> </a></li>
                                        <li><a  href="finance/daily"><i class="fa fa-chart-bar"></i> <?php echo lang('daily_sales'); ?> </a></li>
                                        <li><a  href="finance/monthlyExpense"><i class="fa fa-chart-area"></i> <?php echo lang('monthly_expense'); ?> </a></li>
                                        <li><a  href="finance/dailyExpense"><i class="fa fa-chart-area"></i> <?php echo lang('daily_expense'); ?> </a></li>                              



                                    <?php } ?>

                                    <li><a  href="report/birth"><i class="fas fa-file-medical"></i><?php echo lang('birth_report'); ?></a></li>
                                    <li><a  href="report/operation"><i class="fa fa-wheelchair"></i><?php echo lang('operation_report'); ?></a></li>
                                    <li><a  href="report/expire"><i class="fas fa-file-medical"></i><?php echo lang('expire_report'); ?></a></li>

                                </ul>
                            </li>
                        <?php } ?>




                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                           
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>

                            

                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-cogs"></i>
                                    <span><?php echo lang('settings'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="settings"><i class="fa fa-cog"></i><?php echo lang('system_settings'); ?></a></li>

                                    <li><a href="pgateway"><i class="fa fa-credit-card"></i><?php echo lang('payment_gateway'); ?></a></li>
                                    <li><a href="settings/language"><i class="fa fa-language"></i><?php echo lang('language'); ?></a></li>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>

                                        <li><a href="import"><i class="fa fa-arrow-right"></i><?php echo lang('bulk'); ?> <?php echo lang('import'); ?></a></li>
                                    <?php } ?>
                                    <li><a href="settings/backups"><i class="fa fa-database"></i><?php echo lang('backup_database'); ?></a></li>
                                </ul>
                            </li>





                        <?php } ?>

                        <!--
                        <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                                                                <li><a href="meeting/settings"><i class="fa fa-headphones"></i><?php echo lang('zoom'); ?> <?php echo lang('settings'); ?></a></li>
                        <?php } ?>
                        -->







                        <?php if ($this->ion_auth->in_group('Accountant')) { ?>

                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-money-bill-alt"></i>
                                    <span><?php echo lang('payments'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li>
                                        <a href="finance/payment" >
                                            <i class="fa fa-money-check"></i>
                                            <span> <?php echo lang('payments'); ?> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="finance/addPaymentView" >
                                            <i class="fa fa-plus-circle"></i>
                                            <span> <?php echo lang('add_payment'); ?> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="finance/paymentCategory" >
                                            <i class="fa fa-edit"></i>
                                            <span> <?php echo lang('payment_procedures'); ?> </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="finance/expense" >
                                    <i class="fa fa-money-check"></i>
                                    <span> <?php echo lang('expense'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/addExpenseView" >
                                    <i class="fa fa-plus-circle"></i>
                                    <span> <?php echo lang('add_expense'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/expenseCategory" >
                                    <i class="fa fa-edit"></i>
                                    <span> <?php echo lang('expense_categories'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/doctorsCommission" >
                                    <i class="fa fa-edit"></i>
                                    <span> <?php echo lang('doctors_commission'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/financialReport" >
                                    <i class="fa fa-book"></i>
                                    <span> <?php echo lang('financial_report'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                            <li>
                                <a href="medicine" >
                                    <i class="fa fa-medkit"></i>
                                    <span> <?php echo lang('medicine_list'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/addMedicineView" >
                                    <i class="fa fa-plus-circle"></i>
                                    <span> <?php echo lang('add_medicine'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/medicineCategory" >
                                    <i class="fa fa-medkit"></i>
                                    <span> <?php echo lang('medicine_category'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/addCategoryView" >
                                    <i class="fa fa-plus-circle"></i>
                                    <span> <?php echo lang('add_medicine_category'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Nurse')) { ?>

                            <li>
                                <a href="donor/bloodBank" >
                                    <i class="fa fa-tint"></i>
                                    <span> <?php echo lang('blood_bank'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Patient')) { ?>

                            <li>
                                <a href="lab/myLab" >
                                    <i class="fa fa-file-medical-alt"></i>
                                    <span> <?php echo lang('diagnosis'); ?> <?php echo lang('reports'); ?> </span>
                                </a>
                            </li>

                            <li>
                                <a href="patient/calendar" >
                                    <i class="fa fa-calendar"></i>
                                    <span> <?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?> </span>
                                </a>
                            </li>

                            <li>
                                <a href="patient/myCaseList" >
                                    <i class="fa fa-file-medical"></i>
                                    <span>  <?php echo lang('cases'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="patient/myPrescription" >
                                    <i class="fa fa-medkit"></i>
                                    <span> <?php echo lang('prescription'); ?>  </span>
                                </a>
                            </li>

                            <li>
                                <a href="patient/myDocuments" >
                                    <i class="fa fa-file-upload"></i>
                                    <span> <?php echo lang('documents'); ?> </span>
                                </a>
                            </li>

                            <li>
                                <a href="patient/myPaymentHistory" >
                                    <i class="fa fa-money-bill-alt"></i>
                                    <span> <?php echo lang('payment'); ?> </span>      
                                </a>
                            </li>

                            <li>
                                <a href="report/myreports" >
                                    <i class="fa fa-file-medical-alt"></i>
                                    <span> <?php echo lang('other'); ?> <?php echo lang('reports'); ?> </span>
                                </a>
                            </li>



                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('im')) { ?>
                            <li>
                                <a href="patient/addNewView" >
                                    <i class="fa fa-user"></i>
                                    <span> <?php echo lang('add_patient'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/addPaymentView" >
                                    <i class="fa fa-user"></i>
                                    <span> <?php echo lang('add_payment'); ?>  </span>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if (!$this->ion_auth->in_group(array('admin', 'Patient'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-mail-bulk"></i>
                                    <span><?php echo lang('email'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="email/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('new'); ?></a></li>
                                </ul>
                            </li> 
                        <?php } ?> 



                        <li>
                            <a href="profile" >
                                <i class="fa fa-user"></i>
                                <span> <?php echo lang('profile'); ?> </span>
                            </a>
                        </li>

                        <!--multi level menu start-->

                        <!--multi level menu end-->

                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->




