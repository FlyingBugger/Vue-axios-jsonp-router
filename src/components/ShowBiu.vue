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
  methods:{
    getDates:function(){
          let  that=this;
    setInterval(function(){

       let tempDates=null;

    let tempDir=1;
      axios.post('API/checkDates.php', {
                act: "showTotals"
              })
              .then(function (res) {
                let data=res.data
                 data.map((v,i)=>{
                   
                   data[i]['scrollamount']=30;
                   data[i]['scrolldelay']=30;
                   data[i]['position']=tempDir+"%";
                   data[i]['headPic']="//iconfont.alicdn.com/t/1494395652678.png@100h_100w.jpg";
                   that.Dates.push(data[i]);
                   tempDir<=90? tempDir+=8:tempDir=1;
                  })
              })
              .catch(function (response) {
                console.log(response);
              });
    },2000)
   
    }
  },
  mounted:function(){
    
   this.getDates()
      
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
 
  }
</style>
