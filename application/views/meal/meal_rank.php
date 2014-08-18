<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>内部订餐专用</title>
<base href="<?php echo base_url() ;?>"/> 
<base target="_self">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <link rel="stylesheet" type="text/css" href="./css/main.css"/>
  
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery-1.7.2.min.js"?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.scrollTo.js"?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.nav.js"?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.quicksand.js"?>></script> 
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/easing.js"?>></script> 
  <script type="text/javascript">
    $(document).ready(function() {
      $(".navMenu").onePageNav();
      
  // Clone applications to get a second collection
  var $data = $(".portfolioItems").clone();
  
  //NOTE: Only filter on the main portfolio page, not on the subcategory pages
  $('.portfolioSort li a').click(function(e) {
    $(".portfolioSort li a").removeClass("activePSLink"); 
    // Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
    var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
    
    if (filterClass == 'all') {
      var $filteredData = $data.find('.portfolioItem');
    } else {
      var $filteredData = $data.find('.portfolioItem[data-type=' + filterClass + ']');
    }
    $(".portfolioItems").quicksand($filteredData, {
      duration: 800,
      easing: 'swing',
    });   
    $(this).addClass("activePSLink");       
    return false;
  });
  
    });
          function showfolio(number){
      $.ajax({
      type: 'POST',
      dataType:'html',
  url: "portfolio.php?id="+number,
  success: function(data) { 
  //alert(data);
  $(".portfolio-1").empty().append(data).slideDown();
}
      });}
function outhere(){
$(".portfolio-1").slideUp();}
</script>
<!-- 图表控件js加载 -->
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/canvasjs.min.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/excanvas.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/canvasjs.js" ?>></script>

<!-- 下拉复选框 -->

<link rel="stylesheet" type="text/css" href="./js/multiselectSrc/jquery-ui.css"/>
<!-- <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css"/> -->
<link rel="stylesheet" type="text/css" href="./js/multiselectSrc/jquery.multiselect.css"/>
<link rel="stylesheet" type="text/css" href="./js/assets/prettify.css" />
<link rel="stylesheet" type="text/css" href=<?php echo $this->config->item('base_url')."/js/assets/style.css"?> />

<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/jquery.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/ui/jquery.ui.core.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/ui/jquery.ui.widget.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/assets/prettify.js" ?>></script>
<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/multiselectSrc/jquery.multiselect.js" ?>></script>

<!-- 日期控件js加载 -->
<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui.css"?>type="text/css" />
<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.css"?>type="text/css" />
<link href=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/demos.css"?> rel="stylesheet" type="text/css" />

<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js"></script> -->
<script src=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui.min.js"?> type="text/javascript"></script>
<script src=<?php echo $this->config->item('base_url')."/js/jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.js"?> type="text/javascript"></script>

<script type="text/javascript">

function init_customer(){
  var date = new Date();
  document.cookie="customer='';expires=" + date.toGMTString();
}

function init_InameArr(){
var date = new Date();
document.cookie="InameArr='';expires=" + date.toGMTString();
}
//var iname =  Array();
//计算总计
 function TotalCount()
 {
    var rowscount=document.getElementById("test").rows.length;
    var sum=0;
    for(var i=1;i<=(parseInt(rowscount)-1);i++)
    {
        var littecount=document.getElementById("test").rows[i].cells[3].innerText;
        sum=parseFloat(sum)+parseFloat(littecount);
    }
    document.getElementById("total").innerText=parseFloat(sum);
    if(parseFloat(sum)!=0)
    {

      document.getElementById("money").innerText=parseFloat(sum);
    }
 }
//计算单个小计
 function EveryCount()
 {
    //alert("xxx");
    var index=window.event.srcElement.parentElement.parentElement.rowIndex;
    var test = document.getElementById("test");
    var a=document.getElementById("test").rows[index].cells[1].innerText;
    var b=document.getElementById("Num"+index).value;
    var c=parseFloat(a)*parseFloat(b);
    
    document.getElementById("test").rows[index].cells[3].innerText=c;
    TotalCount();
    updateOrderCookie();//修改cookies中保存的数量
 }

 //<--Start--将订单数据写入div
