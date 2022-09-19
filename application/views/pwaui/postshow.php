<!-- <iframe allowfullscreen='true' id='ifpost' class='ThemeStyle-border w-100 mt-3' src="<?= $url ?>" frameborder='0'>

</iframe> -->
<div style="height: 50px;"></div>
<?= file_get_contents($url) ?>

<script>
    const title = document.getElementsByClassName("page-title");
    document.getElementById('application_title').innerHTML = title[0].innerHTML;
    title[0].remove();

    document.getElementById('page-site-header').className += " ThemeStyle-border";
    document.getElementById('masthead').remove();
    document.getElementById('secondary').remove();
    document.getElementById('colophon').remove();

    const previous = document.getElementsByClassName("nav-previous")[0].getElementsByTagName('a')[0];
    previous.setAttribute("href","<?= base_url('index.php/App/openpost?url=') ?>" + previous.getAttribute("href"));
    const next = document.getElementsByClassName("nav-next")[0].getElementsByTagName('a')[0];
    next.setAttribute("href","<?= base_url('index.php/App/openpost?url=') ?>" + next.getAttribute("href"));
</script>