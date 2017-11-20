<template>
  <div class="barrage">
      <div class="banner"><img src="../assets/banner.png"></div>
      <textarea v-model="input"  placeholder="请输入20字以内的弹幕内容"></textarea>
      <button type="button" @click="upLoads($event)">提交</button>
    </div>
</template>

<script>
import axios from 'axios';
import jsonp from 'jsonp';

export default {
  name: 'ShowBiu',
  data () {
    return {
      input:''
    }
  },
    watch:{
      input(o){
        o.length>15?alert('不能超过15个字~'):null;
      }
    },
    methods:{
        upLoads:function(e){
          console.log(this.input);
        }
    },
  mounted:function(){

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
 * {
  margin: 0;
  padding: 0;
  font-family: "微软雅黑";
}

body {
  background: url(../assets/poster.jpg) no-repeat;
  height:100%;
  width:100%;
  overflow: hidden;
  background-size:cover;
}

.banner img {
  width: 100%;
  overflow: hidden;
}

.barrage textarea {
  margin: 20px 10%;
  width: 80%;
  height: 100px;
}

.barrage button {
  background: #fff100;
  width: 120px;
  height: 40px;
  border: none;
  font-size: 16px;
  color: #000;
  margin-left: 10%;
  border-radius: 5px;
}
</style>
