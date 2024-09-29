<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-toggle d-none d-md-flex" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">

                    <li class="nav-parent<?php
                    if ($page == 'ecommerce') {
                        echo ' nav-expanded nav-active';
                    }
                    ?>">
                        <a class="nav-link" href="#">
                            <i class="bx bx-file" aria-hidden="true"></i>
                            <span>Invoice System</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="nav-active">
                                <a class="nav-link" href="dashboard">
                                    - Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="add_customer">
                                    - Add New Customer
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="customer_list">
                                    - Customer List
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="invoice_list">
                                    - Invoice List
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-parent <?php
                    if ($page == 'setting') {
                        echo ' nav-expanded nav-active';
                    }
                    ?>">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-gear"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="company_list">
                                    Add/Manage Company Details
                                </a>
                            </li>
                             <li>
                                 <a class="nav-link" href="logo_list">
                                    Add/Manage Logo
                                </a>
                            </li>
                             <li>
                                 <a class="nav-link" href="signature_list">
                                    Add/Manage Signature
                                </a>
                            </li>
                             <li>
                                 <a class="nav-link" href="bank_list">
                                    Add/Manage Bank Details
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>

            <hr class="separator" />

            <div class="sidebar-widget widget-tasks">
                <div class="widget-header">
                    <h6>Develop By</h6>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-0">
                        <li><a href="https://octaveinfosys.com" target="_blank">Octave infosys</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>