function WriteOrderInDiv()
{
 var gwc="<table id='test' style='border:1px;'><tr><td width='45%'>商品名称</td><td>单价(￥)</td><td>数量</td><td>小计</td></tr>";
 var OrderString=unescape(ReadOrderForm('24_OrderForm'));//获取cookies中的购物车信息

 
 var strs= new Array(); //定义一个数组，用于存储购物车里的每一条信息
 var OneOrder="";
 
 strs=OrderString.split("|");//用|分割出购物车中的每个产品
 for (i=1;i<strs.length ;i++ )    
    {
  
 gwc+="<tr>";
  
  OneOrder=strs[i].split("&");
  for (a=1;a<OneOrder.length ;a++ )    
  {
  
   if(a!=3)
   {
    gwc+="<td >";
    gwc+=OneOrder[a];
    gwc+="</td>";
    
   }
   else
   {
    gwc+="<td id='dd' >";
    gwc+="<input title='填写想购买的数量,请使用合法数字字符' style='width:20px;' id='Num"+i+"' type='text' onkeyup='EveryCount();'value='"+OneOrder[a]+"'>";
    gwc+="</td>";
   }
   
   
  }
  gwc+="<td >";
    gwc+=OneOrder[2]*OneOrder[3];
    gwc+="</td>";
   gwc+="</tr>";
        
    }
 
 gwc+="</table>";
  document.getElementById("Cart").innerHTML=gwc;
  TotalCount();
}
//<--End--将订单数据写入div
//--Start--展开/收缩购物车
function show(id)
{
if (document.getElementById(id).style.display=="") 
{
document.getElementById(id).style.display='none';
}
else{document.getElementById(id).style.display='';
}

}
//<--End--展开/收缩购物车
//<--Start--从cookie中读出订单数据的函数
function ReadOrderForm(name)
{
    var cookieString=document.cookie;
    if (cookieString=="")
    {
        return false;
    }
    else
    {
        var firstChar,lastChar;
        firstChar=cookieString.indexOf(name);
        if(firstChar!=-1)
        {
            firstChar+=name.length+1;
            lastChar = cookieString.indexOf(';', firstChar);
            if(lastChar == -1) lastChar=cookieString.length;
            return cookieString.substring(firstChar,lastChar);
        }
        else
        {
            return false;
        }
    }    
}
//-->End
//<--Start--添加商品至购物车的函数,参数(商品编号,商品名称，商品数量，商品单价)

//-->End
//<--Start--修改数量后，更新cookie的函数
function updateOrderCookie()
{
 var rowscount=document.getElementById("test").rows.length;
   var item_detail="";
    for(var i=1;i<=(parseInt(rowscount)-1);i++)
    {
        item_detail+="|"+document.getElementById("test").rows[i].cells[0].innerText+"&"+document.getElementById("test").rows[i].cells[0].innerText+"&"+document.getElementById("test").rows[i].cells[1].innerText+"&"+document.getElementById("Num"+i).value;
      //  document.write(document.getElementById("test").rows(i).cells(1).innerText);
    }
   
 var Then = new Date();
    Then.setTime(Then.getTime()+60*60*1000);
 document.cookie="24_OrderForm="+escape(item_detail)+";expires=" + Then.toGMTString();
}
//End--订单更新

