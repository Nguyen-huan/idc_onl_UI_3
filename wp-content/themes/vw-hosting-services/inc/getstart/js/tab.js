function vw_hosting_services_open_tab(evt, cityName) {
    var vw_hosting_services_i, vw_hosting_services_tabcontent, vw_hosting_services_tablinks;
    vw_hosting_services_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_hosting_services_i = 0; vw_hosting_services_i < vw_hosting_services_tabcontent.length; vw_hosting_services_i++) {
        vw_hosting_services_tabcontent[vw_hosting_services_i].style.display = "none";
    }
    vw_hosting_services_tablinks = document.getElementsByClassName("tablinks");
    for (vw_hosting_services_i = 0; vw_hosting_services_i < vw_hosting_services_tablinks.length; vw_hosting_services_i++) {
        vw_hosting_services_tablinks[vw_hosting_services_i].className = vw_hosting_services_tablinks[vw_hosting_services_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});