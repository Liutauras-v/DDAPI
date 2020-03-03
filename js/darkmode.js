function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function goDark() {
    document.body.style.transition = '0.3s';
    document.documentElement.style.setProperty('--light', '#333');
    document.documentElement.style.setProperty('--dark', '#fff');
    await sleep(300);
    document.body.style.transition = 'none';
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./api/setTheme.php?theme=dark", true);
    xhttp.send();
}

async function goLight() {
    document.body.style.transition = '0.3s';
    document.documentElement.style.setProperty('--light', '#fff');
    document.documentElement.style.setProperty('--dark', '#333');
    await sleep(300);
    document.body.style.transition = 'none';
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./api/setTheme.php?theme=light", true);
    xhttp.send();
}

function goDarkFast(){
    document.documentElement.style.setProperty('--light', '#333');
    document.documentElement.style.setProperty('--dark', '#fff');
    document.querySelector('#darkmode').checked = true;
}

document.querySelector('#darkmode').addEventListener('click', e => {
    e.target.checked ? goDark() : goLight();
});


function setTheme() {
    let theme = document.querySelector('#theme').value;
    theme == 'dark' ? goDarkFast() : false;
}

setTheme();