//start-->订单提交时要更新订单信息，并组合成json数据
function updataOrderData_json()
{
  console.log("1");
  if(document.getElementById("money").innerText != '')
    var money = document.getElementById("money").innerText;
  console.log(money);
  var customer_name = document.getElementById("customer_name").value;
  console.log("3");
  var rowscount = document.getElementById("test").rows.length;
  console.log("3");
  var data_json = "";
    for (var i = 1; i <= (parseInt(rowscount) - 2) ; i++) 
    {
        data_json = data_json + "{"
        + '"item_name"' + ":" + "\"" + document.getElementById('test').rows[i].cells[0].innerText + "\"" + ","
        + '"item_price"' + ":" + "\""+ document.getElementById('test').rows[i].cells[1].innerText + "\"" + ","
        + '"item_amount"' + ":" + "\""+document.getElementById("Num"+ i).value +"\""+ ","
        + '"item_sum"' + ":" + "\""+ document.getElementById('test').rows[i].cells[3].innerText + "\"" + "}" + ",";
    }
    var i= (parseInt(rowscount) - 1);
    data_json = data_json + "{"
        + '"item_name"' + ":" + "\"" + document.getElementById('test').rows[i].cells[0].innerText + "\"" + ","
        + '"item_price"' + ":" + "\""+ document.getElementById('test').rows[i].cells[1].innerText + "\"" + ","
        + '"item_amount"' + ":" + "\""+document.getElementById("Num"+ i).value +"\""+ ","
        + '"item_sum"' + ":" + "\""+ document.getElementById('test').rows[i].cells[3].innerText + "\"" + "}" ;
    console.log("4");
    data_json = '{"orders":{' + '"customer_name"' + ":" + "\"" + customer_name + "\"" + ","+ '"orders_info"' + ":" + "[" + data_json + "]" + "," + '"total"' + ":" + "\"" + money + "\"" + '}' + "}";
    console.log(data_json);
    return data_json;
}

//End<--

//<--清空购物车
function  clearOrder() 
{
var Then = new Date();
document.cookie="24_OrderForm='';expires=" + Then.toGMTString();
document.getElementById('money').innerText=0;
init_InameArr();
// iname="";
// iname = Array();
}
//<--End

</script>


<script type="text/javascript">


$(function () {
    $('#starttime').datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: ""
    });
});   

$(function () {
  $('#endtime').datetimepicker({
      dateFormat: "yy-mm-dd",
      timeFormat: ""
  });
}); 

$(function(){
$("#platform").multiselect({
   multiple: false,
   noneSelectedText: "==大区平台==", 
   //show: ["bounce", 200],
   //hide: ["explode", 1000], 
   selectedList: 1
  });
});

$(function(){
$("#project").multiselect({
   noneSelectedText: "==选择餐馆==",
   //show: ["bounce", 200],
   //hide: ["explode", 1000],
   multiple: false,
   selectedList: 1
  });
});

function showValues() {
   var checkSubmitFlg=false;
    if (!checkSubmitFlg) {
    // 第一次提交
    var platstr = $("#platform").multiselect("update");
    var usagestr = $("#project").multiselect("update");

    document.getElementById('inplatform').value = platstr;
    document.getElementById('inproject').value = usagestr;

    checkSubmitFlg = true;
    return true;
    } else {

    alert("请耐心等待……不要重复提交哦!");
    return false;
    }

}

</script>
 
<script type="text/javascript">
  
function SetOrderForm(item_no,item_name,item_amount,item_price)
{
    var cookieString=document.cookie;
    if (cookieString.length>=4000)
    {
        alert("您的订单已满\n请结束此次订单操作后添加新订单！");
    }
    else if(item_amount<1||item_amount.indexOf('.')!=-1)
    {
        alert("数量输入错误！");
    }
    else
    {
        var mer_list=ReadOrderForm('24_OrderForm');
        if(!(ReadOrderForm('InameArr')))//判断cookie中是否有InameArr以及InameArr的值，如果没有，初始化
        {
          init_InameArr();
          var InameArr = '';
        }
      else {
        InameArr = unescape(ReadOrderForm('InameArr')); //如果已存在，将InameArr的值取出来反解码成字符串
      }
        var Then = new Date();
        Then.setTime(Then.getTime()+60*60*1000);

        var item_detail="|"+item_no+"&"+item_name+"&"+item_price+"&"+item_amount;
        var itemname="|"+item_name;

        var flag=false;


                //console.log(InameArr);
                if (InameArr==null) 
                { 
                    document.cookie="24_OrderForm=" + mer_list+escape(item_detail)+";expires=" + Then.toGMTString();
                    alert("“"+item_name+"”\n"+"已经加入您的订单！");
                   // iname.push(item_name);
                    document.cookie="InameArr=" + escape(itemname) + ";expires=" + Then.toGMTString();
                    return; 
                }
                else 
                {
                  var Inamearr_split = new Array();     //新建一个数组InameArr_split用来存InameArr打开来的餐名
                  Inamearr_split=InameArr.split("|");
                  
                  for(var i = 0;i < Inamearr_split.length; i++) 
                  {
                    //console.log(Inamearr_split.length);
                      if(Inamearr_split[i] == item_name)  //对餐名进行遍历，如果新添加的餐名与InameArr_split里的重复，只改数量，不重新添加一条新纪录
                      {
                          insert_update(item_name);
                          flag=true;
                          break;
                      }                   
                  }
                        if(!flag)//添加一条新纪录，将餐名和记录都存进cookie
                        {  
                         // iname.push(item_name);
                          document.cookie="InameArr=" + escape(InameArr) + escape(itemname) + ";expires=" + Then.toGMTString();
                          document.cookie="24_OrderForm=" + mer_list+escape(item_detail)+";expires=" + Then.toGMTString();
                          alert("“"+item_name+"”\n"+"已经加入您的订单！");
                          return;
                        }
                        else return;
                }

        
    }
}


