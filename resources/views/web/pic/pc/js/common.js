// 后台地址
var ajaxUrl = "";
// 异步ajax
function ajaxF(){
    $.ajax({

    })
}

function ajaxF(url,data,asyncFlag,fn){
    $.ajax({
        url:url,
        type:"post",
        data:data,
        async:asyncFlag,
        dataType:'json',
        success:function(obj){
            console.log(obj);
        },
        error:function(e){
            console.log("传输错误："+e);
        }
    })
}

// cookie方法
// 获取 cookie
function getCookie(key){
    var val = Cookies.get(key);
    if(val == undefined){
        return "";
    }
    return val;
} 
// 添加 cookie
function addToCookie(key, value){
    document.cookie = key + "=" + getCookie(key) + "&" + value;
}
//删除cookie
function delCookie(key){  
    Cookies.remove(key);
}
// 移除 cookie记录值
function removeFormCookie(key, value){
    document.cookie = key + "=" + getCookie(key).replace("&" + value,"");
}


//   表单验证方法
//   参数实例
function validateForm(obj,rule){
     var rulelength = rule.length;
    //  循环获取需要验证的数据的key值
     for(var item in obj){
         //循环验证规则
        for(var i = 0 ; i < rulelength ; i++){
            //匹配数据与验证规则
            if(item == rule[i].name){
                var ruleitemlength = rule[i].regular.length;
                //循环匹配验证规则的项目
                for(var j = 0 ; j < ruleitemlength ; j++){
                    if(reg(rule[i].regular[j].regularitem,obj[item])){ 
                    }else{
                        return rule[i].regular[j].message;
                    }
                }
            }
        }
     }
     return false;
}
// 正则验证方法
function reg(regular,str){
    var re = new RegExp(regular);
    return re.test(str);
}

// 获取表单序列化文件
function serializeF(obj){
    var params = $("#"+obj).serializeArray();
    console.log(params);
    var values = {};
    if(params){
        for( x in params ){
            values[params[x].name] = params[x].value;
        }   
        return values;
    }else{
        return false;
    }  
}

//字符串去空
// function trim(){
    
// }
