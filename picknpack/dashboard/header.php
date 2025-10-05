<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['user_id'])){
    echo "<script>window.location.href='../';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .circle-bg{
                height:80px; width:80px; 
                                        
                                         border-radius:50%; display:flex; 
                                         justify-content:center;
                                         align-items:center
            }
            .icon-hight{
                height:40px; width:40px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
               <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"
             href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">PickNPack Sample</a>
            <!-- Sidebar Toggle-->
         
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-" 
                id="sidenavAccordion" style="background-color:#000435">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link " href="index.php">
                                
                                <div class="btn btn-primary w-100">
                                    <b class="sb-nav-link-icon"><i class="fas fa-table"></i></b>
                                    Dashboard
                                </div>
                            </a>

                             <a class="nav-link text-light" href="#">
                                <div class="sb-nav-link-icon text-light"><i class="fas fa-cube"></i></div>
                                Inventory
                            </a>


                             <a class="nav-link text-light" href="#">
                                <div class="sb-nav-link-icon text-light"><i class="fas fa-bar-chart"></i></div>
                                Analytics
                            </a>

                             <a class="nav-link text-light" href="#">
                                <div class="sb-nav-link-icon text-light"><i class="fas fa-user"></i></div>
                                Profile
                            </a>

                              <a class="nav-link text-light" href="#">
                                <div class="sb-nav-link-icon text-light"><i class="fas fa-gear"></i></div>
                                Settings
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        
                        @2025 Pick N Pack Sample
                    </div>
                </nav>
            </div>