function insert_update(name)
{
 //console.log("xxxx");
    var testobj = document.getElementById("test");
    for (var i = testobj.rows.length - 1; i >= 0; i--) {
       if(testobj.rows[i].cells[0].innerText == name)
       {
              //console.log("come in");

              var iamount = document.getElementById("Num"+ i).value;
              iamount = parseFloat(iamount) + 1;
              //testobj.rows[i].cells[2].innerText = iamount;
              document.getElementById("Num"+ i).value = iamount;
              var count = parseFloat(iamount) * parseFloat(testobj.rows[i].cells[1].innerText);
              testobj.rows[i].cells[3].innerText = count;
              TotalCount();
              updateOrderCookie();//修改cookies中保存的数量
       }  
     }

}


</script>



  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/canvasjs.min.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/excanvas.js" ?>></script>
  <script type="text/javascript" src=<?php echo $this->config->item('base_url')."/js/canvasjs/source/canvasjs.js" ?>></script>

<!-- 级联js加载 -->
<script type="text/javascript" charset="utf-8">

     $(function() {

        $("select[name='platform']").change( function() {

        console.log("val: " + $(this).val());

        $.post("<?php echo site_url('operate/ajax_select/view')?>", {inplatform: $(this).val()},
          function(data){
             $("select[name='server'] option:gt(-500)").remove();
             $("select[name='server']").append(data);
             $("#server").multiselect('refresh');

          });
        });
    });

    function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }

</script>

<script type="text/javascript">
var flag = 0;

function book(name,value)
{
  //alert(name);
  //alert(value);
  var booklist = document.getElementById("booklist").innerHTML;
  var money = parseInt(document.getElementById("money").innerHTML);
  booklist = booklist + "," + name;
  if(flag == 0)
  {
    booklist=booklist.substr(1);
    flag = 1;
  }
  money = money + parseInt(value);
  document.getElementById("booklist").innerHTML = booklist;
  document.getElementById("money").innerHTML = money;
}
//保存用户的名字信息到cookie，设置为永久
function save_Customername(){
  var customer_name=document.getElementById("customer_name").value;
  var Then = new Date();
    Then.setTime(Then.getTime()+60*60*1000);

    if(!(ReadOrderForm('customer')))//判断cookie中是否有customer以及customer的值，如果没有，初始化
        {
            init_customer();
            var customer = '';
            document.cookie="customer="+escape(customer_name)+";expires=" + Then.toGMTString();
        }
        else 
        {
        var customer=ReadOrderForm('customer');
      document.cookie="customer="+customer+escape('|'+customer_name)+";expires=" + Then.toGMTString();
      console.log(customer);
    }
}

function insert_customer(){
  if(!(ReadOrderForm('customer')))//判断cookie中是否有customer以及customer的值，如果没有，初始化
        {
            
            return;
        }
        else 
        {
        var customer=unescape(ReadOrderForm('customer'));
        var cusArr = new array();
      cusArr = customer.split("|");
      if(document.getElementById("customer_name").value!=null)
      {
        document.getElementById("customer_name").value = cusArr[0];
      }
      console.log(document.getElementById("customer_name").value);
    }
}


