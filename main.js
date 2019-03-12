var flag = 0, ref = 0;//实在不知道怎么判断刷新了
var inHTML;
var inst, init1, init2, init3, nxt; //init1,2分别表示要加入的时间/计划任务 nxt:要添加的位置
mdui.mutation();
function Update() {
    location.reload();
    var xmlhttp = new XMLHttpRequest();
    mdui.mutation("#Main");
    var text = $("#Main").html();
    xmlhttp.open("POST", "./update.php");
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("name=" + "<div id='Main'>" + text + "</div>");
    window.location.reload();//这里如果是动态元素的话无法刷新
}

function SignOut() {
    var xmlhttp = new XMLHttpRequest(); //ie5 ie6的不管了。
    xmlhttp.open("POST", "./logout.php", true);
    xmlhttp.send();
    location.reload();
}
$(document).ready(function() {
    mdui.mutation();
    inst = new mdui.Dialog('#dialog');
    if (flag == 1) {
        $("#NotLogin").hide(1000);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "./update.php");
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send("query=");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                inHTML = xmlhttp.responseText;
                $("#NotLogin").after(inHTML);
                mdui.mutation();
            }
        }
    }
    $(this).on("click", function() {
        var instDra = new mdui.Drawer("#LeftDrawer");
        if (instDra.getState() == "opened") instDra.close();
    });
    function Refush() {
        location.reload();
    }
    $("#ConfrimPlan").click(function() {
        init1 = $("#time").val();
        init2 = $("#plan").val();
        init3 = $("#remarks").val();
        var nw = document.createElement('tr');
        var td1 = document.createElement('td');
        td1.innerHTML = $("tbody").children("tr").length + 1;
        nw.appendChild(td1); //序号           
        var td2 = document.createElement('td');
        td2.innerHTML = init1;//时间
        nw.appendChild(td2);
        var td3 = document.createElement('td');
        td3.innerHTML = init2;//任务
        nw.appendChild(td3);
        var td4 = document.createElement('td');
        td4.innerHTML = init3;//备注
        nw.appendChild(td4);
        var td5 = document.createElement('td');
        td5.innerHTML = "<button class='Delet mdui-btn mdui-btn-icon'><i class='mdui-icon material-icons'>delete</i></button><button class=' Add mdui-btn mdui-btn-icon'><i class='mdui-icon material-icons'>add</i></button>";
        nw.appendChild(td5);
        nxt.after(nw);
        Update();
        window.location.reload();
    });
});

$(document).on('click', '.Delet', function() {
    var fa = $(this).parent().parent();
    fa.remove();
    Update();
});
$(document).on("click", ".Add", function() {
    $("#time").val("");
    $("#plan").val("");
    $("#remarks").val(""); 
    inst = new mdui.Dialog('#dialog');
    inst.open();
    nxt = $(this).parent().parent();
    mdui.mutation();
    mdui.mutation("#MyTable");
});


