class Header extends HTMLElement {
  constructor() {
    super();
  }
  connectedCallback() {
    this.innerHTML = `
            <header class="top-header">
                <nav class="navbar header-nav navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                            <ul class="navbar-nav">
                                <li><a class="nav-link" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
    `;
  }
  
}

customElements.define('student-header', Header);