function confirm()
{

  document.getElementById('data_list').value = updataOrderData_json();
  var money = parseInt(document.getElementById("total").innerHTML);
  alert("你一共需要支付" + money + "人民币！" );
  //console.log(document.getElementById('data_list').value);
  save_Customername();
}

</script>
<script type="text/javascript">
  $(document).ready(function(){
    TotalCount();
  });
</script>

<base href="<?php echo base_url() ;?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body {
  margin-left: 3px;
  margin-top: 0px;
  margin-right: 3px;
  margin-bottom: 0px;
}
a{
  text-decoration:none;
  color: #344b50;
}
.STYLE1 {
  color: #e1e2e3;
  font-size: 12px;
}
.STYLE1 a{
color:#fff;
}
.STYLE6 {color: #000000; font-size: 12;}
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
  color: #344b50;
  font-size: 12px;
}
.STYLE21 {
  font-size: 12px;
  color: #3b6375;
}
.STYLE22 {
  font-size: 16px;
  color: #295568;
}
.STYLE23 {
  font-size: 15px;
  color: #FF0000;
}
.picker
{
    height:16px;
    width:16px;
    background:url('sample-css/cal.gif') no-repeat;
    margin-left:-19px;
    cursor:pointer;
    border:none;      
}
#shopping_car{
  
  top:10px;
  right: 100px；
}
td{
  font-style: black;
  text-align: center;
}
/*  后加的高亮显示  */
 table.hovertable {
  font-family: verdana,arial,sans-serif;
  font-size:11px;
  color:#333333;
  border-width: 1px;
  border-color: #999999;
  border-collapse: collapse;
}
table.hovertable th {
  background-color:#c3dde0;
  border-width: 1px;
  padding: 8px;
  border-style: solid;
  border-color: #a9c6c9;
}
table.hovertable tr {
  background-color:#d4e3e5;
}
table.hovertable td {
  border-width: 1px;
  padding: 8px;
  border-style: solid;
  border-color: #a9c6c9;
}

