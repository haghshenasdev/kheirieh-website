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
    if (element.className !== "ari-fancybox") {
        element.addEventListener('click', event => {
            ChangeTitle("<div id='loader' style='width: 20px; height: 20px;margin: 5px;position: static;float: right;'></div>");
        });
    }
});
// window.onfocus = ResetTitle();

var curentTitle = "";

function ChangeTitle(title) {
    document.getElementById('application_title').innerHTML;
    document.getElementById('application_title').innerHTML = title;
}

function ResetTitle() {
    let text = "خیریه امام علی ابن ابیطالب (ع) گرگاب";
    if (curentTitle !== "undefined") text = curentTitle;
    document.getElementById('application_title').innerHTML = text;
}