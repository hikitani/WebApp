const btn = document.getElementById('role');
var i = 0;

btn.addEventListener('click', addRole);

function addRole(){
    if(i > 1){
        btn.style.display = 'none';
    }
    i = i + 1;
    var div = document.createElement('div');
    div.className="projects_table";
    div.id =i;
    var title = document.createElement('h2');
    var name = document.getElementById('r_title');
    var textInBtn = document.createTextNode(name.value);
    title.appendChild(textInBtn);
    div.appendChild(title);
    document.body.appendChild(div);
    if(div.id=='1'){
        div.addEventListener("dblclick", role1)
    };
    if(div.id=='2'){
        div.addEventListener("dblclick", role2)
    };
    if(div.id=='3'){
        div.addEventListener("dblclick", role3)
    };  
}

function role1(){
    window.location.href='1.html';
}

function role2(){
    window.location.href='2.html';
}

function role3(){
    window.location.href='3.html';
}