</style>
</head>
<body>
  <div id="home">
    <div class="container">
      <div class="header">
        <div class="headerTop">
          <div class="headerTop-1 clearfix">
            <div class="headerLeft clearfix">
              <h1><a href="#">&nbsp;</a></h1>
              <p>大火溶内部网站</p>
            </div>
            
          </div>
        </div>
        <div class="headerBottom">
          <div class="headerBottom-1 clearfix">
            <ul class="navMenu clearfix">
              <li><a href="<?php echo site_url('/meal/meal_book/')?>">Home</a></li>
              <li><a href="<?php echo site_url('/meal/meal_check/')?>">查看订单</a></li>
              <li><a href="<?php echo site_url('/meal/meal_rank/')?>">订单排行榜</a></li>  
            </ul>
      <!--      <div class="info clearfix">
              <div  width="300px" id="shopping_car">
                <div id="Cart" style="line-height: 24px; font-size: 12px; background-color: #f0f0f0;
                          border-top: 1px #ffffff solid；display:none; ">
                </div>
                <div id="Info">
                          总计：<strong><span id="total" style="color: #FF0000; font-size: 36px ; height: 10px;
                width: 10px;">0</span></strong>元
                 <input type="button" value="清空" onclick="clearOrder();WriteOrderInDiv();" />
                 <input type="button" value="展开/收缩" onclick="show('Cart')" />
                </div>
                
              </div>

            </div> -->
          </div>
          <div class="menuBottom"></div>
        </div>
      </div>
      <div class="content">
        <div class="home-1">
          <h1> <br /><span>施工期间 <span class="agencySpan">!</span></span></h1>
          <p>
            正在施工，敬请期待！
          </p>
          <a href="#" class="checkPortfolio">Check our Portfolio</a>
        </div>
        <div class="home-2">
          <div class="home-2-center clearfix">
            <div class="skills">
              <div><img src="images/skill-image1.png" alt="minimal design" /></div>
              <p>Minimal Design</p>
            </div>
            <div class="skills">
              <div><img src="images/skill-image2.png" alt="minimal design" /></div>
              <p>Easy Installation</p>
            </div>
            <div class="skills">
              <div><img src="images/skill-image3.png" alt="minimal design" /></div>
              <p>Browser Support</p>
            </div>
            <div class="skills">
              <div><img src="images/skill-image4.png" alt="minimal design" /></div>
              <p>SEO Friendly</p>
            </div>
            <div class="skills">
              <div><img src="images/skill-image5.png" alt="minimal design" /></div>
              <p>Unlimited Versions</p>
            </div>
            <div class="weCreate">
              <h2>
                ...
              </h2>
            </div>
          </div>
        </div>
    <script>
    window.WriteOrderInDiv();
    window.insert_customer();
    </script>

  <!--      <div class="home-3">
          <div class="home-3-center">
            <div>
              <form method="post"  name = "form1" action="<?php echo site_url('meal/meal_book_ok/')?>">
               <p class = "STYLE22">请筛选数据:&nbsp;&nbsp;&nbsp;
                <?php echo $project?>

                <input  class = "STYLE22" type="submit" id"submitinput" name="submit_article" value="查询" onclick="showValues()"> </input>
                <input type="hidden" name="inplatform" id="inplatform" value="">
                <input type="hidden" name="inproject" id="inproject" value="">
                </p><br/>
 
                <?php if(!empty($menudata)): ?>
                
                <form method="post"  name = "form" action="<?php echo site_url('meal/meal_book_confirm/')?>">
                    <h1 id = "booklist"></h1>
                    <table>
                    <tr>
                    <td class = "STYLE22">总价</td> <td class = "STYLE22"><p id = "money" style="color:#FF0000">0</p> <td class = "STYLE22">元
                    </tr>
                    </table>
                    <p class = "STYLE22" type="text" id"submitinput" name="submit_article">
                    您的大名：
                    <input  class = "STYLE22" type="text" id="customer_name" name="customer_name" value=""> </input>
                    <input type="hidden" name="data_list" id="data_list" value="xxx"></input>
                    <input  class = "STYLE22" type="submit" id"submitinput" name="submit_article" value="确认订餐" onclick="confirm()">
                    </p>
                </form>
                 
                <?php endif;?>
                 <p>
                请您点完餐后，填写上您的大名，确认购物车的订单后，提交订餐！
              </p>
                </form>
              
            </div>
            
          </div>
        </div>
        <div class="home-4 clearfix">
                <?php if(!empty($menudata)):
                foreach ($menudata as $row):
                foreach ($row as $menutype => $menucontent):?>
              <div>
                <p><?php echo $menutype;?></p>
                <table width="70%" border="<?php echo $border ?>" class="hovertable" id='total'>

                 <?php foreach($menucontent as $key => $value):
                 $name_price = explode(",", $value);
                 $name = $name_price[0];
                 $price = $name_price[1];
                 ?>

                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                  <td ><div align="center"><span class="STYLE10"><?php echo $key?></span></div></td>
                  <td ><div align="center"><span class="STYLE10"><?php echo $name?></span></div></td>
                  <td ><div align="center"><span class="STYLE10"><?php echo $price . "元"?></span></div></td>
                  <td ><div align="center"><span class="STYLE10"><a value="<?php echo $key?>" name = "<?php echo $name?>" id = "<?php echo $price ?>" style="color:#FF0000" href="javascript:void(0)" onclick="SetOrderForm(this.value,this.name,'1',this.id);WriteOrderInDiv();">点击订我</a></span></div></td>
                 </tr>
                <?php endforeach; ?>
                </table>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <?php endif;?>
                </div>

          </div>
        </div>
      </div>
    </div>
</div>
  -->
  


  <div id="footer">
    <div align="center">
      <p>Copyright &copy; 2012-2014 &nbsp;.&nbsp;HRG All rights reserved.</p>
    </div>
  </div>


</body>
</html>
