<template>
  <div style="padding: 15px;">
      <fieldset class="layui-elem-field layui-field-title">
        <legend>弹幕后台管理</legend>
        <div class="layui-btn-group demoTable" style="margin-top: 20px;">
      <button class="layui-btn" @click="edit('all')">批量通过</button>
        </div>

          <table class="layui-table" align="center">
            <thead>
              <tr>
                <th><input v-model="checkAll" type="checkbox">全选</th>
                <th>昵称</th>
                <th>弹幕内容</th>
                <th>时间</th>
                <th>审核</th>
                <th>删除</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(v,i) in infos">
                <td><input type="checkbox" :value="v.id" v-model="mychecked"></td>
                <td>{{v.name}}</td>
                <td>{{v.info}}</td>
                <td>{{v.creatTime}}</td>

                <td data-field="9" data-off="true">
                  <a :class="v.status==0?'layui-btn':'layui-btn layui-btn-disabled'" @click="edit(v.id,'pass')">通过</a>
                </td>
                <td>
                      <a class="layui-btn-danger layui-btn" :class="v.status==0?'':'layui-btn-disabled'" @click="edit(v.id,'delete')">删除</a>
                </td>
              </tr>
            
            </tbody>
          </table>
      </fieldset>
  </div>
</template>

<script>
import '../assets/layui/css/layui.css'
import axios from 'axios';
import jsonp from 'jsonp';
export default {
  name: 'ShowBiu',
  data () {
    return {
        infos:[],
        checkAll:'',
        mychecked:[]
    }
  },
  watch:{
    mychecked(value){
        console.log(value);
    },
      checkAll(value){
       if(value){
         this.infos.filter(
          item=>item.status!=1
          ).map(
           item=>this.mychecked.push(item['id'])
          )
        }else{
          this.mychecked=[];
        }
        console.log(this.mychecked)
      }
  },
  methods:{
      edit:function(id,act){
          id=id||'pass';

            if(act==undefined){
              act=passAll
              id=this.mychecked;

           }
           //处理接口
            axios.post('/edit', {
                action: act,
                id: id
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (response) {
                console.log(response);
              });
       
      }
  },
  mounted:function(){
        let that=this;
        jsonp('http://localhost/main/implement.php?act=get', null, function (err, data) {
          if(err){
            console.log(err)
          }else{
           that.infos=data;
          }
        })
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped>
 
</style>
