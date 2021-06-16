window.console = window.console || function(t) {};
if (document.location.search.match(/type=embed/gi)) {
  window.parent.postMessage("resize", "*");
}

const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

var dynamicData = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;
console.log(dynamicData)

function switchTheme(e) {
    if (e.target.checked) {        
        localStorage.setItem('theme', 'dark'); 
        dynamicData = localStorage.getItem('theme');         
        console.log(dynamicData);                     
    }
    else {       
        localStorage.setItem('theme', 'light');
        dynamicData = localStorage.getItem('theme');           
        console.log(dynamicData);
    } 
    document.documentElement.setAttribute('data-theme', dynamicData);     
}

document.documentElement.setAttribute('data-theme', dynamicData);     


toggleSwitch.addEventListener('change',switchTheme,false);