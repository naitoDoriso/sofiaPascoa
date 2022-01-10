(function() {
    var start = document.getElementById("start");
    start.onclick = function() {
        document.body.style.backgroundColor = 'black';
        setTimeout(() => {
            location.replace('enigma/index.php')
        }, 1500);
    }
})()