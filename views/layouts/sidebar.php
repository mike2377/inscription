<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:200px;display:none" id="sidebar">
    <button onclick="closeSidebar()" class="w3-bar-item w3-button w3-right w3-large">
        &times;
    </button>
    
    <div class="w3-container w3-padding-16">
        <h4>Menu</h4>
    </div>
    
    <?php if (is_logged_in()): ?>
        <a href="index.php?action=student/dashboard" class="w3-bar-item w3-button">
            <i class="fas fa-tachometer-alt"></i> Tableau de bord
        </a>
        <a href="index.php?action=student/profile" class="w3-bar-item w3-button">
            <i class="fas fa-user"></i> Mon profil
        </a>
        
        <?php if (is_admin()): ?>
            <div class="w3-container w3-padding-16">
                <h4>Administration</h4>
            </div>
            <a href="index.php?action=admin/dashboard" class="w3-bar-item w3-button">
                <i class="fas fa-cog"></i> Tableau de bord
            </a>
            <a href="index.php?action=admin/students" class="w3-bar-item w3-button">
                <i class="fas fa-users"></i> Gestion étudiants
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>

<script>
function openSidebar() {
    document.getElementById("sidebar").style.display = "block";
}
function closeSidebar() {
    document.getElementById("sidebar").style.display = "none";
}
</script>