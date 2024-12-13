<?php
// session_start();
ob_start();
require_once("../database/connection.php");
if (!isset($_SESSION['admin_id'])) {
  header("location: login.php");
  ob_end_flush();
}
?>



<?php include_once("admin_linker.php") ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <!-- <img src="../Images/ICTBJ Logo.jpg" class="img-fluid" width="40vw" alt=""> -->
            <span class="demo menu-text fw-bolder fs-3 m-auto">Admin Panel</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item ">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Speaker -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Speaker">Speaker</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add_speaker_details.php" class="menu-link">
                  <div data-i18n="Add Speaker">Add Speaker</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="show_all_speakers.php" class="menu-link">
                  <div data-i18n="All Speakers">All Speakers</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Committee -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Committee">Committee</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add_committee_details.php" class="menu-link">
                  <div data-i18n="Add Members">Add Member</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="committee_details.php" class="menu-link">
                  <div data-i18n="All Members">All Members</div>
                </a>
              </li>
            </ul>
          </li>


          <!-- Important Dates -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Important Dates">Important Dates</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add_important_dates.php" class="menu-link">
                  <div data-i18n="Add Dates">Add Dates</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="show_all_dates.php" class="menu-link">
                  <div data-i18n="All Dates">All Dates</div>
                </a>
              </li>
            </ul>
          </li>


          <!-- Call For Paper -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Call For Paper">Call For Paper</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add_call_for_paper.php" class="menu-link">
                  <div data-i18n="Add Call For Paper">Add Call For Paper</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="show_all_call_for_papers.php" class="menu-link">
                  <div data-i18n="All Call For Papers">All Call For Papers</div>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- View Authors -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Authors">Manage Authors</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_authors.php" class="menu-link">
                  <div data-i18n="View Authors">View Authors</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Extended Abstract -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Extended Abstract">Extended Abstract</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="show_all_papers.php" class="menu-link">
                  <div data-i18n="Extended Abstract Details">Extended Abstract Details</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Reviewer -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Reviewer">Reviewer</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add_reviewers.php" class="menu-link">
                  <div data-i18n="Add Reviewer">Add Reviewer</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="show_all_reviewers.php" class="menu-link">
                  <div data-i18n="All Reviewers">All Reviewers</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="manage_pending_reviewers.php" class="menu-link">
                  <div data-i18n="All Pending Reviewers">All Pending Reviewers</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Review  -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Reviewer">Review</div>
            </a>

            <ul class="menu-sub">
            <li class="menu-item">
                <a href="show_all_reviews.php" class="menu-link">
                  <div data-i18n="Select Paper for Reviews">Select Paper for Reviews</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="show_reviewer.php" class="menu-link">
                  <div data-i18n="Select Reviewer for Reviews">Select Reviewer for Reviews</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Paper assignment -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Paper Assignment">Paper Assignment</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="show_all_papers_for_reviewer.php" class="menu-link">
                  <div data-i18n="Select Paper for Multiple Reviewers">Select Paper for Multiple Reviewers</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="select_reviewer_for_multiple_papers.php" class="menu-link">
                  <div data-i18n="Select Reviewer for Multiple Papers">Select Reviewer for Multiple Papers</div>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <!-- <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div> -->
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li> -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../Images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../Images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?php echo $_SESSION['admin_name'] ?></span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- <li>
                    <div class="dropdown-divider"></div>
                  </li> -->
                  <!-- <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li> -->
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin_logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->