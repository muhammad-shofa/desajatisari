<?php

include "../service/config.php";
session_start();

// check login
if ($_SESSION["is_login"] == false) {
    header("location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/main.min.css" />
    <link rel="stylesheet" href="../assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
    <link rel="stylesheet" href="../assets/vendor/toastify/toastify.css" />
    <link rel="stylesheet" href="../assets/vendor/icon/bootstrap-icons.css" />
    <title>Desa Jatisari</title>
</head>

<body>
    <!-- container start -->
    <div class="main-container">
        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

            <!-- App brand starts -->
            <div class="app-brand px-3 py-2 d-flex align-items-center">
                <a href="pengaduan.php">
                    <img src="assets/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
                </a>
            </div>
            <!-- App brand ends -->

            <!-- Sidebar menu starts -->
            <div class="sidebarMenuScroll">
                <ul class="sidebar-menu">
                    <li class="active current-page">
                        <a href="index.html">
                            <i class="bi bi-pie-chart"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="sales.html">
                            <i class="bi bi-bar-chart-line"></i>
                            <span class="menu-text">Sales</span>
                            <span class="badge border border-danger text-danger rounded-5 ms-2">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="subscribers.html">
                            <i class="bi bi-check-circle"></i>
                            <span class="menu-text">Subscribers</span>
                        </a>
                    </li>
                    <li>
                        <a href="contacts.html">
                            <i class="bi bi-telephone"></i>
                            <span class="menu-text">Contacts</span>
                        </a>
                    </li>
                    <li>
                        <a href="faq.html">
                            <i class="bi bi-box"></i>
                            <span class="menu-text">FAQ's</span>
                            <span class="badge border border-success text-success rounded-5 ms-2">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="bi bi-calendar2"></i>
                            <span class="menu-text">Calendar</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-stickies"></i>
                            <span class="menu-text">Components</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="accordions.html">Accordions</a>
                            </li>
                            <li>
                                <a href="alerts.html">Alerts</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="badges.html">Badges</a>
                            </li>
                            <li>
                                <a href="carousel.html">Carousel</a>
                            </li>
                            <li>
                                <a href="list-items.html">List Items</a>
                            </li>
                            <li>
                                <a href="progress.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="popovers.html">Popovers</a>
                            </li>
                            <li>
                                <a href="tooltips.html">Tooltips</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-ui-checks-grid"></i>
                            <span class="menu-text">Forms</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="form-inputs.html">Basic Form Inputs</a>
                            </li>
                            <li>
                                <a href="form-checkbox-radio.html">Checkbox &amp; Radio</a>
                            </li>
                            <li>
                                <a href="form-file-input.html">File Input</a>
                            </li>
                            <li>
                                <a href="form-validations.html">Validations</a>
                            </li>
                            <li>
                                <a href="date-time-pickers.html">Date Time Pickers</a>
                            </li>
                            <li>
                                <a href="form-layouts.html">Form Layouts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tables.html">
                            <i class="bi bi-border-all"></i>
                            <span class="menu-text">Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html">
                            <i class="bi bi-gear"></i>
                            <span class="menu-text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.html">
                            <i class="bi bi-postcard"></i>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="starter-page.html">
                            <i class="bi bi-layout-text-window-reverse"></i>
                            <span class="menu-text">Starter Page</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-code-square"></i>
                            <span class="menu-text">Cards</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="advanced-cards.html">Advanced Cards</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-pie-chart"></i>
                            <span class="menu-text">Graphs</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="apex.html">Apex</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="maps.html">
                            <i class="bi bi-pin-map"></i>
                            <span class="menu-text">Maps</span>
                        </a>
                    </li>
                    <li>
                        <a href="tabs.html">
                            <i class="bi bi-slash-square"></i>
                            <span class="menu-text">Tabs</span>
                        </a>
                    </li>
                    <li>
                        <a href="modals.html">
                            <i class="bi bi-terminal"></i>
                            <span class="menu-text">Modals</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html">
                            <i class="bi bi-textarea"></i>
                            <span class="menu-text">Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="typography.html">
                            <i class="bi bi-explicit"></i>
                            <span class="menu-text">Typography</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-upc-scan"></i>
                            <span class="menu-text">Login/Signup</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="signup.html">Signup</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="page-not-found.html">
                            <i class="bi bi-exclamation-diamond"></i>
                            <span class="menu-text">Page Not Found</span>
                        </a>
                    </li>
                    <li>
                        <a href="maintenance.html">
                            <i class="bi bi-exclamation-octagon"></i>
                            <span class="menu-text">Maintenance</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#!">
                            <i class="bi bi-code-square"></i>
                            <span class="menu-text">Multi Level</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="#!">Level One Link</a>
                            </li>
                            <li>
                                <a href="#!">
                                    Level One Menu
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="#!">Level Two Link</a>
                                    </li>
                                    <li>
                                        <a href="#!">Level Two Menu
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li>
                                                <a href="#!">Level Three Link</a>
                                            </li>
                                            <li>
                                                <a href="#!">Level Three Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#!">Level One Link</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Sidebar menu end -->

        </nav>
        <!-- Sidebar wrapper end -->
    </div>
    <!-- container end -->


    <!-- js -->
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>