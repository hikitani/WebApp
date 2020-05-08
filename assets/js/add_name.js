var name_str = document.getElementById('name');
var btn = document.getElementById('txtq-link');

btn.addEventListener('click', btnClick);

function btnClick(){
    console.log(document.namespaceURI);
};