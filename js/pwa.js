window.onload = removeloding();

function removeloding() {
    document.getElementById("loaderbg").style.display = "none";
}
function showloding() {
    document.getElementById("loaderbg").style.display = "inherit";
}

//show loding from click all links
const links = Array.from(document.getElementsByTagName('a'));
links.forEach(element => {
    if (element.className != "ari-fancybox") {
        element.addEventListener('click', event => {
            showloding();
        });
    }
});
window.onfocus = removeloding();

// in  apllication load page

// function ShowIframe(ControllerURL, baceurl, url) {
//     document.getElementById("pwacontect").innerHTML = "<iframe onload='removeloding()' allowfullscreen='true' id='ifpost' class='ThemeStyle-border w-100 mt-3' src='" + baceurl + ControllerURL + "?url=" + url + "' frameborder='0'></iframe>";
//     document.getElementById("ifpost").style.height = window.innerHeight + "px";
// }

// function openpost(baceurl, url) {
//     showloding();
//     ShowIframe("index.php/app/getposthtml",baceurl, url);
// }

// function openDonatePage(baceurl, url) {
//     showloding();
//     document.getElementById("pwacontect").innerHTML = "<h1>helo</h1>";
//     //ShowIframe("index.php/app/openDonatePage",baceurl, baceurl+url);
// }

