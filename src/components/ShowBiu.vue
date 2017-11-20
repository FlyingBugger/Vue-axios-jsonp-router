<template>

  <div class="main">

    <ul>
    <li class="li" v-for="(i,v) in Dates" :style="{'top':i.position}">
         <marquee :scrollamount="i.scrollamount" :loop="i.loop"  >
           <div style="width:100%;">
               <img :src="i.headPic"/>
               <font  color=black size=+3 :style="{'color':i.color}">
                 {{v+1}}
                 <!-- index of array -->
                 <span style="color:black;">{{i.name}}:</span>
                 {{i.info}}
               </font>
           </div>
        </marquee>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
import jsonp from 'jsonp';
export default {
  name: 'ShowBiu',
  data () {
    return {
      Dates:[]
    }
  },
  mounted:function(){
    let tempDates=null;
    let  that=this;
    let tempDir=1;
    jsonp('http://localhost/main/implement.php?act=get', null, function (err, data) {
        if (err) {
           console.error(err.message);
        } else {
            data.map((v,i)=>{
              tempDir<=90? tempDir+=7:tempDir=1;

             data[i]['scrollamount']=30;
             data[i]['scrolldelay']=30;
             data[i]['position']=tempDir+"%";
             data[i]['headPic']="//iconfont.alicdn.com/t/1494395652678.png@100h_100w.jpg";
          
             that.Dates.push(data[i]);
            })

        }
    });


          /* 
           let info=1;
           let showBingo=123;
           let that=this;
           let tempArr=new Array();
           setInterval(()=>{
              if(info<=80){
                info+=7;
              }
              tempArr.push({
                  scrollamount:30,//速度
                  loop:1,//循环次数
                  scrolldelay:30,//俩次之前延迟多少s
                  position:info+"%",//距离顶部多少px；
                  headPic:"//iconfont.alicdn.com/t/1494395652678.png@100h_100w.jpg",
                  name:"1px",
                  color:"red",
                  info:"condition 2"
                });
            },200)
            */
          // this.Dates.push(tempArr);
        //   console.log(this.Dates);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  li{
    list-style: none;
    position: absolute;
    display: block;
    width: 100%;
    height: auto;
  }
  .ng-hide {
    height: 0;
    width: 0;
    background-color: transparent;
    top:-200px;
    left: 200px;
  }
  .li img{
      width: 60px;
      height: 60px;
      border-radius: 50%;
  }
  .main font{
    position: relative;
    top: -16px;
  }
</style>
