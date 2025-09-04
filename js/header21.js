class Header extends HTMLElement {
  constructor() {
    super();
  }
  connectedCallback() {
    this.innerHTML = `
            <header class="top-header">
                <nav class="navbar header-nav navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="adminHome.php"><img src="images/logo.png" alt="image"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                            <ul class="navbar-nav">
                                <li><a class="nav-link active" href="adminHome.php">Home</a></li>
                                <li><a class="nav-link" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                <center>
                    <div class="row">
                        <div class="column">
                            <select id="Schedules">
                              <option value="" selected="">Schedules</option>
                              <option value="adminMasterSchedule.php">Master Schedule</option>
                            </select>     
                            <button onclick="siteRedirect()">GO</button>
                        </div>    
                        <div class="column">    
                            <select id="Majors">
                              <option value="" selected="">Majors</option>
                              <option value="adminMajorList.php">View All Majors</option>
                            </select>
                            <button onclick="siteRedirect3()">GO</button>
                        </div>
                        <div class="column">    
                            <select id="Minors">
                              <option value="" selected="">Minors</option>
                              <option value="adminMinorList.php">View All Minors</option>
                            </select>
                            <button onclick="siteRedirect4()">GO</button>
                        </div>
                        <div class="column">    
                            <select id="CourseManagement">
                              <option value="" selected="">Course Management</option>
                              <option value="adminCourseList.php">View All Courses</option>
                              <option value="adminCreateCourse.php">Add a New Course</option>
                              <option value="adminCreateSection.php">Add a New Section</option>
                            </select>
                            <button onclick="siteRedirect6()">GO</button>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="column"> 
                            <select id="Departments">
                              <option value="" selected="">Departments</option>
                              <option value="adminDepartmentList.php">View All Departments</option>
                              <option value="adminFacultyDepartmentList.php">Faculty-Departments</option>
                            </select>
                            <button onclick="siteRedirect2()">GO</button>
                        </div>
                        <div class="column"> 
                            <select id="Holds">
                              <option value="" selected="">Holds</option>
                              <option value="adminHoldList.php">View All Holds</option>
                              <option value="adminStudentHolds.php">View all Students with Holds</option>
                            </select>
                            <button onclick="siteRedirect5()">GO</button>
                        </div>
                        <div class="column"> 
                            <select id="UserManagement">
                              <option value="" selected="">User Management</option>
                              <option value="adminUserList.php">View All Users</option>
                              <option value="adminCreateUser.php">Create a User</option>
                              <option value="adminResearcherList.php">View All Researchers</option>
                              <option value="adminStudentList.php">View All Students</option>
                              <option value="adminFacultyList.php">View All Faculty</option>
                              <option value="adminMyUserInfo.php">View My Information</option>
                            </select>
                            <button onclick="siteRedirect7()">GO</button>
                        </div>
                    </div>    
                </center>
            </header>
    `;
  }
  
}

customElements.define('header-component', Header);

function siteRedirect() {
                var selectbox = document.getElementById("Schedules");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
};

function siteRedirect3() {
                var selectbox = document.getElementById("Majors");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
};


function siteRedirect2() {
                var selectbox = document.getElementById("Departments");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
};

function siteRedirect4() {
                var selectbox = document.getElementById("Minors");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
}

function siteRedirect5() {
                var selectbox = document.getElementById("Holds");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
}

function siteRedirect6() {
                var selectbox = document.getElementById("CourseManagement");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
}

function siteRedirect7() {
                var selectbox = document.getElementById("UserManagement");
                var selectedValue = selectbox.options[selectbox.selectedIndex].value;
                window.location.href = selectedValue;
}