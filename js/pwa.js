window.onload = removeloding();

function removeloding() {
    document.getElementById("loaderbg").style.display = "none";
}
function showloding() {
    document.getElementById("loaderbg").style.display = "inherit";
}

function openpost(baceurl, url) {
    showloding();
    document.getElementById("pwacontect").innerHTML = "<iframe onload='removeloding()' allowfullscreen='true' id='ifpost' class='ThemeStyle-border w-100 mt-3' src='" + baceurl + "index.php/app/getposthtml" + "?url=" + url + "' frameborder='0'></iframe>";
    document.getElementById("ifpost").style.height = window.innerHeight + "px";
    
}

